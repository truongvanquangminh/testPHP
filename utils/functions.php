<?php

function dd($data)
{
    echo "<br>";
    var_dump($data);
    echo "</pre>";
    die;
}

function view($name, $data = [])
{
    extract($data);
    require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: {$path}");
}
