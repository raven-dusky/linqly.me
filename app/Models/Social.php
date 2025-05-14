<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Link;

class Social extends Model
{
    protected $fillable = ['name', 'icon'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
