<?php

namespace App\Models;

class Todo extends BaseModel
{

    static function getTable()
    {
        return 'todos';
    }
}