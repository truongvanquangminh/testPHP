<?php

// thiết lập các uri tương ứng với các controller xử lý
//GET method
$router->get('', 'PageController@home');
$router->get('about', 'PageController@about');
$router->get('contact', 'PageController@contact');

//POST method
$router->POST('add-todo', 'PageController@addTodo');
$router->get('delete-todo', 'PageController@deleteTodo');