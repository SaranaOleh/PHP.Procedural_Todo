<?php
function action_index(){
    $data = database_getAll();
    load_view("main",$data,0);
}
function action_add(){
    $noteText = $_POST["name"];
    if($noteText === ""){
        redirect(PROJROOT."404");
    } else {
        database_appendNote($noteText);
        redirect(PROJROOT);
    }
}
function action_del(){
    $id = $_GET["id"];
    database_deleteNote($id);
    redirect(PROJROOT);
}