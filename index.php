<?php
define("PROJROOT","/EasyTodo/");
define("DOCROOT",$_SERVER["DOCUMENT_ROOT"].PROJROOT);
define("APPROOT",DOCROOT."app/");
define("JS","media/js/");
define("CSS","media/css/");
include DOCROOT."database.php";
$request = explode("?",$_SERVER["REQUEST_URI"])[0];
$ROUTES = [
    PROJROOT=>["ctrl"=>"main","action"=>"index"],
    PROJROOT."404"=>["ctrl"=>"404","action"=>"index"],
    PROJROOT."add"=>["ctrl"=>"main","action"=>"add"],
    PROJROOT."del"=>["ctrl"=>"main","action"=>"del"]
];
function redirect($url){
    header("Location:{$url}");
}
function load_model($modelName){
    include APPROOT."models/model_".$modelName.".php";
}
function load_view($viewName,$data=[],$template="main",$js="main"){
    extract($data);
    if($template === 0){
        include APPROOT."views/view_".$viewName.".php";
    } else {
        $page = APPROOT."views/view_".$viewName.".php";
        include APPROOT."templates/template_".$template.".php";
    }
}
function route($request){
    global $ROUTES;
    if(isset($ROUTES[$request])){
        include APPROOT."controllers/"."controller_".$ROUTES[$request]["ctrl"].".php";
        call_user_func("action_".$ROUTES[$request]["action"]);
    } else {
        route(PROJROOT."404");
    }
}
route($request);