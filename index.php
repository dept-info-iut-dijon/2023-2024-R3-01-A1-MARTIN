<?php
    require_once("./controller/Router/Router.php");
    
     $router = new Router();
     $router->routing($_GET, $_POST);
?>