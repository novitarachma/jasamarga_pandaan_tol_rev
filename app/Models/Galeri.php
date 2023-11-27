<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeri extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "galeris";

    protected $fillable = [
        'judul',
        'tahun',
        'foto'
    ];
}