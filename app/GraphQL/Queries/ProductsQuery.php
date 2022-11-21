<?php

namespace App\GraphQL\Queries;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'products',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args(): array
    {
        return [
            'category' => [
                'name' => 'category',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args) {
        if (isset($args['category'])) {
            return Product::whereHas('category', function ($query) use ($args) {
                $query->where('name', $args['category']);
            })->get();
        }

        return Product::all();
    }
}
