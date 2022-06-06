<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voiteurneuf extends Model
{
    use HasFactory;
    protected $fillable =['nom','prix','caracterstique','garantie','energie','boite','image','imagepetit','marqueId','carrosseriesId'];
    public function marques()
    {
        return $this->belongsTo(marque::class,'marqueId');
    }
    public function carrosseries()
    {
        return $this->belongsTo(carrosserie::class,'carrosseriesId');
    }
}
