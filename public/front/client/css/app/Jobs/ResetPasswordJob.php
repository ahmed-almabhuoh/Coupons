<?php

namespace App\Jobs;

use App\Notifications\ResetPasswordMail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ResetPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $position;
    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct($position = 'user', $user)
    {
        //
        $this->position = $position;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $uuid = Str::uuid();
        $token = $this->user->email . '@' . $this->user->id . '@' . $uuid . '@' . $this->position;
        $enc_token = Crypt::encrypt($token);
        //
        DB::table('users_reset_passwords')->insert([
            'position' => $this->position,
            'u_id' => $this->user->id,
            'token' => Crypt::encrypt($uuid),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addMinutes(3),
        ]);

        $url = route('users.reset.password', $enc_token);
        $this->user->notify(new ResetPasswordMail($url));
    }
}
