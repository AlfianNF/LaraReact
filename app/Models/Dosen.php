<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'table_dosens';
    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $fillable = ['nidn', 'nama', 'tanggal_lahir', 'alamat', 'kode_matkul'];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'kode_matkul', 'kode_matkul');
    }
}
