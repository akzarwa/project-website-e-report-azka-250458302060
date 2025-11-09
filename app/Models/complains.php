<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    protected $table = 'complains_';

    protected $fillable = [
        'user_id',
        'category_id',
        'no_aduan',
        'judul',
        'keterangan',
        'image',
        'lokasi',
        'tanggal_aduan',
        'status',
    ];

    public function kate() {
        return $this->belongsTo(category::class, 'category_id' , 'id');
    }
}