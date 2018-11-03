<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // model factories

        // crea objetos
        //factory(Product::class)->make();

        // crea objetos y guarda en la base de datos
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category){
            $products = factory(Product::class, 20)->make();
            $category->products()->saveMany($products);

            $products->each(function($product){
                $images = factory(ProductImage::class, 5)->make();
                $product->images()->saveMany($images);
            });
        });
    }
}
