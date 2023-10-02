<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Amis
 *
 * @property int $id
 * @property int $from
 * @property int $to
 * @property int $accepted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AmisFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Amis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amis query()
 * @method static \Illuminate\Database\Eloquent\Builder|Amis whereAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amis whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amis whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amis whereUpdatedAt($value)
 * @property-read \App\Models\Succursale|null $succursale
 * @mixin \Eloquent
 */
class Amis extends Model
{
    use HasFactory;

    public function succursale() : BelongsTo
    {
        return $this->belongsTo(Succursale::class);
    }
}
