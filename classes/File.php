<?php namespace Datingapp;

interface FileInterface {
    public function upload();
    public function exits();
    public function download();
    public function getFileSize();
    public function isValidType();
    public function getFileLocation();
    public function deleteFile();
}


Class File implements FileInterface {

    function __construct($file, $location, $maxFilesize = 500000) {

        $this->file = $file;
        $this->location = strtolower($location);
        $this->status = 1;
        $this->maxFileSize = $maxFilesize;
        $this->imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    }

    function upload() {
        if ($this->status == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($this->file['tmp_name'], $this->location . ".$this->imageFileType")) {
                return $this->location . ".$this->imageFileType";
            } else {
                return false;
            }
        }
    }

    function download()
    {
        
    }

    
    function getFileLocation() {
        return $this->location . ".$this->imageFileType";
    }
    
    function deleteFile() {
        // Use unlink() function to delete a file 
        $filePointer = $this->getFileLocation();
        if (!unlink($filePointer)) { 
            return false;
        } else { 
            return true;
        } 
    }

    function exits() {
        if (file_exists($this->location)) {
            $uploadOk = 0;
            return true;
        }
        return false;
    }

    function getFileSize() {
        return $this->file->size;
    }

    function isFileSizeAllowed() {
        if ($this->file['size'] <= $this->maxFileSize) {
            return true;
        }
        return false;
    }

    function isValidType() {
        if ( $this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
            && $this->imageFileType != "gif" ) {
                $this->uploadOk = 0;
                return true;
        }
        return false;
    }

}



?>