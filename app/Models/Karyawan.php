<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "karyawans";

    protected $fillable = [
        'user_id',
        'divisi_id',
        'nip',
        'foto',
        'jabatan'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function divisi()
    {
    	return $this->belongsTo(Divisi::class);
    }
}