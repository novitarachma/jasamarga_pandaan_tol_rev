<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifTol extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public $table = 'tarif_tols';

    protected $fillable = [
        'asal_id',
        'tujuan_id',
        'golongan_id',
        'harga',
    ];

    public function asal()
    {
    	return $this->belongsTo(AsalTol::class);
    }

    public function tujuan()
    {
    	return $this->belongsTo(TujuanTol::class);
    }

    public function golongan()
    {
    	return $this->belongsTo(GolonganTol::class);
    }

    public function tarifRecord()
    {
    	return $this->hasMany(TarifRecord::class);
    }
}