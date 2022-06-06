<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrosserie extends Model
{   use HasFactory;
    protected $fillable=["name","imagecarrosseries"];
 
      
        public function voiteur()
        {
            return $this->hasMany(voiteur::class, 'carrosseriesId');
        }
    

}
