<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Unite
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Unite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unite query()
 * @property int $id
 * @property string $libelle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Unite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unite whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Unite extends Model
{
    use HasFactory;
    protected $guarded= ['id'];
}
