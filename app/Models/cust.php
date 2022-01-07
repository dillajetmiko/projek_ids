<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cust extends Model
{
    protected $table = 'cust';
    protected $fillable=[
        'id_customer',
        'nama',
        'alamat',
        'kodepos'
    ];
}
