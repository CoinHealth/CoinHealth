<?php namespace App\Traits;

trait TraitGetTableName
{
    public static function getTableName()
    {
        return ((new self)->getTable());
    }
}
