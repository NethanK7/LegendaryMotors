<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Session;
use App\Models\Allocation;
use App\Models\Car;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function checkout()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $config = Session::get('reservation_config');

        if (!$config) {
            return redirect()->route('inventory');
        }

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Deposit for ' . $config['color'] . ' ' . Car::find($config['car_id'])->model,
                            'description' => "Configuration: {$config['kit']} | {$config['rims']}",
                        ],
                        'unit_amount' => 500000, 
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cars.show', $config['car_id']),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->route('cars.show', $config['car_id'])->with('error', 'Payment initialization failed: ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        $config = Session::get('reservation_config');

        if($sessionId && $config) {
            // Ideally verify stripe session here with API
            
            // Create Allocation Record
            Allocation::create([
                'user_id' => auth()->id() ?? 1,
                'car_id' => $config['car_id'],
                'status' => 'reserved',
                'email' => auth()->user() ? auth()->user()->email : null,
                'configuration' => $config,
            ]);

            Session::forget('reservation_config');

            return redirect()->route('dashboard')->with('status', 'Reservation successful! Our team will contact you shortly.');
        }

        return redirect()->route('home');
    }
}
