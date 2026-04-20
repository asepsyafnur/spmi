<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = ['code', 'name', 'description'];

    public function indicators()
    {
        return $this->hasMany(Indicator::class);
    }
}
