<?

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Home;
use App\Models\Service;
use Illuminate\Http\Request;


class ServicesController extends Controller 
{
    /**
    * @return mixed
    */
    public function getServices() 
    {
        $home = Home::all('title', 'keywords', 'description');
        $services = Service::all('name', 'image')->sortBy('position');
        
        $page = (object) array(
            'title'       => $home[0]['title'],
            'keywords'    => $home[0]['keywords'],
            'description' => $home[0]['description'],
            'services'    => $services,
        );
        
        return view('services', [
            'page' => $page
        ]);
    }

    /**
     * @param mixed $name
     * @return mixed
    */
    public function getService(Request $request) 
    {
        $service = Service::where('name', $request->route('name'))->get();
        $gallery = Gallery::where('service_id', $service[0]->id)->get()->sortBy('position');
        echo $gallery;

        return view('service', [
            'page'    => $service[0],
            'galleries' => $gallery,
        ]);
    }
}