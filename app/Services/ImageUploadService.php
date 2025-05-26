<?php 
namespace App\Services;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageUploadService{

    protected $file;
    protected $path = 'uploads/';
    protected $resize = [300, 300];
    protected $quality = 90;
    protected $webp = true;
    protected $oldImage = null;
    protected $imageName;



    public function __construct($file)
    {
        $this->file = $file;
        $this->imageName = time() . '_' . rand(1000, 9999) . '.webp';
    }

    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    public function setResize(int $width, int $height): self
    {
        $this->resize = [$width, $height];
        return $this;
    }

    public function setOldImage(string $oldImagePath): self
    {
        $this->oldImage = $oldImagePath;
        return $this;
    }

    public function upload(): string
    {
        $manager = new ImageManager(new Driver());
        $publicPath = public_path($this->path);

        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }

        $image = $manager->read($this->file)
            ->scaleDown(1000)
            ->cover($this->resize[0], $this->resize[1])
            ->toWebp($this->quality)
            ->save($publicPath . $this->imageName);

        // পুরাতন ছবি থাকলে ডিলিট করো
        if ($this->oldImage && File::exists(public_path($this->oldImage))) {
            File::delete(public_path($this->oldImage));
        }

        return $this->path . $this->imageName;
    }








}
