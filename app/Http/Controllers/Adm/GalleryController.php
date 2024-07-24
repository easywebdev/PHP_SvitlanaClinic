<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Service;
use App\Actions\FileProcessing;
use App\Actions\PositionProcessing;

class GalleryController extends Controller 
{
    use FileProcessing;
    use PositionProcessing;
    
    public function getServiceGallery(Request $request) 
    {
        $service = Service::where('id', $request->route('service_id'))->get(['id', 'name'])[0];
        $images = Gallery::where('service_id', $request->route('service_id'))->orderBy('position')->get();
        
        return view('adm.editgallery', [
            'service' => $service,
            'images'  => $images
        ]);
    }

    public function getGalleryImage(Request $request) 
    {
        $image = Gallery::find($request->route('id'));
        $service = Service::where('id', $image->service_id)->get(['id', 'name'])[0];
        $services = Service::all(['id', 'name']);
        $count = Gallery::where('service_id', $service->id)->count();

        return view('adm.editgalleryimage', [
            'service'  => $service,
            'image'    => $image,
            'count'    => $count
        ]);
    }

    public function newGalleryImage(Request $request) 
    {
        $count = Gallery::where('service_id', $request->route('service_id'))->count();
        $service = Service::where('id', $request->route('service_id'))->get(['id', 'name'])[0];

        return view('adm.addgalleryimage', [
            'count'   => $count,
            'service' => $service
        ]);
    }

    public function updateGalleryImage(Request $request) 
    {
        //Validate
        $request->validate([
            'image'    => 'image|max:2000',
        ]);

        // Get selected Service from DB
        $gallery = Gallery::find($request->input('id'));

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/galleries/';
            $filename = 'galleryimg_' . $request->input('id') . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $filename, thumbnails: true);
        }

        // Move Service position
        if($gallery->position != $request->input('position')) {
            $this->movePositionKey('galleries', $request->input('position'), $gallery->position, 'service_id', $gallery['service_id']);
        }

        $gallery->service_id = $request->input('service_id');
        $gallery->position = $request->input('position');
        $gallery->text = $request->input('text');
        if($request->file('image')) {
            $gallery->image = $filename;
        }
        
        $gallery->save();

        return redirect(route('getGalleryImage', [$request->input('id')]));
    }

    public function addGalleryImage(Request $request) 
    {
        //Validate
        $request->validate([
            'image'    => 'image|max:2000|required',
        ]);

        // Get last position
        $position = Gallery::where('service_id', $request->input('service_id'))->get('position')->sortByDesc('position')->value('position') + 1;

        // Add gallery
        $gallery = new Gallery;
        $gallery->position = $position;
        $gallery->service_id = $request->input('service_id');
        $gallery->text = $request->input('text');
        $gallery->image = "img-1.jpg";

        $gallery->save();

        $id = $gallery->id;

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/galleries/';
            $filename = 'galleryimg_' . $id . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $filename, thumbnails: true);
        }

        // Update service filename and Service position
        $gallery = Gallery::find($id);
        $gallery->image = $filename;

        if($gallery->position != $request->input('position')) {
            $this->movePositionKey('galleries', $request->input('position'), $gallery->position, 'service_id', $request->input('service_id'));
            $gallery->position = $request->input('position');
        }

        $gallery->save();

        return redirect(route('getServiceGallery', ['service_id' => $gallery->service_id]));
    }

    public function delGalleryImage(Request $request) 
    {
        $gallery = Gallery::find($request->route('id'));
        $this->deleteFile('images/home/galleries/', $gallery->image, true);
        $this->movePositionKey('galleries', Gallery::where('service_id', $gallery->service_id)->get('position')->sortByDesc('position')->value('position'), $gallery->position, 'service_id', $gallery->service_id);
        Gallery::destroy($request->route('id'));

        return ['url' => "/adm/gallery/$gallery->service_id"];
    }
}