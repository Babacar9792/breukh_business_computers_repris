<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Commande
 *
 * @property int $id
 * @property string $numero_commande
 * @property string $date_commande
 * @property int $utilisateur_id
 * @property int $etat_commande
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDateCommande($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereEtatCommande($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereNumeroCommande($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUtilisateurId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CommandeProduit> $commande_produits
 * @property-read int|null $commande_produits_count
 * @property-read \App\Models\Utilisateur $utilisateur
 * @mixin \Eloquent
 */
class Commande extends Model
{
    use HasFactory;

    public function commande_produits(): HasMany
    {
        return $this->hasMany(CommandeProduit::class);
    }

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }
    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        "updated_at"
    ];

}
