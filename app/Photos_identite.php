<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos_identite extends Model
{
    protected $guarded =[];

    public function proprietaire(){
        return $this->belongsTo(Proprietaire::class);
    }
}
