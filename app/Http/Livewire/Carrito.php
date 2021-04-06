<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Carrito extends Component
{
    public function render()
    {

        $sales = Sale::where('active', false)->where('user_id', Auth::user()->id);
        $total = $sales->sum('total');
        if(Auth::user())
        {
            $totalProducts = $sales->sum('quantity');
        } else {
            $totalProducts = 0;
        }
        return view(
            'livewire.carrito',
            ['sales' => $sales->get(), 'total' => $total, 'totalProducts' => $totalProducts]
        );
    }

    public function deleteProduct(Sale $sale)
    {
        $sale->delete();
    }

    public function addProduct(Product $product)
    {
        $sale = Sale::where('product_id', $product->id)->where('active',false)->first();
        $sale->update([
            'quantity' => $sale->quantity + 1,
            'total' => ($sale->quantity + 1) * $product->price
        ]);
    }

    public function downProduct(Product $product)
    {
        $sale = Sale::where('product_id', $product->id)->where('active',false)->first();
        $sale->update([
            'quantity' => $sale->quantity - 1,
            'total' => ($sale->quantity - 1) * $product->price
        ]);
    }

    public function store()
    {
        return redirect()->route('checkout');
    }
}
