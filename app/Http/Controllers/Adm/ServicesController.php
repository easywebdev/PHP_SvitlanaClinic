<?

namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;

class ServicesController extends Controller 
{
    public function getServices() 
    {
        return view('adm.services');
    }
}