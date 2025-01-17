<?php

namespace App\Services;

use App\Services\Contracts\FileUploadServiceInterface;
use Illuminate\Support\Facades\Storage;

class FileUploadService implements FileUploadServiceInterface
{
    public function uploadFile($file, $path, $disk = 'public')
    {
        return Storage::disk($disk)->put($path, $file);
    }

    public function deleteFile($path, $disk = 'public')
    {
        return Storage::disk('public')->delete($path);
    }
}