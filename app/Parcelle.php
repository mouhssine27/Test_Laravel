<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    protected $guarded =[];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function proprietaire(){
        return $this->belongsTo(Proprietaire::class);
    }
    public function village(){
        return $this->belongsTo(Village::class);
    }
    
}
