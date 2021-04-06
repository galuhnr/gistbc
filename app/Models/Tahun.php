<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'tahuns';
    protected $fillable = [
        'id_tahun','tahun'
    ];

    protected $primaryKey = 'id_tahun';

    public function datakriterias()
    {
        return $this->hasMany('App\DataKriteria');
    }
}
