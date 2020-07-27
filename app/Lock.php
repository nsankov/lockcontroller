<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
    protected $fillable = [
        'id',
        'status',
        'channel',
        'barcode',
        'created_at',
        'updated_at',
    ];



}
