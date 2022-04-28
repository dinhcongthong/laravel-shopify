<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $product_type = "Animals & Pet Supplies";
        // , query: \"product_type: $product_type\"
        $query = "
        {
            products(first: 16, reverse: true) {
                edges {
                    node {
                        id
                        description
                        handle
                        onlineStorePreviewUrl
                        onlineStoreUrl
                        title
                        tags
                        createdAt
                        status
                        createdAt
                        featuredImage {
                            id
                            url
                            width
                            height
                        }
                        description
                        productType
                        totalVariants
                        totalInventory
                        vendor
                    }
                }
                pageInfo{
                    hasNextPage
                    hasPreviousPage
                    startCursor
                    endCursor
                }
            }
        }
        ";

        $response = $this->api()->graph($query);

        if ($response['errors']) {
            dd($response);
        }
        return response($response['body']['data'], 200)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET');
        return $response['body']['data'];
    }

    public function getProductWithPageInfo () {
        $keyword = 'Tiger 1';
        // eyJsYXN0X2lkIjo2NzQ1Mzg0NTgzMjUzLCJsYXN0X3ZhbHVlIjo2NzQ1Mzg0NTgzMjUzfQ==
        $cursor = "eyJsYXN0X2lkIjo2NzQ1Mzg1MzA0MTQ5LCJsYXN0X3ZhbHVlIjoiNjc0NTM4NTMwNDE0OSJ9";
        // $cursor = "";
        $query = "
        {
            products(first: 16, after: \"$cursor\") {
                edges {
                    cursor
                    node {
                        id
                        title
                    }
                }
                pageInfo{
                    hasNextPage
                    hasPreviousPage
                    startCursor
                    endCursor
                }
            }
        }
        ";

        $response = $this->api()->graph($query);

        if ($response['errors']) {
            dd($response);
        }
        return $response['body']['data'];
    }

    public function countProducts()
    {
        $response = $this->api()->rest('get', env('SHOPIFY_REST_URL_PRODUCTS') . '/count.json');
        if ($response['errors']) {
            dd($response);
            return false;
        }
        return $response;
        return true;
    }

    public function getProductSavedSearch()
    {
        $query = '
        {
            productSavedSearches(first: 10) {
                edges{
                    cursor
                    node{
                        id
                        filters{
                            key
                            value
                        }
                        legacyResourceId
                        name
                        query
                        resourceType
                        searchTerms
                    }
                }
                pageInfo{
                    hasNextPage
                    hasPreviousPage
                }
            }
        }
        ';

        $response = $this->api()->graph($query);

        if ($response['errors']) {
            dd($response);
            return 'loi';
        }
        return $response['body']['data'];
    }

    public function createProduct()
    {
        $proIdex = 29;
        for ($i = 0; $i <= 10; $i++) {
            $this->graphCreateProduct($proIdex);
            $proIdex++;
        }
        return 'thành công';
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

        $response = $this->api()->graph($mutation);

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

        $result = $this->api()->graph($query, $variables);
        if ($result['errors'] || !empty($result['body']['data']->productCreateMedia->userErrors)) {
            return 'failed';
        }
    }
}
