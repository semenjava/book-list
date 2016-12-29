<?php

class Catalog extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('catalog_model');
        $this->load->helper(array('form', 'url', 'html'));
    }

    public function index() {
        $pageData['title'] = "Каталог книг - главная";
        $pageData['books'] = $this->catalog_model->getAllBooks();
        if ($pageData['books'] == false) {
            $pageData['errDescription'] = "Книги не найдены";
        }

        $authors = $this->catalog_model->getAuthorList();
        $pageData['authors'] = $authors;

        $genres = $this->catalog_model->getGenresList();
        $pageData['genres'] = $genres;

        $this->load->view("main", $pageData);
    }

    public function bookdetails($bookid) {
        $pageData['bookdetails'] = $this->catalog_model->getBookDetails($bookid);
        if ($pageData['bookdetails'] == false) {
            $pageData['errDescription'] = "Выбранная книга не найдена";
        }
        $pageData['title'] = $pageData['bookdetails']['title'];
        $this->load->view("bookdetails", $pageData);
    }

    public function createBook() {
        $post = $this->input->post();
        $post['img'] = $this->do_upload($_FILES);

        $this->catalog_model->ceateBook($post);
        redirect('/', 'refresh');
    }

    function do_upload($files) {
        $this->load->library("Image_uploader");
        $this->load->helper("images_helper");
        $data = array();

        // Получаем данные пользователя
        $config = array(
            'width' => 500,
            'height' => 300,
            'thumb' => true,
            'image_field' => 'image'
        );
        $this->image_uploader->init($config);
        $data['image'] = $this->image_uploader->upload();
        
        $uploaddir = dirname(__FILE__) . "/../../uploads/originals/";
        $uploadfile = $uploaddir . basename($files['img']['name']);

        if (move_uploaded_file($files['img']['tmp_name'], $uploadfile)) {
//            echo "Файл корректен и был успешно загружен.\n";
        } else {
//            echo "Возможная атака с помощью файловой загрузки!\n";
        }
        
        return $files['img']['name'];

    }
    
    public function createAuthor() {
        $post = $this->input->post();
        $this->catalog_model->addAuthor($post);
        redirect('/', 'refresh');
    }
    
    public function deleteBook() {
        $post = $this->input->post();
        $result = $this->catalog_model->deleteBook($post['id']);
        die(json_encode(array('id'=>$result),true));
    }
    
    public function editor() {
        $post = $this->input->post();
        $result = $this->catalog_model->getBookDetails($post['id']);
        die(json_encode(array('data'=>$result),true));
    }
    
    public function editorBook() {
        $post = $this->input->post();
        $post['img'] = $this->do_upload($_FILES);
        $this->catalog_model->updateBook($post);
        redirect('/', 'refresh');
    }

}
