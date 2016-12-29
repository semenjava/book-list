<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        // Обработка редиректов
        $redirects = $this->config->item('redirect_pages');
        $url = $this->uri->uri_string();
//var_dump($url);
        if (isset($redirects[$url]))
        {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: /" . $redirects[$url]);
            exit();
        }
//        else{
//            header("HTTP/1.1 301 Moved Permanently");
//            header("Location: /404");
//            exit();
//        }

    }

}

/* End of file My_Controller.php */
/* Location: ./application/core/My_Controller.php */