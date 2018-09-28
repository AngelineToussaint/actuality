<?php

class Article
{
    private $_title;
    private $_picture;
    private $_content;

    /**
     * Article constructor.
     * @param string $title
     * @param string $picture
     * @param string $content
     */
    public function __construct($title, $picture, $content)
    {
        $this->_title = $title;
        $this->_picture = $picture;
        $this->_content = $content;
    }

    public static function get3Last(){
        $news = Database::query("SELECT * FROM post ORDER BY id DESC LIMIT 3");
        return $news;

    }

    public static function getArticle($id){
        $post = Database::queryFirst("SELECT * FROM post WHERE id = ?", [
           $id
        ]);
        return $post;
    }

    public function addArticle(){
        Database::exec('INSERT INTO post(title, picture, content, date, user_id) VALUES (?, ?, ?, ?, ?)',
        [$this->_title, $this->_picture, $this->_content, time(), $_SESSION['user']['id']]);
    }

    public static function getComments($postId) {
        $comments = Database::query('SELECT * FROM comment, user WHERE post_id = ? AND comment.user_id = user.id', [
            $postId
        ]);
        return $comments;
    }

    public static function previous($id) {
        $prevId = Database::queryFirst('SELECT id FROM post WHERE id < ? ORDER BY id DESC', [$id]);
        return $prevId;
    }

    public static function next($id) {
        $nextId = Database::queryFirst('SELECT id FROM post WHERE id > ?', [$id]);
        return $nextId;
    }
}