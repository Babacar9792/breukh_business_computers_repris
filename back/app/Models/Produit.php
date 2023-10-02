<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Produit
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Produit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produit query()
 * @property int $id
 * @property string $libelle
 * @property string $photo
 * @property string $description
 * @property string $code
 * @property int $marque_id
 * @property int $categorie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProduitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereMarqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Caracteristique> $caracteristiques
 * @property-read int|null $caracteristiques_count
 * @property-read \App\Models\Categorie $categorie
 * @property-read \App\Models\Marque $marque
 * @mixin \Eloquent
 */
class Produit extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    public function caracteristiques() : BelongsToMany{
        return $this->belongsToMany(Caracteristique::class,"produit_caracteristiques")->withPivot("unite_id", "valeur");
    }
    public function marque() : BelongsTo
    {
        return $this->belongsTo(Marque::class);
    }
    public function categorie() : BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    protected $hidden = [
        'created_at',
        "updated_at"
    ];

}
