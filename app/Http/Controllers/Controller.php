<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $shopify_option, $basic_shopify_api;

    public function __construct(Options $shopify_option, BasicShopifyAPI $basic_shopify_api)
    {
        $this->shopify_option = $shopify_option;
        $this->basic_shopify_api = $basic_shopify_api;
    }

    protected function options()
    {
        $this->shopify_option->setVersion(config('shopify-app.api_version'));
        $this->shopify_option->setApiKey(config('shopify-app.api_key'));
        $this->shopify_option->setApiSecret(config('shopify-app.api_secret'));
        $this->shopify_option->setGuzzleOptions(['timeout' => 90.0]);
        return $this->shopify_option;
    }

    public function api() {
        // $shop = DB::table('users')->where('name', env('SHOPIFY_MYSHOPIFY_DOMAIN'))->first();
        $shop = DB::table('users')->where('name', config('shopify-app.myshopify_domain'))->first();
        $api = new BasicShopifyAPI($this->options());
        $api->setSession(new Session($shop->name, $shop->password));
        return $api;
    }
}
