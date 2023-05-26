<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTModel extends Model
{
    use HasFactory;

    protected $table        = "pt";
    
    protected $primaryKey   = "id_pt";
    
    protected $fillable     = ['id_pt','kode_pt','judul','pengarang','kategori'];
}