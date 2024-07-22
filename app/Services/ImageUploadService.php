<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function uploadImage(Request $request, $currentImage = null, $path = 'public/images')
    {
        if ($request->has('avatar') && is_string($request->avatar)) {
            $base64Image = $request->avatar;

            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            $imageName = time() . '.png';

            $storagePath = $path . '/' . $imageName;

            Storage::put($storagePath, $image);

            return Storage::url($storagePath);
        } elseif ($request->hasFile('avatar')) {
            if ($currentImage) {
                Storage::delete($path . '/' . $currentImage);
            }

            $imageName = time() . '.' . $request->avatar->extension();
            $storagePath = $request->avatar->storeAs($path, $imageName);

            return Storage::url($storagePath);
        }

        return null;
    }
}
