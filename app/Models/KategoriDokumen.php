<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "kategori_dokumens";

    protected $fillable = [
        'name'
    ];

    public function dokumen()
    {
    	return $this->hasMany(Dokumen::class);
    }
}