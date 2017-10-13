<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserInvation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $password;

    public $confirmation_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password, $confirmation_code)
    {
        $this->user = $user;
        $this->password = $password;
        $this->confirmation_code = $confirmation_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email)->subject('Verify your email address')->markdown('mail.user-invation');
    }
}
