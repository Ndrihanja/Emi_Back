<?php

namespace App\Http\Controllers;

use App\Mail\PrototypeMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class MailController extends BaseController
{
    public function mailings(Request $request){
        $mailData=[
            'object' => "BIENVENUE",
            'logo' => public_path('images/vitsika.png')
        ];

        Mail::to('rlucasnickbryan@gmail.com')->send(new PrototypeMail($mailData));

        return $this->sendResponse([], "Le mail a bien été envoyé");
    }

    public function mailing(Request $request){
        $data = [
            'title' => 'Titre de l\'email',
            'content' => 'Contenu de l\'email',
        ];

        $logo = public_path('img/vitsika.png');

        Mail::send('mails.prototype', $data, function ($message) use ($logo) {
            $message->to('rlucasnickbryan@gmail.com');
            $message->subject('BIENVENUE');
            $cid = $message->embed($logo);
            $message->setBody('<img src="' . $cid . '"/>', 'text/html');
        });

        return $this->sendResponse([], "Le mail a bien été envoyé");
    }
}
