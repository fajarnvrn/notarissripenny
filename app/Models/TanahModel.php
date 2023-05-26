<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahModel extends Model
{
    use HasFactory;

    protected $table        = "tanah";
    
    protected $primaryKey   = "id_tanah";
    
    protected $fillable     = ['id_tanah','sertifikat','nib','email'];
}