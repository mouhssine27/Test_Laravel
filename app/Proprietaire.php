<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    protected $guarded =[];

    public function parcelles(){
        return $this->hasMany(Parcelle::class);
    }
    public function photos_identite(){
        return $this->hasMany(Photos_identite::class);
    }
}
