<?php

namespace App\Http\Controllers\PuppyRequest;

use App\Http\Requests\PuppyRequest\StoreRequest;
use App\Http\Controllers\Controller;
use App\Mail\PuppyRequestMessage;
use App\Models\PuppyRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (empty($data['puppy_id'])) unset($data['puppy_id']);
        $puppyRequest = PuppyRequest::create($data);
        Mail::mailer('smtp')->to(env('MAIL_OWNER_ADDRESS'))->send(new PuppyRequestMessage($puppyRequest));
        return redirect()->to(URL::previous() . "#puppies")->withSuccess(__('MESSAGE_SENT'));
    }
}
