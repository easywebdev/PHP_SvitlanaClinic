<?php

namespace App\Http\Controllers\Adm;

use App\Actions\FileProcessing;
use App\Actions\PositionProcessing;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller 
{
    use FileProcessing;
    use PositionProcessing;
    
    public function getServices() 
    {
        $services = Service::all('id', 'name', 'image', 'position')->sortBy('position');
        
        return view('adm.services', [
            'services' => $services,
        ]);
    }

    public function getService(Request $request) 
    {
        $service = Service::find($request->route('id'));
        $count = Service::all('id')->count();
        
        return view('adm.editservice', [
            'service' => $service,
            'count'   => $count,
        ]);
    }

    public function newService() 
    {
        $count = Service::all('id')->count();
        
        return view('adm.addservice', [
            'count'   => $count,
        ]);
    }

    public function updateService(Request $request) 
    {
        //Validate
        $request->validate([
            'title'    => 'required',
            'name'     => 'required',
            'position' => 'integer',
            'image'    => 'image|max:2000',
        ]);

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/services/';
            $filename = 'service_' . $request->input('id') . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $filename, width: 400);
        }

        // Get selected Service from DB
        $service = Service::find($request->input('id'));

        // Move Service position
        if($service->position != $request->input('position')) {
            $this->movePosition('services', $request->input('position'), $service->position);
        }

        $service->position = $request->input('position');
        $service->title = $request->input('title');
        $service->keywords = $request->input('keywords');
        $service->description = $request->input('description');
        $service->name = $request->input('name');
        $service->text = $request->input('text');
        if($request->file('image')) {
            $service->image = $filename;
        }
        
        $service->save();

        return redirect(route('getService', [$request->input('id')]));
    }

    public function addService(Request $request) 
    {
        //Validate
        $request->validate([
            'title'    => 'required',
            'name'     => 'required|unique:services,name',
            'position' => 'integer',
            'image'    => 'image|max:2000|required',
        ]);

        // Get last position
        $position = Service::get('position')->sortByDesc('position')->value('position') + 1;

        // Add Service
        $service = new Service;
        $service->position = $position;
        $service->title = $request->input('title');
        $service->keywords = $request->input('keywords');
        $service->description = $request->input('description');
        $service->name = $request->input('name');
        $service->text = $request->input('text');
        $service->image = "service_1.jpg";
        
        $service->save();

        // Get id for added service
        $id = $service->id;

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/services/';
            $filename = 'service_' . $id . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $filename, width: 400);
        }

        // Update service filename and Service position
        $service = Service::find($id);
        $service->image = $filename;

        if($service->position != $request->input('position')) {
            $this->movePosition('services', $request->input('position'), $service->position);
        }
        $service->position = $request->input('position');

        $service->save();

        return redirect(route('getServices'));
    }

    public function delService(Request $request) 
    {
        $service = Service::find($request->route('id'));
        $this->deleteFile('images/home/services/', $service->image, false);
        $this->movePosition('services', Service::get('position')->sortByDesc('position')->value('position'), $service->position);
        Service::destroy($request->route('id'));

        return ['url' => '/adm/services'];
    }
}