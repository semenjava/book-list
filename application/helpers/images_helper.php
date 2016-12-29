<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Получаем имя для thumb'a
 * @param $name - имя изображения
 */
function get_thumb_name($name = "")
{
    $image = substr($name, 0, strlen($name) - 4);
    $extension = substr($name, strlen($name) - 4, 4);
    
    return $image . "_thumb" . $extension;
}

/* End of file: images_helper.php */
/* Location: ./backend/helpers/images_helper.php */