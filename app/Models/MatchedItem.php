<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_found',
        'user_missing',
        'found_id',
        'lost_id',
        'isfound'
    ];


    public function userMissing($id){
        return User::find($id);
    } 

    public function userFound($id){
        return User::find($id);
    } 

    public function found($id){
        return Found::find($id);
    } 

    public function lost($id){
        return Lost::find($id);
    } 
}
