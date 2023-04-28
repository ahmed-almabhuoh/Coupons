<?php

namespace App\Jobs;

use App\Mail\Auth\ForgotPassword;
use App\Notifications\Backend\Auth\ResetPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $user, public $url)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // info($this->user);
        // info($this->url);
        // Mail::to($this->user)->send(new ForgotPassword($this->user, $this->url));
        $this->user->notify(new ResetPasswordNotification($this->url, $this->user));
    }
}
