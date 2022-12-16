<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $guarded =[];
    
    public function parcelles(){
        return $this->hasMany(Parcelle::class);
    }
}
