<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Utilisateur
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $password
 * @property string $telephone
 * @property int $succursale_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereSuccursaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Utilisateur whereUpdatedAt($value)
 * @method static \Database\Factories\UtilisateurFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class Utilisateur extends  Authenticatable
{
    use HasFactory;

    protected $casts = [
        'password' => 'hashed'
    ];

    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        "updated_at",
        "password"
    ];
}
