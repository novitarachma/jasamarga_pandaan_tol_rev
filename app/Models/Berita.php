<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "beritas";

    protected $fillable = [
        'judul',
        'tanggal',
        'foto',
        'paragraf1',
        'paragraf2',
        'paragraf3'
    ];
}