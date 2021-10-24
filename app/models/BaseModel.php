<?php

namespace App\Models;

use App\Core\App;

abstract class BaseModel
{
    abstract static function getTable();

    private static function getDB()
    {
        return App::get('database');
    }

    public static function all()
    {
        return static::getDB()->selectAll(static::getTable());
    }

    public static function insert($params)
    {
        static::getDB()->insert(static::getTable(), $params);
    }

    public static function delete($id)
    {
        static::getDB()->delete(static::getTable(), $id);
    }
}
