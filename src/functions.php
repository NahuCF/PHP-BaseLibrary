<?php 

function connect_to_database()
{
    try
    {
        return new PDO("mysql:host=localhost;dbname=" . GlobalConfig::$db_config["db_name"] . ";charset=utf8", GlobalConfig::$db_config["user"], GlobalConfig::$db_config["password"]);
    }
    catch(PDOexception $e)
    {
        return false;
    }
}

function set_url($file_name, $parameters = '')
{
    header("Location: " . substr($_SERVER["PHP_SELF"], 0, strrpos($_SERVER["PHP_SELF"], '/')) . '/' . $file_name . $parameters);
}

function clean_string($string)
{
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = stripslashes($string);

    return $string;
}

?>