<?

namespace App\Http\Controllers\Adm;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Slide;

class MovePositionController extends Controller 
{   
    use App\Actions\PositionProcessing;
    
    /**
     * @param Request $request
     * @return array
     */
    public function changePosition(Request $request) 
    {
        switch ($request->input('tbl')) {
            case 'services':
                $currentPosition = Service::where('id', $request->input('id'))->value('position');
                $this->movePosition('services', $request->input('position'), $currentPosition);
                Service::where('id', $request->input('id'))->UPDATE(['position' => $request->input('position')]);
                return ['url' => url('/adm/services')];
            case 'galleries':
                $currentPosition = Gallery::where('id', $request->input('id'))->value('position');
                $this->movePositionKey('galleries', $request->input('position'), $currentPosition, 'service_id', $request->input('val'));
                Gallery::where('id', $request->input('id'))->UPDATE(['position' => $request->input('position')]);
                return ['url' => url('/adm/gallery/' . $request->input('val'))];
            case 'slides':
                $currentPosition = Slide::where('id', $request->input('id'))->value('position');
                $this->movePosition('slides', $request->input('position'), $currentPosition);
                Slide::where('id', $request->input('id'))->UPDATE(['position' => $request->input('position')]);
                return ['url' => url('/adm/slides')];
        }        
    }
}