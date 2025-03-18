<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    /** @use HasFactory<\Database\Factories\CompetenceFactory> */
    use HasFactory;
    protected $fillable = ["name"];
    public function users(){
        return $this->belongsToMany(User::class,"competence_user","competence_id");

    }
}
