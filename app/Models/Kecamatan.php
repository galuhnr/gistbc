<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_kecamatan','nama_kecamatan'
    ];

    protected $primaryKey = 'id_kecamatan';

    public function datakriterias()
    {
        return $this->hasMany('App\DataKriteria');
    }
}
