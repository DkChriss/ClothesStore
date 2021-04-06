<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use Livewire\Component;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use stdClass;

class Checkout extends Component
{
    public $name,$email,$address ,$city , $provincia;
    public $phone;
    public $numberCard = '', $ccv = '', $emailPaypal = '', $passwordPaypal = '';

    public function render()
    {
        $sales = Sale::where('active', false)->where('user_id', Auth::user()->id);
        $total = $sales->sum('total');
        $totalProducts = $sales->sum('quantity');
        return view('livewire.checkout', ['total' => $total, 'totalProducts' => $totalProducts]);
    }

    public function store()
    {

        $list_products = [];
        $sales = Sale::where('active', false)->where('user_id', Auth::user()->id)->get();
        foreach ($sales as $sale) {
            $sale->update(['active' => true]);
            array_push($list_products, $sale->product);
        }

        if($this->emailPaypal !== '' && $this->passwordPaypal !== '')
        {
            Bill::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'city' => $this->city,
                'address' => $this->address,
                'provincia' => $this->provincia,
                'email' => $this->email,
                'payment' => [
                    'emailPaypal' => $this->emailPaypal,
                    'passwordPaypal' => $this->passwordPaypal,
                    'payment' => 'PayPal'
                ],
                'list_products' => $list_products,
                'user_id' => Auth::user()->id
            ]);

        } else {
            Bill::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'city' => $this->city,
                'address' => $this->address,
                'provincia' => $this->provincia,
                'email' => $this->email,
                'payment' => [
                    'numberCard' => $this->numberCard,
                    'ccv' => $this->ccv,
                    'payment' => 'Credit Card'
                ],
                'list_products' => $list_products,
                'user_id' => Auth::user()->id
            ]);
        }
        return redirect()->route('/');
    }
}
