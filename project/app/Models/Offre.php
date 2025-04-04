<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    /** @use HasFactory<\Database\Factories\OffreFactory> */
    use HasFactory;
    protected $fillable = ["title","description","user_id"];
    public function users(){
        return $this->belongsToMany(User::class,"offre_user")->withPivot('url');;

    }
}
