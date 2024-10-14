<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    /**
     * @param UploadedFile $uploadedFile
     * @param mixed $folder
     * @param string $disk
     * @param mixed $filename
     * @return bool|string
     */
    public function uploadOne(UploadedFile $uploadedFile, string $folder = null, string $disk = 'public', string $filename = null): bool|string
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
        return $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
    }
}
