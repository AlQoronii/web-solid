<?php
// filepath: /d:/Project/web-solid/app/Services/FileUploadService.php
namespace App\Services;

use App\Services\Contracts\FileUploadServiceInterface;
use Illuminate\Support\Facades\Storage;

class FileUploadService implements FileUploadServiceInterface
{
    public function uploadFile($file, $path, $disk = 'public')
    {
        $filePath = $file->store($path, $disk);
        return basename($filePath);
    }

    public function deleteFile($path, $disk = 'public')
    {
        return Storage::disk($disk)->delete($path);
    }
}