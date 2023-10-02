<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\SuccursaleProduit
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit query()
 * @property int $id
 * @property int $prix
 * @property int $stock
 * @property int $produit_id
 * @property int $succursale_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SuccursaleProduitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit whereProduitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit whereSuccursaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuccursaleProduit whereUpdatedAt($value)
 * @property-read \App\Models\Produit $produit
 * @property-read \App\Models\Succursale $succursale
 * @mixin \Eloquent
 */
class SuccursaleProduit extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    public function succursale() : BelongsTo
    {
        return $this->belongsTo(Succursale::class);
    }

    public function produit() : BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
    protected $hidden = [
        'created_at',
        "updated_at"
    ];
}
