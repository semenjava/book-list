<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FileHelper {
    protected $serviceLocator;
    protected $targetDir;

    protected $quality = 90;

    protected $postfixes = array(
        '_thumb',
//        '_thumb_medium',
//        '_small',
//        '_large'
    );

    public function setTargetDir($targetDir='') {
//        $sm = $this->getServiceLocator()->get('config');
        if($targetDir!='')
            $this->targetDir = $targetDir;
        else
            $this->targetDir = __DIR__.'/../../uploads/';

    }

    
    function ResizeImage ($name, $size = 500, $quality = 100, $filename='')
    {
        /*
        * Адрес директории для сохранения картинки
        */
        $dir  = $this->targetDir;
        if($filename=='')
        $filename = $this->targetDir.$name;
        
        $info = pathinfo($filename);

        /*
        * Извлекаем формат изображения, то есть получаем 
        * символы находящиеся после последней точки
        */
        $ext  = strtolower(strrchr(basename($filename), "."));
        
        /*
        * Допустимые форматы
        */
        $extentions = array('.jpg', '.gif', '.png', '.bmp');
    
        if (in_array($ext, $extentions)) {   
//             $percent = $size; // Ширина изображения миниатюры
        
             list($width, $height) = getimagesize($filename); // Возвращает ширину и высоту
             if($width>$size){
                 $koe=$width/$size; //коэфецент
                 if($koe<3){
                     return $name;
                 }
             }else{
                 return $name;
             }
             
             $newwidth    = $size;
             $newheight    = ceil ($height/$koe);
             
             $postfix = '-'.$newwidth.'-'.$newheight;
             $new_filename = $info['filename'] . $postfix . '.' .$info['extension'];
             if (file_exists($this->targetDir.$new_filename)) {
                return $new_filename;
             }
        
             $thumb = imagecreatetruecolor($newwidth, $newheight);
        
             switch ($ext) {
                 case '.jpg':
                     $source = @imagecreatefromjpeg($filename);
                     break;
                
                  case '.gif':
                     $source = @imagecreatefromgif($filename);
                     break;
                
                  case '.png':
                     $source = @imagecreatefrompng($filename);
                     break;
                
                  case '.bmp':
                      $source = @imagecreatefromwbmp($filename);
              }
    
            /*
            * Функция наложения, копирования изображения
            */
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        
            /*
            * Создаем изображение
            */
            switch ($ext) {
                case '.jpg':
                    imagejpeg($thumb, $dir . $new_filename, $quality);
                    break;
                    
                case '.gif':
                    imagegif($thumb, $dir . $new_filename);
                    break;
                    
                case '.png':
                    imagepng($thumb, $dir . $new_filename, $quality);
                    break;
                    
                case '.bmp':
                    imagewbmp($thumb, $dir . $new_filename);
                    break;
            }    
    } else {
        return $name;
    }
    
    /* 
    *  Очищаем оперативную память сервера от временных файлов, 
    *  которые потребовались для создания миниатюры
    */
    
        @imagedestroy($thumb);         
        @imagedestroy($source);  
            
        return $new_filename;
    }

}