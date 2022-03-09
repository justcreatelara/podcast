<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'owner', 'description'
      ];

    public function podcast()
    {
        return $this->belongsTo('App\Models\Podcast');
    }
}
