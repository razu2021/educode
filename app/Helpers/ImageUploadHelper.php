<?php 
namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Str;

class ImageUploadHelper
{
    public static function uploadImage($image, $folder = 'uploads/website', $width = 370, $height = 500)
    {
        $manager = new ImageManager(new Driver()); // image manager 

        $imageName = Str::random(10) . '_' . time() . '.webp';   // crate image name 

        $folderPath = public_path($folder);
        
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $manager->read($image)
            ->resize($width, $height)
            ->encode(new WebpEncoder(quality: 90)) // ✅ Updated line
            ->save($folderPath . '/' . $imageName);

        return $imageName;
    }
}
