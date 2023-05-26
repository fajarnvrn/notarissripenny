<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarisModel extends Model
{
    use HasFactory;

    protected $table        = "waris";
    
    protected $primaryKey   = "id_waris";
    
    protected $fillable     = ['id_waris','nama','anggota','kk'];
}