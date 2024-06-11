<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $fillable = [
        'judul',
        'lokasi_berangkat',
        'mulai',
        'selesai',
        'private', 
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function details(){
        return $this->hasMany(Detail::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
