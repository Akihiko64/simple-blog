<?php

namespace Akihiko64\Blog\models;

require_once "../blog/config.php";

class Post
{
    private $database;

    public function __construct(\mysqli $mysql)
    {
        $this->database = $mysql;  
    }

    public function addPost(string $title, string $content):void
    {
        $insertPost = $this->database->prepare("INSERT INTO artigos (titulo, conteudo) VALUES(?,?);");
        $insertPost->bind_param("ss", $title, $content);
        $insertPost->execute();
    }

    public function removePost(string $id): void
    {
        $removePost = $this->database->prepare("DELETE FROM artigos WHERE id=?");
        $removePost->bind_param("s", $id);
        $removePost->execute();
    }

    public function getAllPosts(): array
    {
        $posts = $this->database->query("SELECT id, titulo, conteudo FROM artigos");
        $posts = $posts->fetch_all(MYSQLI_ASSOC);
        return $posts;
    }

    public function searchById(string $id): array
    {
        $post = $this->database->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        $post->bind_param("s", "$id");
        $post->execute();
        $post = $post->get_result()->fetch_assoc();

        return $post;
    }

    public function editPost(string $id, string $title, string $content): void
    {
        $editPost = $this->database->prepare("UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?");
        $editPost->bind_param("sss", $title, $content, $id);
        $editPost->execute();
    }
}