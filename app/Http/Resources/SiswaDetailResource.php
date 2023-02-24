<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiswaDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_siswa' => $this->id_siswa,
            'kelas' => $this->whenLoaded('kelas'),
            'jurusan' => $this->whenLoaded('jurusan'),
            'nama' => $this->nama,
            'nis' => $this->nis,
            'alamat' => $this->alamat,
            'tmp_lahir' => $this->tmp_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'gender' => $this->gender,
        ];
    }
}
