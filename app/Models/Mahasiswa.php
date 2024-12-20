<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
    * @OA\Schema(
    * title="Mahasiswa",
    * description="Model Mahasiswa"),


    
    * @OA\Property(
    * property="nim",
    * type="string",
    * description="Nomor Induk Mahasiswa"
    * ),
        
    * @OA\Property(
    * property="nama",
    * type="string",
    * description="Nama mahasiswa"
    * ),

    * @OA\Property(
    * property="email",
    * type="string",
    * description="Email mahasiswa"
    * ),

    * @OA\Property(
    * property="alamat",
    * type="string",
    * description="Alamat mahasiswa"
    * ),

    * @OA\Property(
    * property="tanggal_lahir",
    * type="date",
    * description="Tanggal Lahir mahasiswa"
    * ),

    * @OA\Property(
    * property="jurusan",
    * type="string",
    * description="Jurusan mahasiswa"
    * )
    * )
    */


class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $fillable = ['nim', 'nama', 'alamat', 'tanggal_lahir', 'jurusan'];

    public function getRouteKeyName()
    {
        return 'nim';
    }
}
