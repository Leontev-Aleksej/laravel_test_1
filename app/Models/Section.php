<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['title'];
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
