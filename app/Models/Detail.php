<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'biaya',
        'mulai',
        'selesai',
        'user_id',
        'agenda_id',
    ];

    public function agenda(){
        return $this->belongsTo(Agenda::class);
    }
}
