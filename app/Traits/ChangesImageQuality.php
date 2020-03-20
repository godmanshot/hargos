<?php

namespace App\Traits;
use Intervention\Image\Facades\Image;

trait ChangesImageQuality {
    public function changeQuality($image, array $qualities) {
        $img = Image::make(storage_path('app/public/'.$image));
        foreach($qualities as $connectionType => $quality) {
            $path = explode('/', $image);
            $imageName = array_pop($path);
            $path[] = $connectionType . '_' . $imageName;
            $path = implode('/', $path);
            $img->save(storage_path('app/public/' . $path), $quality);
        }
    }
}