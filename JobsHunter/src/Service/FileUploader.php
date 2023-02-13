<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

class FileUploader{
    private $brochuresDirectory;    // form images [jpg, jpeg, png]
    private $documentsDirectory;    // form documents [pdf]
    private $filesystem;

    public function __construct($brochuresDirectory, $documentsDirectory){
        $this->brochuresDirectory = $brochuresDirectory;
        $this->documentsDirectory = $documentsDirectory;
        $this->filesystem = new Filesystem();
    }

    public function upload(UploadedFile $file){
        $fileMimeType = $file->getClientMimeType();
        
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFileName = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
        $fileName = $safeFileName.'-'.uniqid().'.'.$file->guessExtension();
        try {
            // check if $fileMimeType match the RegEx pattern "image/*"
            if (fnmatch("image/*", $fileMimeType)) {
                $file->move($this->getBrochuresDirectory(), $fileName);
                dump(" file '".$fileName."' moved to '".$this->getBrochuresDirectory()."'.");
            }elseif (fnmatch("application/pdf", $fileMimeType)) {
                $file->move($this->getDocumentsDirectory(), $fileName);
                dump(" file '".$fileName."' moved to '".$this->getDocumentsDirectory()."'.");
            }else{
                // return null if $fileMimeType isn't PDF nor IMAGE[jpg, png, gif, ...]
                dump("file '".$fileName."' won't move to upload folder, MimeType not supported!");
                return null;
            }
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
            dump($e->getMessage());
            $fileName = null;
        }
        return $fileName;
    }

    public function remove(string $fileAbsolutePath): bool{
        dump("trying to remove file '".$fileAbsolutePath."' ...");
        if ($this->isFileExists($fileAbsolutePath)) {
            try {
                $this->filesystem->remove($fileAbsolutePath);
                dump("file: '".$fileAbsolutePath."' removed.");
                return true;
            } catch (\Throwable $th) {
                dump($th);
                return false;
            }
        }else{
            dump("file '".$fileAbsolutePath."' does not exist !");
        }
        dump("file '".$fileAbsolutePath."' could not be removed !");
        return false;
    }

    public function isFileExists(string $fileAbsolutePath): bool{
        return $this->filesystem->exists($fileAbsolutePath);
    }

    public function getBrochuresDirectory(){
        return $this->brochuresDirectory;
    }

    public function getDocumentsDirectory(){
        return $this->documentsDirectory;
    }
}