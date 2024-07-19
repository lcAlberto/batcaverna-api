<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function uploadImage2(Request $request, $currentImage = null, $path = 'public/images')
    {

        if ($currentImage) {
            Storage::delete($path . '/' . $currentImage);
        }
        dd($request->avatar);

        $imageName = time() . '.' . $request->avatar->extension();
        $storagePath = $request->avatar->storeAs($path, $imageName);

        return Storage::url($storagePath);
    }

    public function uploadImage(Request $request, $currentImage = null, $path = 'public/images')
{
    // Verifique se o avatar é uma string base64
    if ($request->has('avatar') && is_string($request->avatar)) {
        $base64Image = $request->avatar;

        // Decodifique o base64 para um binário
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

        // Gere um nome único para a imagem
        $imageName = time() . '.png'; // Supondo que a imagem base64 seja um PNG, ajuste conforme necessário

        // Defina o caminho completo para salvar a imagem
        $storagePath = $path . '/' . $imageName;

        // Salve a imagem na storage
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

    return null; // Ou algum valor padrão se não houver avatar
}
}