<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProduitCaracteristique
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique query()
 * @property int $id
 * @property string $valeur
 * @property int $caracteristique_id
 * @property int|null $unite_id
 * @property int $produit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereCaracteristiqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereProduitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereUniteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProduitCaracteristique whereValeur($value)
 * @method static \Database\Factories\ProduitCaracteristiqueFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class ProduitCaracteristique extends Model
{
    use HasFactory;
    protected $guarded= ['id'];
}
