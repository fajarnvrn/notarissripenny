<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVModel extends Model
{
    use HasFactory;

    protected $table        = "cv";
    
    protected $primaryKey   = "id_cv";
    
    protected $fillable     = ['id_cv','nama_cv','hp'];
}