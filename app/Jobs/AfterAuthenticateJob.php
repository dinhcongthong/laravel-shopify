<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AfterAuthenticateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $shop;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shop)
    {
        Log::info("Constructor2 - start");
        Log::info($shop);
        Log::info("Constructor2 - end");
        $this->shop = $shop;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!AdminUser::where('username', $this->shop->name)->exists()) {
            // exists
            if (!empty($this->shop)) {
                $result = AdminUser::create([
                    'username' => $this->shop->name,
                    'password' => Hash::make('Admin123456'),
                    'name'=> $this->shop->name,
                    'id_myshopify' => $this->shop->id
                ]);
                Log::info("result_create:". $result);
            }
        }
    }
}
