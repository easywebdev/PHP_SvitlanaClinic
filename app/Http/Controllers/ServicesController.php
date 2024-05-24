<?

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Home;
use App\Models\Service;

class ServicesController extends Controller 
{
    public function getServices() 
    {
        $services = Service::all();
        echo $services;
        echo '</br></br>';
        echo $services[0]->galleries;
        echo '</br></br>';

        $galleries = Gallery::all();
        echo $galleries;
        echo '</br></br>';
        echo $galleries[0]->service;
        echo '</br></br>';
        
        $page = (object) array(
            'keywords'    => 'Services keywords',
            'description' => 'Services description',
        );

        $contact = Contact::all('email', 'phone', 'address', 'image');
        echo $contact;
        echo '</br></br>';

        $home = Home::all();
        echo $home;

        
        return view('services', [
            'title' => 'Services',
            'page'  => $page,
        ]);
    }
}