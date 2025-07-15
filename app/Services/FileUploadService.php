<?php
namespace App\Services;

use Illuminate\Support\Facades\File;

class FileUploadService{

    protected $file ;
    protected $path = 'uploads/';
    protected $filename ;
    protected $oldfile ;
    protected $allowedExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'mp3', 'mp4', 'wav', 'mov'];
    protected $maxSize = 10485760; // 10MB




    /**=====  $file methods ====== */
    public function __construct($file){
        $this->file = $file ;
        $this->filename = time() . '-' . rand(10000, 100000) . '.' . $file->getClientOriginalExtension();
    }
    

    /**=====  validation methods methods ====== */
    public function validate(){
        $extension = strtolower($this->file->getClientOriginalExtension());

        if(!in_array($extension, $this->allowedExtensions)){
            return false ;
        }
        return true ;
    }
    

    /**=====  setup directory methods ====== */
    public function setPath(string $foldername){
        $this->path = $foldername;
        return $this;
    }


    public function setOldFile(string $oldfile): self {
    $this->oldfile = $oldfile;
    return $this;
    }

  
   

  public function upload(): ?string {
    if (!$this->validate()) {
        return null; // ভ্যালিড না হলে null রিটার্ন করবে
    }

    $uploadPath = public_path($this->path);

    if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0755, true);
    }

    $this->file->move($uploadPath, $this->filename);

    // পুরানো ফাইল ডিলিট করো যদি থাকে
    $this->deleteOldFile();

    return $this->path . $this->filename;
}

  public function deleteOldFile() {
        if ($this->oldfile && File::exists(public_path($this->oldfile))) {
            File::delete(public_path($this->oldfile));
        }
    }






}