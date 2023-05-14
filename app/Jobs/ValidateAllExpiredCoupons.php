<?php

namespace App\Jobs;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ValidateAllExpiredCoupons implements ShouldQueue
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
        $coupons = Coupon::active()->whereDate('to_date', '<=', Carbon::now())->get();
        $not_coming_coupons = Coupon::draft()
            ->where('from_date', '<=', Carbon::now())
            ->where('to_date', '>=', Carbon::now())
            ->get();

        foreach ($coupons as $coupon) {
            $coupon->status = 'draft';
            $coupon->save();
        }

        foreach ($not_coming_coupons as $coupon) {
            $coupon->status = 'active';
            $coupon->save();
        }
    }
}
