<?php

namespace App\Mail;

use App\Models\PuppyRequest;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PuppyRequestMessage extends Mailable
{
    use SerializesModels;

    public $subject;
    public string $message;
    public $preheader;

    public function __construct(PuppyRequest $puppyRequest)
    {
        $this->subject = __('REQUEST_FOR_PUPPY');
        $this->message = __('NAME') . ': ' . $puppyRequest->name;
        $this->message .= '<br>email: ' . $puppyRequest->email;
        if (!empty($puppyRequest->puppy)) {
            $this->message .= __('PUPPY') . ': ' . $puppyRequest->puppy->name . ' (' . $puppyRequest->puppy->get_litter->letter . ')';
        }
        $this->message .= '<br>---'. __('YOUR_QUESTION') .'---<br>' . $puppyRequest->message;

    }

    public function build(): PuppyRequestMessage
    {
        return $this
            ->subject($this->subject)
            ->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'))
            ->markdown('mails.index');
    }
}
