<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content'
        // 'content',
        // 'like',
    ];
    
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];


    public function comments(){
        return $this->HasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
