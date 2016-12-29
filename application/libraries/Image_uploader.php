<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Библиотека для загрузки и обработки изображений
 * @author Andrew Savchenko <cwprogger@gmail.com>
 */
class Image_uploader {
    
    //экземпляр фреймворка
    private $CI;
    
    /**
     * Конструктор
     */
    function __construct()
    {
        $this->CI =& get_instance();
    }
    
    //настройки
    public $image_field = "";
    public $image_url = "";
    public $width = 0;
    public $height = 0;
    public $thumb = false;
    public $master_dim = "width";
    
    public $image = "";
    
    /**
     * Инициализация библиотеки
     * @param $settings - массив настроек
     */
    public function init($settings = array())
    {
        if (isset($settings['image_field'])) $this->image_field = $settings['image_field'];
        if (isset($settings['image_url'])) $this->image_url = $settings['image_url'];
        if (isset($settings['width'])) $this->width = $settings['width'];
        if (isset($settings['height'])) $this->height = $settings['height'];
        if (isset($settings['thumb'])) $this->thumb = $settings['thumb'];
        if (isset($settings['master_dim'])) $this->master_dim = $settings['master_dim'];
        
        return false;
    }
    
    /**
     * Загружаем изображение
     */
    public function upload()
    {
        //подключаем библиотеку для загрузки изображений
        $uploadConfig = array(
            'upload_path' => "./uploads/originals/",
            'allowed_types' => "gif|jpg|png",
            'encrypt_name' => true			
        );
        $this->CI->load->library("upload", $uploadConfig);
        $this->CI->upload->initialize($uploadConfig);
//        echo '<pre>';var_dump($this->CI->upload->data());die();
        //загружаем изображение
        if ($this->CI->upload->do_upload($this->image_field)){
            $upload_data = $this->CI->upload->data();
            $this->image = $upload_data['file_name'];
        } else $this->image = "";
        
        //уменьшаем изображение
        if ($this->image) $this->enlarge();
        
        return $this->image;
    }
    
    /**
     * Загружаем изображение по URL
     */
    public function load_from_url()
    {
        // Определяем разрешение изображения и сравниваем его с разрешенными
        $extension = substr($this->image_url, strlen($this->image_url) - 3, 3);
        if ($extension != "jpg" && $extension != "png" && $extension != "gif") return false;
        
        // Строка для формирования имени файла
        $string = "absdefghigklmnopqrstuvwxyz0123456789";
        $max = strlen($string) - 1;
        
        // Формируем уникальное имя файла
        while (true){
                $filename = "";
                for ($i = 0; $i < 32; $i++){
                        $filename .= substr($string, rand(0, $max), 1);
                }
                $filename .= "." . $extension;
                if ( ! file_exists(dirname(__FILE__) . "/../../uploads/originals/" . $filename)) break;
        }
        
        // Загружаем изображение
        $content = file_get_contents($this->image_url);
        $file = fopen(dirname(__FILE__) . "/../../uploads/originals/" . $filename, 'w');
        fputs($file, $content);
        fclose($file);
        
        // Указываем имя файла
        $this->image = $filename;
        
        // Уменьшаем изображение
        if ($this->image) $this->enlarge();
        
        // Возвращаем результат
        return $this->image;
    }
    
    /**
     * Уменьшаем изображение
     */
    public function enlarge()
    {
        //подключаем библиотеку для работы с изображениями
        $this->CI->load->library("image_lib");			
        $config = array(
            "width" => $this->width,
            "height" => $this->height,
            "maintain_ratio" => true,
            "master_dim" => $this->master_dim,
            "create_thumb" => $this->thumb,
            "source_image" => dirname(__FILE__) . "/../../uploads/originals/" . $this->image
        );
        
        if ( ! $this->width || ! $this->height)
        {
            unset($config['width']);
            unset($config['height']);
        }
        
        //получаем размеры изображения
        $size = getimagesize(dirname(__FILE__) . "/../../uploads/originals/" . $this->image);
        if ($size[0] < $this->width || $size[1] < $this->height){
                unset($config['width']);
                unset($config['height']);
        } else {
                $config['width'] = $this->width;
                $config['height'] = $this->height;
        }
        
        //уменьшаем изображение
        $this->CI->image_lib->initialize($config);
        $this->CI->image_lib->resize();
    }
    
}

/* End of file Image_uploader.php */
/* Location: ./backend/libraries/Image_uploader.php */