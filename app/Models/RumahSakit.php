<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class RumahSakit extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "rumah_sakit";
    protected $primaryKey = 'id_rs';
    protected $fillable = [
        'id_rs',
        'kecamatan_id',
        'nama_rs',
        'alamat',
        'no_tlp',
        
    ];

    public function kecamatans() {
        
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
