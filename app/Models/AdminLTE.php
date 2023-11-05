<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLTE extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'agama', 'usia'];
    protected $table = 'AdminLTE';
    public $timestamps = false;

}
