<?php

namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'A product',
        'class' => Product::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of product',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of product',
            ],
            'category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Category',
                'resolve' => function ($root, $args) {
                    return $root->category->name;
                }
            ],
            'quantity' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Total stock',
            ],
            'variants' => [
                'type' => Type::listOf(GraphQL::type('ProductVariant')),
                'description' => 'List of product variants',
            ],
        ];
    }

}
