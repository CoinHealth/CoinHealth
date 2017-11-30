<?php namespace App\Traits;

use Hashids\Hashids;

/**
 * Hashid traits
 */
trait Hashid
{
    public function getUrlIdAttribute()
    {
        $hashid = new Hashids(config('services.hashid.salt'), 10);
        $id = $this->attributes['id'];
        return $hashid->encode($id);
    }
}
