<?

namespace App\Http\Controllers\Adm;

use App\Models\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller 
{
    public function getHome() 
    {
        $home = Home::find(1);

        return view('adm.home', [
            'home' => $home,
        ]);
    }

    public function updateHome(Request $request) 
    {
        // //Validate
        $request->validate([
            'title' => 'required',
        ]);

        // Get selected Service from DB
        $home = Home::find($request->input('id'));

        $home->title = $request->input('title');
        $home->keywords = $request->input('keywords');
        $home->description = $request->input('description');
        $home->text = $request->input('text');
        
        $home->save();

        return redirect(route('getHome'));
    }
}