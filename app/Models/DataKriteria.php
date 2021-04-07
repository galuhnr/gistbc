<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tahun;
use App\Models\Kecamatan;

class DataKriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "data_kriterias";
    protected $primaryKey = 'id_data';
    protected $fillable = [
        'tahun_id',
        'kecamatan_id',
        'jml_faskes',
        'jml_kasus',
        'jml_rumahts',
        'jml_kp',
    ];
     
    public function tahuns() {

        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kecamatans() {
        
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
