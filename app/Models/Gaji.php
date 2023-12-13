<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gaji extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "gajis";

    protected $fillable = [
        'user_id',
        'tahun_id',
        'bulan_id',
        'link'
    ];

    public function tahun()
    {
    	return $this->belongsTo(Tahun::class);
    }

    public function bulan()
    {
    	return $this->belongsTo(Bulan::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}