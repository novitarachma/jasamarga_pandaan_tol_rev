<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    
    protected $table = "divisis";

    protected $fillable = [
        'name'
    ];

    public function dokumen()
    {
    	return $this->hasMany(Dokumen::class);
    }

    public function karyawan()
    {
    	return $this->hasMany(Karyawan::class);
    }
}