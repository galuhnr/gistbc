<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tahun;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class DataKriteria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "data_kriterias";
    protected $primaryKey = 'id_data';
    protected $fillable = [
        'id_data',
        'tahun_id',
        'kecamatan_id',
        'jml_faskes',
        'jml_kasus',
        'jml_rumahts',
        'jml_kp',
    ];

    public function AllData(){
        return DB::table('data_kriterias')->get();
    }
     
    public function tahuns() {
        return $this->belongsTo(Tahun::class,'tahun_id');
    }

    public function kecamatans() {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
