<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTBC extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tb_info";
    protected $primaryKey = 'id_info';
    protected $fillable = [
        'id_info',
        'nama_info',
        'isi_info',
    ];
}
