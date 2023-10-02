<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Avance
 *
 * @property int $id
 * @property int $montant
 * @property string $date_avance
 * @property int $commande_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Avance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Avance whereCommandeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avance whereDateAvance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avance whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Avance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

}
