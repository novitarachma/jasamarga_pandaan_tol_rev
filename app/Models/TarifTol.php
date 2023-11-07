<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TarifTol extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public $table = 'tarif_tols';

    protected $fillable = [
        'asal',
        'tujuan',
        'gol1',
        'gol2',
        'gol3',
        'gol4',
        'gol5',
    ];
}