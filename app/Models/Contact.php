<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'cle', 'nom', 'prenom', 'e_mail', 'telephone_fixe', 'service', 'fonction', 'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
