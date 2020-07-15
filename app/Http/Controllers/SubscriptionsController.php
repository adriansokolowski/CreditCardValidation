<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use App\Rules\Visa;
use App\Rules\MasterCard;
use App\Rules\AmericanExpress;
use Illuminate\Support\Facades\Mail;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::get();

        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('subscriptions.create');
    }

    public function store()
    {
        $this->validateCard();
        $sub = Subscription::findOrFail(1);
        $sub->status = 'active';
        $sub->save();
        /*Mail::raw('Nowa subksrybcja', function($message){
            $message->to('adrian.sokolowski117@gmail.com')
            ->subject('Potwierdzenie subskrybcji');
        });*/

        return redirect(route('subscriptions.index'));
    }

    protected function validateCard()
    {
        $type = request()->input('CardType');
        $card = 'numeric';
        if ($type == 'vi') {
            $card = new Visa;
        } else if ($type == 'ms'){
            $card = new MasterCard;
        } else {
            $card = new AmericanExpress;
        }

        return request()->validate([
            'CardNumber' => ['required', $card],
            'CvvNumber' => 'required|numeric|',
            'CardType' => 'required'
        ]);
        
    }
}