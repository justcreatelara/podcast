<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'owner', 'description'
      ];

    public function episodes()
    {
      return $this->hasMany('App\Models\Episode');
    }
}
