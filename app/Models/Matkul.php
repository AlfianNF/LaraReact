<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_matkul';
    protected $fillable = ['kode_matkul', 'nama_matkul', 'sks'];

    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'kode_matkul', 'kode_matkul');
    }}
