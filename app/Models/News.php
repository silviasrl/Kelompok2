<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function getImageAttribute()
    {
        if($this->thumbnail){
            return asset('storage/' . $this->thumbnail);
        }else{
            return asset('img/icon.png');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
