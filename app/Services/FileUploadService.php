<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    public function uploadFile($file)
    {
        // Generate a unique name for the file
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'public' disk (you can configure other disks as needed)
        Storage::disk('public')->putFileAs('document', $file, $fileName);

        // Return the file path for future use (e.g., storing in the database)
        return 'document/' . $fileName;
    }

    public function uploadImage($file)
    {
        // Generate a unique name for the file
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'public' disk (you can configure other disks as needed)
        Storage::disk('public')->putFileAs('image', $file, $fileName);

        // Return the file path for future use (e.g., storing in the database)
        return 'image/' . $fileName;
    }
}