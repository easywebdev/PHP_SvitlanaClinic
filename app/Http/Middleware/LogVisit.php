<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Statistic;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        //$ip = '195.22.113.125';

        // If enable detailed statistic
        if(env('LOG_VISITOR')) {
            $details = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
        }

        // Find page
        $urlPath = $request->path();
        $urlArr = explode('/', $urlPath);

        $pageName = 'Home';

        if($urlArr[0] == 'contacts') {
            $pageName = 'Contacts';
        }
        elseif($urlArr[0] == 'services' && count($urlArr) == 1) {
            $pageName = 'Services';
        }
        elseif($urlArr[0] == 'services' && count($urlArr) == 2) {
            $pageName = $urlArr[1];
        }
        
        // Create statistic information
        $clientData = [
            'name'    => $pageName,
            'url'     => $request->fullUrl(),
            'ip'      => $ip,
            'agent'   => $request->userAgent(),
            'country' => 'Unknown',
            'region'  => 'Unknown',
            'city'    => 'Unknown',
            'loc'     => 'Unknown',
            'dt'      => date('Y-m-d H:i:s'),
        ];

        try {
            $clientData['country'] = $details->country;
            $clientData['region'] = $details->region;
            $clientData['city'] = $details->city;
            $clientData['loc'] = $details->loc;
        }
        catch (Exception $e) {}

        // Save to DB
        $statistic = new Statistic;

        foreach($clientData as $key => $value) {
            $statistic->$key = $value;
        }

        $statistic->save();
        
        return $next($request);
    }
}
