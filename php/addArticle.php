<?php
require_once 'classes/Connection.php';
require_once 'classes/Article.php';

try {
    $article = new Article();
//It takes the variables from Bikes class in Bike.php
    $article->article_body = $_POST['article_body'];
    $article->genre_id = $_POST['genre_id'];
    $article->writer_id = $_POST['writer_id'];
    $article->main_headline = $_POST['main_headline'];
    $article->secondary_headline = $_POST['secondary_headline'];
    $article->date = $_POST['date'];
    $article->time = $_POST['time'];
    
    $article->save();
//This saves it and sends it to index.php
    header("Location: index.php");
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>