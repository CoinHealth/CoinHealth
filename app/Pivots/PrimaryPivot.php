<?php namespace App\Pivots;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PrimaryPivot extends Pivot
{
    protected $casts = [
        'tags' => 'object',
    ];
}
