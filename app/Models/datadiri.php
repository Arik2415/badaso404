<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadiri extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'datadiri';
    public $timestamps = false ;
}
