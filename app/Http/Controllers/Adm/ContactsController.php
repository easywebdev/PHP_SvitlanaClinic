<?

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Actions\FileProcessing;

class ContactsController extends Controller 
{
    use FileProcessing;
    
    /**
     * @return mixed
     */
    public function getContacts() 
    {
        $contacts = Contact::find(1)->all()[0];

        return view('adm.contacts', [
            'contacts' => $contacts
        ]);
    }

    public function updateContacts(Request $request) 
    {
        //Validate
        $request->validate([
            'title'       => 'required',
            'email'       => 'email',
            'phone'       => 'required',
            'facebook'    => 'required',
            'address'     => 'required',
            'geolocation' => 'required',
            'image'       => 'image|max:2000',
        ]);

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/contacts/';
            $filename = 'contact_' . $request->input('id') . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $filename, width: 300);
        }

        // Get Contact
        $contact = Contact::find($request->input('id'));

        // Save Contact
        $contact->title = $request->input('title');
        $contact->keywords = $request->input('keywords');
        $contact->description = $request->input('description');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->facebook = $request->input('facebook');
        $contact->address = $request->input('address');
        $contact->geolocation = str_replace('width="600"', 'width="100%"', $request->input('geolocation'));
        if($request->file()) {
            $contact->image = $filename;
        }

        $contact->save();

        return redirect(route('getContacts'));
    }
}