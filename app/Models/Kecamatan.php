<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataKriteria;
use App\Models\RumahSakit;

class Kecamatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kecamatans';
    protected $fillable = [
        'id_kecamatan','nama_kecamatan'
    ];

    protected $primaryKey = 'id_kecamatan';

    public function datakriterias() {
        return $this->hasMany(DataKriteria::class);
    }

    public function rumahsakit() {
        return $this->hasMany(RumahSakit::class);
    }
}
