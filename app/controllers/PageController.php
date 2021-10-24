<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Todo;

class PageController
{
    public $query;

    public function __construct()
    {
        $this->query = App::get('database');
    }

    public function home()
    {
        // biến $title truyền vào view để hiển thị title
        $title = "Todos List";
        $todos = Todo::all();

        view("home", compact('title', 'todos'));
    }

    public function about()
    {
        $title = "About us";
        view("about", compact('title'));
    }

    public function contact()
    {
        $title = "Contact";
        view("contact", compact('title'));
    }

    public function addTodo()
    {
        // $query được khởi tạo trong file index.php
        // dùng để connect db và truy xuất db
        $data = [
            'name' => $_POST['name']
        ];
        Todo::insert($data);

        // redirect to Home page
        redirect("/");
    }

    public function deleteTodo()
    {
        // gọi hàm delete của model
        Todo::delete($_GET['id']);

        // redirect to Home page
        redirect("/");
    }
}
