<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class ProductList extends Component
{


    public function render()
    {
        if(Auth::user())
        {
            $totalProducts =Sale::where('user_id', Auth::user()->id)->where('active', false)->sum('quantity');
        } else {
            $totalProducts = 0;
        }
        return view(
            'livewire.product-list',
            [
                'products' => Product::all(),
                'totalProducts' => $totalProducts

            ]
        );
    }

    public function viewDetail(Product $product)
    {
        return redirect()->route('product-detail', [$product]);
    }

    public function buyProduct(Product $product)
    {
        $sale = Sale::where('product_id', $product->id)->where('active',false)->first();
        if(empty($sale)) {
            Sale::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' =>  1,
                'total' => $product->price
            ]);
        } else {
            $sale->update(
                [
                    'quantity' => $sale->quantity + 1,
                    'total' => ($sale->quantity+1) * $product->price,
                ]
            );
        }
        return redirect()->route('cart');
    }
    public function addProduct(Product $product)
    {
        $sale = Sale::where('product_id', $product->id)->where('active',false)->first();
        if(empty($sale)) {
            Sale::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' =>  1,
                'total' => $product->price
            ]);
        } else {
            $sale->update(
                [
                    'quantity' => $sale->quantity + 1,
                    'total' => ($sale->quantity+1) * $product->price,
                ]
            );
        }
    }
}
