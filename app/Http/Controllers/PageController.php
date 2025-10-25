<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }
    public function about_us()
    {
        return view('pages.about-us');
    }
    public function products()
    {
        return view('pages.products');
    }
    public function product_details($id)
    {
        $products = [
            (object) [
                'id' => 1,
                'name' => 'Panel Boards',
                'img' => 'images/product1.png',
                'description' => 'High-quality panel boards for various applications.'
            ],
            (object) [
                'id' => 2,
                'name' => 'Cable Trays',
                'img' => 'images/product2.png',
                'description' => 'Durable cable trays for efficient cable management.'
            ],
            (object) [
                'id' => 3,
                'name' => 'Pull Boxes',
                'img' => 'images/product3.png',
                'description' => 'Sturdy pull boxes for electrical junctions.'
            ],
            (object) [
                'id' => 4,
                'name' => 'Switch Gears',
                'img' => 'images/product3.png',
                'description' => 'Reliable switch gears for various applications.'
            ],
            (object) [
                'id' => 1,
                'name' => 'Breaker Panels',
                'img' => 'images/product3.png',
                'description' => 'High-performance breaker panels for electrical systems.'
            ],
            (object) [
                'id' => 5,
                'name' => 'Lighting Fixtures',
                'img' => 'images/product3.png',
                'description' => 'Energy-efficient lighting fixtures for various applications.'
            ],
            (object) [
                'id' => 6,
                'name' => 'Control Panels',
                'img' => 'images/product3.png',
                'description' => 'User-friendly control panels for efficient operation.'
            ],
            (object) [
                'id' => 7,
                'name' => 'Enclosures',
                'img' => 'images/product3.png',
                'description' => 'Durable enclosures for electrical components.'
            ],
            (object) [
                'id' => 8,
                'name' => 'Power Cabinets',
                'img' => 'images/product3.png',
                'description' => 'Spacious power cabinets for efficient equipment housing.'
            ],
            (object) [
                'id' => 9,
                'name' => 'Panel Boards 2',
                'img' => 'images/product3.png',
                'description' => 'High-quality panel boards for various applications.'
            ],
            (object) [
                'id' => 10,
                'name' => 'Cable Trays 2',
                'img' => 'images/product3.png',
                'description' => 'Durable cable trays for efficient cable management.'
            ],
            (object) [
                'id' => 11,
                'name' => 'Pull Boxes 2',
                'img' => 'images/product3.png',
                'description' => 'Sturdy pull boxes for electrical junctions.'
            ],
        ];

        $product = collect($products)->firstWhere('id', $id);


        return view('pages.product-single-page', compact('product'));
    }
}
