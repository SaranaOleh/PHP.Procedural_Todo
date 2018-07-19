<?php
function getConnection(){
    static $conn = NULL;
    if($conn === NULL){
        $conn = new PDO("mysql:dbname="";host=mysql.zzz.com.ua;charset=utf8",
            "",
            "",
            [
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
            ]
        );
    }
    return $conn;
}
function database_getAll(){
    $dbh = getConnection();
    $stmt = $dbh->query("SELECT * FROM `Todo_list`;");
    return $stmt->fetchAll();
}
function database_appendNote($text){
    $dbh = getConnection();
    $text = $dbh->quote($text);
    $dbh->exec("INSERT INTO `Todo_list` (`Text`) VALUES ({$text});");
}
function database_deleteNote($id){
    $dbh = getConnection();
    $id = (int)$id;
    $dbh->exec("DELETE FROM `Todo_list` WHERE `id` = {$id};");
}
