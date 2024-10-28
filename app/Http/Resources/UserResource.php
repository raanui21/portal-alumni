<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "nim" => $this->nim,
            "nama" => $this->nama,
            "fakultas" => $this->fakultas,
            "jurusan" => $this->jurusan,
            "tahun_lulus" => $this->survey-> tahun_lulus ?? 'belum terisi',
            "image_path" => $this->image_path,
            "token" => $this->token,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
