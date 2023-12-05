<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class GolonganTol extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public $table = 'golongan_tols';

    protected $fillable = [
        'name',
    ];

    public function tarif()
    {
    	return $this->hasMany(TarifTol::class);
    }
}