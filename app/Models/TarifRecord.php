<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifRecord extends Model
{
    use HasFactory;

    public $table = 'tarif_records';

    protected $fillable = [
        'tarif_id',
    ];

    public function tarif()
    {
    	return $this->belongsTo(TarifTol::class);
    }
}