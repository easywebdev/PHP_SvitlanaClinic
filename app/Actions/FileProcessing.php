<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use PhpOption\None;

trait FileProcessing 
{
    public function uploadFile(Request $request, string $inputName, string $filePath, string $fileName, int $width = null, int $height = null, bool $thumbnails = null) 
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

        // Create Thumbnails
        if($thumbnails) {
            $image->scale(height: 100);
            $image->save((public_path($filePath . "thumbnails/" . $fileName)));
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
        if(file_exists($filePath . $fileName)) {
            //Storage::delete(public_path($filePath . $fileName));
            unlink($filePath . $fileName);
        }

        // Delete thumbnail
        if($thumbnails && file_exists($filePath . 'thumbnails/' . $fileName)) {
            //Storage::delete(public_path($filePath . 'thumbnails/' . $fileName));
            unlink($filePath . 'thumbnails/' . $fileName);
        }
    }
}