<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "karyawan";

    protected $fillable = [
        'user_id',
        'divisi_id',
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