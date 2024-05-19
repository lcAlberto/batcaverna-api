<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function uploadImage(Request $request, $currentImage = null, $path = 'public/images')
    {
        dd('aki');
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($currentImage) {
            Storage::delete($path . '/' . $currentImage);
        }

        $imageName = time() . '.' . $request->avatar->extension();
        $request->avatar->storeAs($path, $imageName);

        return $imageName;
    }
}
