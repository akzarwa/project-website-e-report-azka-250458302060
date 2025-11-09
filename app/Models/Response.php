<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';

    protected $fillable = [
        'complain_id',
        'admin_id',
        'response'
    ];

    public function datakomplen()
    {
        return $this->belongsTo(Complains::class, 'complain_id', 'id');
    }

    public function namaadmin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }   
}
