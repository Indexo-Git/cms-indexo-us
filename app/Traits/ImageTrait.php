<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use JetBrains\PhpStorm\ArrayShape;

trait ImageTrait
{
    /**
     * Process image function
     * @param UploadedFile $image
     * @param array $options
     * @return array
     */
    public function processProductImage(UploadedFile $image, array $options): array
    {
        // Perform orientation using intervention
        $orientated = \Image::make($image)->orientate();
        // Get orientation
        $orientation = $this->getOrientation($orientated->width(),$orientated->height());
        //--------------------------- Save original image
        $results[] = $this->resize($orientated, false, $orientation, 0,0, $options['id'],$options['folder'].'/originals/',  $options['number']);
        //--------------------------- Save resized squared image for main page 600x600
        $results[] = $this->resize($orientated, true, $orientation, 600, 600, $options['id'], $options['folder'].'/single/', $options['number']);
        //--------------------------- Save resized squared image for grid 290x290
        $results[] = $this->resize($orientated, true, $orientation, 290, 290, $options['id'], $options['folder'].'/grid/', $options['number']);
        //--------------------------- Save resized squared image for carousel 90x90
        $results[] = $this->resize($orientated, true, $orientation, 90, 90, $options['id'], $options['folder'].'/carousel/', $options['number']);

        return $results;
    }

    /**
     * Process image function
     * @param UploadedFile $image
     * @param array $options
     * @return array
     */
    public function processCustomImage(UploadedFile $image, array $options): array
    {
        // Perform orientation using intervention
        $orientated = \Image::make($image)->orientate();
        // Get orientation
        $orientation = $this->getOrientation($orientated->width(),$orientated->height());
        //--------------------------- Save custom image
        $results[] = $this->resize($orientated, true, $orientation, $options['width'], $options['height'], $options['id'], $options['folder']);
        return $results;
    }

    /**
     * Resize image, crop and format image for any type of grid page
     * @param Image $image
     * @param int $resize
     * @param string $orientation
     * @param int $width
     * @param int $height
     * @param int $id
     * @param string $path
     * @param int|null $number
     * @return array
     */
    #[ArrayShape(['jpg' => "bool", 'webp' => "bool"])] private function resize(Image $image, int $resize, string $orientation, int $width, int $height, int $id, string $path, int $number = null): array
    {
        $path = ($number) ? $path.$id.'-'.$number : $path.$id;
        $this->ifExistsDelete($path.'.jpg');
        $this->ifExistsDelete($path.'.webp');
        if($resize){
            if( $orientation == "landscape") $image->resize(null, $height, function ($constraint) { $constraint->aspectRatio(); });
            if( $orientation == "portrait") $image->resize($width, null ,function ($constraint) { $constraint->aspectRatio(); });
            $image->resizeCanvas($width, $height, 'center', false, array(255, 255, 255, 0));
        }
        return [ 'jpg' => Storage::disk('public')->put($path.'.jpg',$image->encode('jpg')) , 'webp' => Storage::disk('public')->put($path.'.webp',$image->encode('webp'))];
    }

    /**
     * Get orientation from image
     * @param int $width
     * @param int $height
     * @return string $orientation
     */
    private function getOrientation(int $width, int $height): string
    {
        return $width > $height ? "landscape" : "portrait";
    }

    /**
     * Delete image if exists
     * @param string $path
     * @return void
     */
    private function ifExistsDelete(string $path){
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Duplicate all image from an image/product
     * @param string $folder
     * @param int $copy
     * @param int $new
     * @return void
     */
    public function duplicateImage(string $folder, int $copy, int $new){
        $types = ['carousel', 'grid', 'originals', 'single'];
        foreach ($types as $type){
            if($folder == 'products'){
                for($x = 1; $x <= 5; $x++){
                    $pathCopy = $folder.'/'.$type.'/'.$copy.'-'.$x;
                    $pathNew = $folder.'/'.$type.'/'.$new.'-'.$x;
                    $this->copyImage($pathCopy, $pathNew);
                }
            } else{
                $pathCopy = $folder.'/'.$type.'/'.$copy;
                $pathNew = $folder.'/'.$type.'/'.$new;
                $this->copyImage($pathCopy, $pathNew);
            }
        }
    }

    /**
     * Copy image
     * @param string $pathCopy
     * @param string $pathNew
     * @return void
     */
    private function copyImage(string $pathCopy, string $pathNew){
        Storage::disk('public')->copy($pathCopy.'.jpg', $pathNew.'.jpg');
        Storage::disk('public')->copy($pathCopy.'.webp', $pathNew.'.webp');
    }

    /**
     * Delete all formats from one image
     * @param string $folder
     * @param int $id
     * @param int|null $number
     * @return void
     */
    public function deleteOne(string $folder, int $id, int $number = null){
        $types = ['carousel', 'grid', 'originals', 'single'];
        foreach ($types as $type){
            $path = $number ? $folder.'/'.$type.'/'.$id.'-'.$number : $folder.'/'.$type.'/'.$id;
            $this->ifExistsDelete($path.'.jpg');
            $this->ifExistsDelete($path.'.webp');
        }
    }

    /**
     * Delete all images from one product/image
     * @param string $folder
     * @param int $id
     * @return void
     */
    public function deleteAll(string $folder, int $id){
        $types = ['carousel', 'grid', 'originals', 'single'];
        foreach ($types as $type){
            if($folder == 'products') {
                for ($x = 1; $x <= 5; $x++) {
                    $path = $folder . '/' . $type . '/' . $id . '-' . $x;
                    $this->ifExistsDelete($path . '.jpg');
                    $this->ifExistsDelete($path . '.webp');
                }
            } else {
                $path = $folder . '/' . $type . '/' . $id;
                $this->ifExistsDelete($path . '.jpg');
                $this->ifExistsDelete($path . '.webp');
            }
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @param int $counter
     * @param int $total
     * @param array $results
     * @param string $folder
     * @return array
     */
    public function loopMakeImages(Request $request, int $id, int $counter, int $total, array $results, string $folder): array
    {
        for($x = $counter; $x <= $total; $x++){
            if($request->hasFile('image-'.$x)) $results[] = $this->processProductImage($request->file('image-'.$x), ['folder' => $folder, 'id' => $id, 'number' => $x]);
        }
        return $results;
    }
}
