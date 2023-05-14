<?php

namespace App\Jobs;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ValidateAllExpiredProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $products = Product::active()->whereDate('to_date', '<=', Carbon::now())->get();
        $not_coming_products = Product::draft()
            ->where('from_date', '<=', Carbon::now())
            ->where('to_date', '>=', Carbon::now())
            ->get();

        foreach ($products as $product) {
            $product->status = 'draft';
            $product->save();
        }

        foreach ($not_coming_products as $product) {
            $product->status = 'active';
            $product->save();
        }
    }
}
