<?php

class Route
{
    private $routes = [];
    private $file_names = [];
    private $url;

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function setRoute($route, $file_name): void
    {
        array_push($this->routes, $route);
        array_push($this->file_names, $file_name);
    }

    public function bringRouteFile(): void
    {
        for($i = 0; $i < count($this->routes); $i++)
            if($this->routes[$i] == $this->url)
                require_once "src/" . $this->file_names[$i] . ".php";
    }

    public function bringErrorFile($error_file): void
    {
        require "src/" . $error_file . ".php";
    }

    public function isCurrentRouteValid(): bool
    {
        return in_array($this->url, $this->routes);
    }
    
    public function fileExists(): bool
    {
        return file_exists("src/" . $this->file_names[array_search($this->url, $this->routes)] . ".php");
    }
}

?>