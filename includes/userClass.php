<?php
  class User{
   public function fetch_all(){
     global $pdo;
     $query=$pdo->prepare("SELECT * FROM users order by username");
     $query->execute();
     return $query->fetchAll(PDO::FETCH_ASSOC);
   }
   public function fetch_data($id){
     global $pdo;
     $query=$pdo->prepare("SELECT * FROM users WHERE id =?");
     $query->bindValue(1, $id);
     $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function fetch_by_name($name){
     global $pdo;
     $query=$pdo->prepare("SELECT * FROM users WHERE username =?");
     $query->bindValue(1, $name);
     $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function fetch_all_user_articles($name){
      global $pdo;
      $query=$pdo->prepare("SELECT * FROM articles WHERE author=? order by article_timestamp desc");
      $query->bindValue(1, $name);
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>