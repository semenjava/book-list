<?php
class Catalog_model extends CI_Model {
    
//    function Catalog_model() {
//        parent::CI_Model();
//    }
    
    public function getAllBooks() {
        $sql = "SELECT * FROM books";
        $res = $this->db->query($sql);
        $booksData = $res->result_array();
        if (count($booksData) == 0) {
            return false;
        }
        
        foreach ($booksData as $key => $value) {
            $sql_genre= 'SELECT * FROM `genre` WHERE `id` in ('.$value['genre'].')';
            $sql_author= 'SELECT * FROM `author` WHERE `id` in ('.$value['author'].')';
            $res1 = $this->db->query($sql_genre);
            $res2 = $this->db->query($sql_author);
            $booksData[$key]['genre'] = $res1->result_array();
            $booksData[$key]['author'] = $res2->result_array();
        }
        
        return $booksData;
    }
    
    public function getBookDetails($bookId) {
        $qGetBook = "SELECT * FROM books WHERE id=?";
        $res = $this->db->query($qGetBook, array($bookId));
        $bookData = $res->result_array();
        if (count($bookData) == 0) {
            return false;
        }
            $sql_genre= 'SELECT * FROM `genre` WHERE `id` in ('.$bookData[0]['genre'].')';
            $sql_author= 'SELECT * FROM `author` WHERE `id` in ('.$bookData[0]['author'].')';
            $res1 = $this->db->query($sql_genre);
            $res2 = $this->db->query($sql_author);
            $bookData[0]['genre'] = $res1->result_array();
            $bookData[0]['author'] = $res2->result_array();

        return $bookData[0];
    }
    
    public function getAuthorList() {
        $sql = 'SELECT * FROM `author`';
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function getGenresList() {
        $sql = 'SELECT * FROM `genre`';
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
    public function ceateBook($post) {
        $post['author']= implode(',', $post['author']);
        $post['genre']= implode(',', $post['genre']);
        $this->db->insert('books', $post);
    }
    
    public function addAuthor($post) {
        $this->db->insert('author', $post);
    }
    
    public function deleteBook($id) {
        $sql = 'DELETE FROM `books` WHERE `id`=?';
        $this->db->query($sql, array($id));
        return $id;
    }
    
    public function editeBook($book_id) {
        $sql = '';
        $res = $this->db->query($sql, array($book_id));
        $result = $res->result_array();
        return $result;
    }
    
    public function updateBook($post) {
        $post['author']= implode(',', $post['author']);
        $post['genre']= implode(',', $post['genre']);
        $id = $post['id'];
        unset($post['id']);
        $sql_img = $post['img']?',`img`="'.$post['img'].'"':'';
        $sql = 'UPDATE `books` SET `title`="'.$post['title'].'",`author`="'.$post['author'].'",`genre`="'.$post['genre'].'",`annotation`="'.$post['annotation'].'" '.$sql_img.' WHERE `id`=?';
        $this->db->query($sql, array($id));
        return true;
    }
}
?>