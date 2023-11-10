<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "dokumens";
    
    protected $fillable = [
        'divisi_id',
        'kategori_id',
        'judul',
        'file',
        'tanggal'
        
    ];

    public function divisi()
    {
    	return $this->belongsTo(Divisi::class);
    }

    public function kategori()
    {
    	return $this->belongsTo(KategoriDokumen::class);
    }
}