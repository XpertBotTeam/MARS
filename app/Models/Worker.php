<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = [
       'id',
       'name',
        'details'

    ];
    protected function service(){
        return $this->belongsTo(Service::class);
    }
}
