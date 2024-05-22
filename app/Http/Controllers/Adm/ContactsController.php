<?

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;

class ContactsController extends Controller 
{
    public function getContacts() 
    {
        return view('adm.contacts');
    }
}