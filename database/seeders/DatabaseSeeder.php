<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseSeeder extends Seeder
{
    use WithFaker;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpFaker();
        $this->seedCategories();
        $this->seedVariants();
        $this->seedProducts();
    }

    private function seedCategories(): void
    {
        collect(['shirts', 'pants', 'socks'])->each(function (string $category) {
            Category::firstOrCreate(['name' => $category]);
        });
    }

    private function seedVariants(): void
    {
        collect(['small', 'medium', 'large'])->each(function (string $variant) {
            Variant::firstOrCreate(['name' => $variant]);
        });
    }

    private function seedProducts(): void
    {
        $variants = Variant::all();
        $productTypes = [
            'shirts' => ['Fleece', 'T-Shirt', 'Sweater', 'Button Up'],
            'pants' => ['Shorts', 'Dress Pants', 'Jeans', 'Pajamas'],
            'socks' => ['No Show Socks', 'Ankle Socks', 'Running Socks']
        ];

        foreach (Category::all() as $category) {
            foreach ($productTypes[$category->name] as $type) {
                foreach (range(0, rand(5, 15)) as $unused) {
                    // generate the product name
                    $name = collect([
                        $this->faker->city(),
                        $this->faker->firstName(),
                        $this->faker->lastName(),
                    ])->random();
                    $productName = $name . ' ' . $type;

                    // create the product
                    $product = Product::firstOrCreate([
                        'name' => $productName,
                        'category_id' => $category->id,
                    ]);

                    // create the product variants
                    $productVariants = collect();
                    foreach ($variants as $variant) {
                        $productVariants->push(ProductVariant::firstOrCreate([
                            'product_id' => $product->id,
                            'variant_id' => $variant->id,
                            'price' => rand(10, 400),
                        ]));
                    }

                    // create the stock quantity for each variant
                    foreach ($productVariants as $productVariant) {
                        ProductQuantity::firstOrCreate([
                            'product_variant_id' => $productVariant->id,
                            'amount' => rand(2, 30),
                        ]);
                    }
                }
            }
        }
    }
}
