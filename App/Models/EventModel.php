<?php
class EventModel{
    //a modifier
    private $id;
    private $date;
    private $name;
    private $adress;
    private $description;
    private $voluntary_link;
   
public function getPosts($limit){
    
    $user = 'stephaniecivel';
    $pass = '3cc47cf67cd4245f0ce69c966dead4f2';
    
    try {
    $dsn = new PDO('mysql:host=db.3wa.io;dbname=stephaniecivel_Apejv', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    echo 'connecté';
    
}   catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
       if(isset($limit)){
            $sql = 'SELECT * FROM event ORDER BY date DESC LIMIT '.$limit;
            
        }else{
             $sql = 'SELECT * FROM order';
        }
        
        
        $query = $dsn->prepare($sql);
        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_CLASS, 'EventModel');
        
        return $posts;
        
    }
    public function getPostById($id)
    {
       try {
    $dsn = new PDO('mysql:host=db.3wa.io;dbname=stephaniecivel_Apejv', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    echo 'connecté';
    
}   catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}   
        $query = $dbh->prepare('SELECT * FROM event WHERE id=:id');
        $params = [
            'id'=>$id
        ];
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS, 'EventModel');
        $post = $query->fetch();            
        return $post;
    }

    
}

