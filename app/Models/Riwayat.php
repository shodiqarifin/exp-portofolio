<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = "riwayat";

    protected $fillable = [
        'judul',
        'tipe',
        'tgl_mulai',
        'tgl_akhir',
        'info_1',
        'info_2',
        'info_3',
        'isi',
    ];

    protected $appends = ['tlg_mulai_id', 'tgl_akhir_id'];

    public function getTglMulaiIdAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }
    public function getTglAkhirIdAttribute()
    {
        if (!$this->attributes['tgl_akhir']) {
            return 'Present';
        }

        return Carbon::parse($this->attributes['tgl_akhir'])->translatedFormat('d F Y');
    }
}
