<?php

class PhotoUpload {
   protected $src; 
   const SIZEOFFILE=2*1024*1024;
   const UPLOAD_DIR='images';
   const AVAILABLE_TYPE=array(
            "image/jpeg",
            "image/jpg",
            "image/png",
            "image/gif",
        );
        public function validate() {
        $file = $_FILES['photo'];

        if (empty($_FILES['photo'])) {
            echo 'The file is absent';
            return false;
        } else if (!in_array($file['type'], self::AVAILABLE_TYPE)) {
           echo 'Invalid type of file';
            return false; 
        } else if ($file['size'] >= self::SIZEOFFILE) {
            echo 'File is too large. The size of your file should be less than 2 Mb';
        } else {
            return true;
        }
    }
    public function upload() {
        $file=$_FILES['photo'];
                $file_name_parts = explode(".", $file['name']);
		$file_extention = array_pop($file_name_parts);
		$file_base_name = implode("", $file_name_parts);
		$file_name = md5($file_base_name . rand(1, getrandmax()));
		$file_name .= '.' . $file_extention;
		$this->src = self::UPLOAD_DIR.'/'. $file_name;
		if (move_uploaded_file($file['tmp_name'], $this->src))
                {
                    
                    return $this;
                }else{
                    
                    return $this;
                }
    }
    public function addToDb() {
        if($this->src){
            $querry="INSERT INTO images (src) VALUES ('{$this->src}')";
            $dbh=new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
            $dbh->query($querry);
        }
        
        
    }
   
}
 


