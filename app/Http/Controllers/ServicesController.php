<?

namespace App\Http\Controllers;

class ServicesController extends Controller 
{
    public function getServices() 
    {
        $page = (object) array(
            'keywords'    => 'Services keywords',
            'description' => 'Services description',
        );
        
        return view('services', [
            'title' => 'Services',
            'page'  => $page,
        ]);
    }
}