<?php namespace Datingapp;

interface FileInterface {
    public function upload();
    public function exits();
    public function download();
    public function getFileSize();
    public function isValidType();
    public function deleteFile();
}


Class File implements FileInterface {

    function __construct($file, $location, $maxFilesize = 2000000) {

        $this->file = $file;
        $this->location = strtolower($location);
        $this->status = true;
        $this->maxFileSize = $maxFilesize;
        $this->imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        // $this->imageFileType = $this->file['type'] */;

        // Determine if allowed file extention / filetype
        if (!$this->isValidType()) {
            $this->error = array(
                "status" => "false",
                "msg" => "invalid image type"
            );
        }
        
        // return $this->isFileSizeAllowed(); 
        // Determine if correct file size
        if (!$this->isFileSizeAllowed()) {
            $resizeScale = round(1 - ($this->maxFileSize / $this->getFileSize()), 2);
            $this->resizeAndUpload($resizeScale);
            // Resize image x times
            
        } else {

        }

    }

    function upload() {
        if ($this->status == false) {
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
    
    function deleteFile() {
        // Use unlink() function to delete a file 
        $filePointer = $this->location . ".$this->imageFileType";
        return !unlink($filePointer);
    }

    function exits() {
        if (file_exists($this->location)) {
            $uploadOk = 0;
            return true;
        }
        return false;
    }

    function resizeAndUpload($percentage = 0.5) {

        // (A) READ THE ORIGINAL IMAGE
        $original = '';
        switch ($this->imageFileType) {
            case 'jpeg':
                $original = imagecreatefromjpeg($this->file['tmp_name']);
                break;
            case 'jpg':
                $original = imagecreatefromjpeg($this->file['tmp_name']);
                break;
            case 'png':
                $original = imagecreatefrompng($this->file['tmp_name']);
                break;
        };


        list($width, $height) = getimagesize($this->file['tmp_name']);

        // (B) EMPTY CANVAS WITH REQUIRED DIMENSIONS
        $newwidth = ceil($width * $percentage);
        $newheight = ceil($height * $percentage);
        $resized = imagecreatetruecolor($newwidth, $newheight); // SMALLER BY 50%

        // // (C) RESIZE THE IMAGE
        // // imagecopyresampled(TARGET, SOURCE, TX, TY, SX, SY, TWIDTH, THEIGHT, SWIDTH, SHEIGHT)
        imagecopyresampled($resized, $original, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        // // (D) SAVE/OUTPUT RESIZED IMAGE
        switch ($this->imageFileType) {
            case 'jpeg':
                imagejpeg($resized, "$this->location-resized$newwidth"."x"."$newheight-.jpg");
                $this->location = "$this->location-resized$newwidth"."x"."$newheight-.jpg";
                break;
            case 'jpg':
                imagejpeg($resized, "$this->location-resized$newwidth"."x"."$newheight-.jpg");
                $this->location = "$this->location-resized$newwidth"."x"."$newheight-.jpg";
                break;
            case 'png':
                imagepng($resized, "$this->location-resized$newwidth"."x"."$newheight-.png");
                $this->location = "$this->location-resized$newwidth"."x"."$newheight-.png";
                break;
        };
        

        // // (E) OPTIONAL - CLEAN UP
        imagedestroy($original);
        imagedestroy($resized);
        
        return $this->status;
    }

    function getFileSize() {
        return $this->file['size'];
    }

    function isFileSizeAllowed() {
        return $this->getFileSize() <= $this->maxFileSize;
    }

    function isValidType() {
        $allowed = array('png', 'jpg', 'jpeg');
        return in_array($this->imageFileType, $allowed);
    }
    
    }



?>