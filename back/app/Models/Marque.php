<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Marque
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Marque newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marque newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marque query()
 * @property int $id
 * @property string $libelle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Marque whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marque whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marque whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marque whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Marque extends Model
{
    use HasFactory;
    protected $guarded= ['id'];
}
