<?php

require_once "classes/Route.class.php";

class App
{
    public function __construct()
    {
        $routes = new Route;
        $url = isset($_GET["url"]) ? $_GET["url"] : '';
        $url = rtrim($url, '/');
        $routes->setUrl($url);

        // Here you should especify the routes

        $routes->setRoute("", "index"); 

        //--------------------------------------------
        
        if($routes->isCurrentRouteValid() && $routes->fileExists())
            $routes->bringRouteFile();
        else
            $routes->bringErrorFile("error");
    }
}

?>