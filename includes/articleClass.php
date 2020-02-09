<?php
  class Article{
   public function fetch_all(){
     global $pdo;
     $query=$pdo->prepare("SELECT * FROM articles order by id desc");
     $query->execute();
     return $query->fetchAll(PDO::FETCH_ASSOC);
   }
   public function fetch_data($id){
     global $pdo;
     $query=$pdo->prepare("SELECT * FROM articles WHERE id =?");
     $query->bindValue(1, $id);
     $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
    }
  }
?>