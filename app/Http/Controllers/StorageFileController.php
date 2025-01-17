<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageFileController extends Controller
{
    private function serveFile($disk, $filename)
    {
        if (Storage::disk($disk)->exists($filename)) {
            $file = Storage::disk($disk)->get($filename);
            $contentType = Storage::disk($disk)->mimeType($filename);
            return response($file, 200)->header('Content-Type', $contentType);
        } else {
            abort(404, 'File not found');
        }
    }

    public function StorageBook(string $filename)
    {
        return $this->serveFile('book', $filename);
    }
}
