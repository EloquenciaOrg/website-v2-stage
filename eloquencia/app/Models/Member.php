<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false; // Cela indique à Laravel de ne pas gérer automatiquement les colonnes created_at et updated_at.
    protected $primaryKey = 'ID'; // a specifier car Laravel pense que par défaut la clé primaire est id (en minuscule)

    // (Optionnel) Si tu veux autoriser l'ajout ou la mise à jour en masse (ex: Member::create([...]))
    protected $fillable = [
        'name',
        'firstname',
        'email',
        'registrationToken',
        'password',
        'newsletter',
        'registrationDate',
        'expirationDate',
        'subscriptionHistory',
        'reset',
        'lessons_history'
    ];
}
