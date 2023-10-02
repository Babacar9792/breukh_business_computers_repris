<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CommandeProduit
 *
 * @property int $id
 * @property int $prix_vente
 * @property int $quantite
 * @property int $commande_id
 * @property int $succursale_produit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit whereCommandeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit wherePrixVente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit whereQuantite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit whereSuccursaleProduitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommandeProduit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommandeProduit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        "updated_at"
    ];

}
