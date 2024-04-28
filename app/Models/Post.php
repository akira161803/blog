<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'postCategory', 'typeBCategory', 'toWhomCategory'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function nices() {
        return $this->hasMany(Nice::class);
    }

    public function isNicedByUser($userId)
    {
        return $this->nices->contains('user_id', $userId);
    }

}