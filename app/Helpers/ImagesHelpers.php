<?php

namespace App\Helpers;

class ImagesHelpers
{
    public $path = "uploads/";

    public function store(object|array $files, string $dir = null, string $disk = 'public') {
        if (is_array($files)) {
            $filePath = [];
            foreach ($files as $file) {
                $newNameFile = time() . $file->getClientOriginalName();
                $filePath[] = 'storage/' . $file->storeAs($this->path . $dir, $newNameFile, $disk);
            }
            return $filePath;
        } else {
            $newNameFile = time() . $files->getClientOriginalName();
            return 'storage/' . $files->storeAs($this->path . $dir, $newNameFile, $disk);
        }
    }
}
