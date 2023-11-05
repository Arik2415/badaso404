<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agama extends Model
{
    use HasFactory;
    protected $fillable = ['agama'];
    protected $table = 'agamas';
    public $timestamps = false;
}
