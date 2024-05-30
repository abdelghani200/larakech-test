<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'cle', 'nom', 'adresse', 'code_postal', 'ville', 'statut'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    
}
