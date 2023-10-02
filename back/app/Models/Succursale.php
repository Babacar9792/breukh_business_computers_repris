<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Succursale
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale query()
 * @property int $id
 * @property string $nom
 * @property string $telephone
 * @property string $email
 * @property string $adresse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SuccursaleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Succursale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Succursale extends Model
{
    use HasFactory;
    protected $guarded= ['id'];
    protected $hidden = [
        'created_at',
        "updated_at"
    ];
}
