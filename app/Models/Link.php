<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Social;

class Link extends Model
{
    protected $fillable = ['user_id', 'social_id', 'url'];

    public function social()
    {
        return $this->belongsTo(Social::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
