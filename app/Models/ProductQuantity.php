<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductQuantity
 *
 * @property int $id
 * @property int $product_variant_id
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductQuantity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductQuantity extends Model
{
    use HasFactory;
}
