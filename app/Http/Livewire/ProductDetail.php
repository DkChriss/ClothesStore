<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $product,$quantity = 1;
    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        if(Auth::user())
        {
            $totalProducts =Sale::where('user_id', Auth::user()->id)->where('active', false)->sum('quantity');
        } else {
            $totalProducts = 0;
        }
        return view('
            livewire.product-detail',
            [
                'products' => Product::where('id', '!=', $this->product->id)->get(),
                'totalProducts' => $totalProducts
            ]
        );
    }

    public function viewDetail(Product $product)
    {
        return redirect()->route('product-detail', [$product]);
    }

    public function plusProduct()
    {
        $this->quantity++;
    }
    public function downProduct()
    {
        $this->quantity--;
    }

    public function buyProduct(Product $product)
    {
        $sale = Sale::where('product_id', $product->id)->where('active',false)->first();
        if(empty($sale)) {
            Sale::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' =>  $this->quantity,
                'total' => $this->quantity * $product->price
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
                'quantity' =>  $this->quantity,
                'total' =>  $this->quantity * $product->price
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
