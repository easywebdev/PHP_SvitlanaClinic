<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Actions\FileProcessing;
use App\Actions\PositionProcessing;
use App\Models\Slide;
use Illuminate\Http\Request;

class SliderController extends Controller 
{
    use FileProcessing;
    use PositionProcessing;

    public function getSlides() 
    {
        $slides = Slide::all()->sortBy('position');

        return view('adm.slides', [
            'slides' => $slides
        ]);
    }

    public function getSlide(Request $request) 
    {
        $slide = Slide::find($request->route('id'));
        $count = Slide::all('id')->count();

        return view('adm.editslide', [
            'slide' => $slide,
            'count' => $count,
        ]);
    }

    public function newSlide() 
    {
        $count = Slide::all('id')->count();

        return view('adm.addslide', [
            'count' => $count
        ]);
    }

    public function updateSlide(Request $request) 
    {
        //Validate
        $request->validate([
            'name'     => 'required|unique:slides,name,'. $request->input('id'),
            'position' => 'integer',
            'image'    => 'image|max:2000',
        ]);

        // Get selected Service from DB
        $slide = Slide::find($request->input('id'));

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/slides/';
            $fileName = 'slide_' . $request->input('id') . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $fileName, height: 640, thumbnails: true);
        }

        // Move Service position
        if($slide->position != $request->input('position')) {
            $this->movePosition('slides', $request->input('position'), $slide->position);
        }

        $slide->position = $request->input('position');
        $slide->name = $request->input('name');
        if($request->file('image')) {
            $slide->image = $fileName;
        }
        
        $slide->save();

        return redirect(route('getSlide', [$request->input('id')]));
    }

    public function addSlide(Request $request) 
    {
        //Validate
        $request->validate([
            'name'     => 'required|unique:slides,name',
            'position' => 'integer',
            'image'    => 'required|image|max:2000',
        ]);

        // Get last position
        $position = Slide::get('position')->sortByDesc('position')->value('position') + 1;

        // Create Slide
        $slide = new Slide;
        $slide->name = $request->input('name');
        $slide->position = $position;
        $slide->image = 'slide-1.jpg';

        $slide->save();

        // Get saved ID
        $id = $slide->id;

        // Upload file
        if($request->file('image') != '') {
            $filePath = 'images/home/slides/';
            $fileName = 'slide_' . $id . '.' . $request->file('image')->clientExtension();
            $this->uploadFile($request, 'image', $filePath, $fileName, height: 640, thumbnails: true);
        }

        // Update Slide filename and position
        $slide = Slide::find($id);
        $slide->image = $fileName;

        if($slide->position != $request->input('position')) {
            $this->movePosition('slides', $request->input('position'), $slide->position);
            $slide->position = $request->input('position');
        }

        // Save new Slide data
        $slide->save();

        return redirect(route('getSlides'));
    }

    public function delSlide(Request $request) 
    {
        $slide = Slide::find($request->route('id'));
        $this->deleteFile('images/home/slides/', $slide->image, true);
        $this->movePosition('slides', Slide::get('position')->sortByDesc('position')->value('position'), $slide->position);
        Slide::destroy($request->route('id'));

        return ['url' => '/adm/slides'];
    }
}