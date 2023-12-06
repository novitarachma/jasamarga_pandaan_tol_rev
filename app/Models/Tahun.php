<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tahun extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public $table = 'tahuns';

    protected $fillable = [
        'name',
    ];

    public function galeri()
    {
    	return $this->hasMany(Galeri::class);
    }
}