<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bulan extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public $table = 'bulans';

    protected $fillable = [
        'name',
    ];

    public function gaji()
    {
    	return $this->hasMany(Gaji::class);
    }
}