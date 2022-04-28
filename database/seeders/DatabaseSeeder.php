<?php

namespace Database\Seeders;

use App\Http\Controllers\Controller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $base_controller;

    public function __construct(Controller $base_controller)
    {
        $this->base_controller = $base_controller;
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->createProduct();
    }

    private function createProduct()
    {
        for ($i = 1; $i <= 1000; $i++) {
            $this->graphCreateProduct($i);
        }
    }

    private function graphCreateProduct($proIdex)
    {
        $title = "Tiger " . $proIdex;
        // dd($title);
        $mutation = "
            mutation {
                productCreate(
                    input: {
                        title: \"$title\", 
                        productType: \"Animals & Pet Supplies\",
                        vendor: \"thomas-laravel-store\"
                    }
                )
                {
                    product {
                        id
                    }
                }
            }
        ";

        $response = $this->base_controller->api()->graph($mutation);

        if ($response['errors']) {
            dump('loi');
            dd($response);
        }

        $productId =  $response['body']['data']['productCreate']->product->id;

        $query =
            'mutation productCreateMedia($media: [CreateMediaInput!]!, $productId: ID!) {
                productCreateMedia(media: $media, productId: $productId) {
                    mediaUserErrors {
                        message code field
                    }
                    media {
                        status
                    }
                    product {
                        id
                    }
                }
            }';

        $variables = [
            'media' => [
                'mediaContentType' => 'IMAGE',
                'originalSource' => 'https://cdn.shopify.com/s/files/1/0557/7641/1733/products/tiger_pose_predator_267781_1920x1080_564e9f11-a41c-48a3-a81d-0a5fdeaaae9c_350x350.jpg?v=1649316134'
            ],
            'productId' => $productId,
        ];

        $result = $this->base_controller->api()->graph($query, $variables);
        if ($result['errors'] || !empty($result['body']['data']->productCreateMedia->userErrors)) {
            return 'failed';
        }
    }
}
