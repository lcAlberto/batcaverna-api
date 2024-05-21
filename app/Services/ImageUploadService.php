<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function uploadImage(Request $request, $currentImage = null, $path = 'public/images')
    {

        if ($currentImage) {
            Storage::delete($path . '/' . $currentImage);
        }

        $imageName = time() . '.' . $request->avatar->extension();
        $storagePath = $request->avatar->storeAs($path, $imageName);

        return Storage::url($storagePath);
    }
}