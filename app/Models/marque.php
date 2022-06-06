<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marque extends Model
{
    protected $fillable=["name","imagemarque"];
    public function voiteur()
    {
        return $this->hasMany(voiteur::class, 'marqueId');
    }
    use HasFactory;
}
