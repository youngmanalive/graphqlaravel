<?php

namespace App\GraphQL\Types;

use App\Models\ProductVariant;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductVariantType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProductVariant',
        'description' => 'A product variant',
        'class' => ProductVariant::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of product variant',
            ],
            'size' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Product variant size',
                'resolve' => function ($root, array $args) {
                    return $root->variant->name;
                },
            ],
            'quantity' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Stock of product variant',
                'resolve' => function ($root, array $args) {
                    return $root->quantity->amount;
                },
            ],
            'price' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Price of product variant',
            ],
            'product' => [
                'type' => Type::nonNull(GraphQL::type('Product')),
                'description' => 'Parent of variant',
            ],
        ];
    }
}
