<?php

namespace App\Services\ImageManager;

use App\Services\Contracts\FileUploadServiceInterface;
use App\Services\Interfaces\FileServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Gd\Driver;
use Intervention\Image\Drivers\Gd\Encoders\GifEncoder;
use Intervention\Image\Drivers\Gd\Encoders\JpegEncoder;
use Intervention\Image\Drivers\Gd\Encoders\PngEncoder;
use Intervention\Image\Drivers\Gd\Encoders\WebpEncoder;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;

class ImageService implements FileUploadServiceInterface
{
    /**
     * @param string $disk
     * @param Request $request
     * @param string $name
     * @param string $convert 'original|webp|jpg|png|gif|'
     * @param int $quality 0-100
     * @return string
     */
    public function uploadFile($file, $path, $disk = 'public')
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $path . '/' . $filename;

        if (Storage::disk($disk)->put($filePath, file_get_contents($file))) {
            return $file->getClientOriginalName();
        }

        throw new \Exception('File upload failed.');
    }


    public function deleteFile($path, $disk = 'public')
    {
        return Storage::disk($disk)->delete($path);
    }
}
