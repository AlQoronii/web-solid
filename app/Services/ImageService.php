<?php

namespace App\Services\ImageManager;

use App\Services\Contracts\FileUploadServiceInterface;
use App\Services\Interfaces\FileServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
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
    public function uploadFile($file, $path, $disk = 'public'): string
    {
        try {
            $manager = new ImageManager(new Driver());
            $extension = $file->extension();
            $image = $manager->read($file);
            $convert = pathinfo($path, PATHINFO_EXTENSION);
            $quality = 75; // Default quality

            if ($convert === 'webp') {
                $image->encode(new WebpEncoder($quality));
                $extension = 'webp';
            } else if ($convert === 'jpg' || $convert === 'jpeg') {
                $image->encode(new JpegEncoder($quality));
                $extension = 'jpg';
            } else if ($convert === 'png') {
                $image->encode(new PngEncoder($quality));
                $extension = 'png';
            } else if ($convert === 'gif') {
                $image->encode(new GifEncoder($quality));
                $extension = 'gif';
            } else {
                $image->encode(new AutoEncoder($quality));
            }

            $imageName = time() . '-' . pathinfo($file->hashName(), PATHINFO_FILENAME) . "." . $extension;
            $image->save(storage_path('app/' . $imageName));
            Storage::disk($disk)->put($path, file_get_contents(storage_path('app/' . $imageName)));
            unlink(storage_path('app/' . $imageName));
            return $path;
        } catch (\Exception $e) {
            Log::error('Error occurred while uploading file: ' . $e->getMessage());
            throw new \Exception('Failed to upload file.');
        }
    }


    public function deleteFile($path, $disk = 'public')
    {
        return Storage::disk($disk)->delete($path);
    }
}
