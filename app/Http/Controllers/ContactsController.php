<?

namespace App\Http\Controllers;

class ContactsController extends Controller 
{
    public function getContacts() 
    {
        $page = (object) array(
            'keywords'    => 'Contacts keywords',
            'description' => 'Contacts description',
        );
        
        return view('contacts', [
            'title' => 'Contacts',
            'page'  => $page,
        ]);
    }
}