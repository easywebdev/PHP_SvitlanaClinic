<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use PhpOption\None;

trait FileProcessing 
{
    public function uploadFile(Request $request, string $inputName, string $filePath, string $fileName, int $width = null, int $height = null) 
    {
        // Upload original file
        $file = $request->file($inputName);
        $file->move($filePath, $fileName);

        // Resize image if parameters set
        if($width || $height) {
            $manager = new ImageManager(new Driver());
            $image = $manager->read($filePath . $fileName);
            if(!$height) {
                $image->scale(width: $width);
            } 
            elseif(!$width) {
                $image->scale(height: $height);
            }
            else {
                $image->resize($width, $height);
            }
            
            $image->save((public_path($filePath . $fileName)));
        }
        
    }

    /**
     * @param string $filePath
     * @param $fileName
     * @param bool $thumbnails
     */
    public function deleteFile(string $filePath, $fileName, bool $thumbnails)
    {
        // Delete file
        if(Storage::exists($filePath . $fileName)) {
            Storage::delete($filePath . $fileName);
        }

        // Delete thumbnail
        if($thumbnails && Storage::exists($filePath . 'thumbnails/' . $fileName)) {
            Storage::delete($filePath . 'thumbnails/' . $fileName);
        }
    }
}