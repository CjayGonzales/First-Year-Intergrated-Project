<?php

class Article
{
    public $article_id;
    public $article_body;
    public $main_headline;
    public $secondary_headline;
    public $date;
    public $time;
    public $genre_id;
    public $writer_id;

/////////////////////////////////////////////////////////////////////////////
/////////////Add Article function////////////////////////////////////////////
    public function save() {
//This saves it to its respective names
        $params = array(
            'article_body' => $this->article_body,
            'genre_id' => $this->genre_id,
            'writer_id' => $this->writer_id,
            'main_headline' => $this->main_headline,
            'secondary_headline' => $this->secondary_headline,
            'date' => $this->date,
            'time' => $this->time,
        );
//And then inserts it into the bikes database
        $sql = "INSERT INTO articles(
                    article_body, genre_id, writer_id, main_headline, secondary_headline, date, time
                ) VALUES (
                    :article_body, :genre_id, :writer_id, :main_headline, :secondary_headline, :date, :time
                )";
        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql); 
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save Articles");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving Articles");
            }
           
            $this->id = $conn->lastInsertId('Articles');
            
        }
    }
  
/////////////////////////////////////////////////////////////////////////////
    public static function find($article_id) {
        //find has one parameter, this is Id found in view story
        $params = array(
            'article_id' => $article_id
        );
        $sql = 'SELECT * FROM articles WHERE article_id = :article_id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        
        if(!$success) {
            throw new Exception("Failed to retrieve article");
        }
        else {
            $article = $stmt->fetchObject('Article');
            return $article;
/////////////////this will return the story that has that id. It depends on the php?=whatever number id////////////
        }
    }
////////////////////////////////1///////////////////////////////
    
    public static function selectAll($limit, $offset = 1) {
        //select all has 2 parameters limits and offsets. Offset allows for the the articles to be set off by whatever number you put in
        $sql = 'SELECT * FROM articles LIMIT ' . $limit . ' OFFSET ' . $offset;
        $connection = Connection::getInstance();
        
        $stmt = $connection->prepare($sql);
        
        $success = $stmt->execute();
        
        if(!$success) {
            throw new Exception("Failed to retrieve articles");
        }
        else {
            $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $articles;
        }
    }
////////////////////////////////2//////////////////////////////  
    
    
    public static function selectByCategory($genre, $limit, $offset = 1) {
        
        $sql = "SELECT id FROM genre WHERE name = '" . $genre."'";
        $connection = Connection::getInstance();
        
        $stmt = $connection->prepare($sql);
        
        $success = $stmt->execute();
        
        if(!$success) {
            throw new Exception("Failed to retrieve genres");
        }
        else {
            
            $genre_id = $stmt->fetch()[0];
            
            $sql = "SELECT * FROM articles WHERE genre_id = " . $genre_id . " LIMIT " . $limit . " OFFSET " . $offset;
            
            $connection = Connection::getInstance();
            $stmt = $connection->prepare($sql);
            $success = $stmt->execute();
            
            if(!$success) {
                throw new Exception("Failed to retrieve article");
            }
            else {
                $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
                return $articles;
            }
        }
        
    }


}





