<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'date',
        'location',
        'image',
        'user_id',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
