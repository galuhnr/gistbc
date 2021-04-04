<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KecamatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id_kecamatan'=>$this->id_kecamatan,
            'nama_kecamatan'=>$this->nama_kecamatan
        ];
    }
}
