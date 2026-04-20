<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $fillable = ['standard_id', 'code', 'name', 'target', 'weight'];

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }
}
