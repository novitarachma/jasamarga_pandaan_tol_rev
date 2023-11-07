<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $table = "user_details";

    protected $fillable = [
        'user_id',
        'foto',
        'foto_cover',
        'description'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}