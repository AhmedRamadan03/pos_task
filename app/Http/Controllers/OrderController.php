<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\SaveOrder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        return view('pages.orders.index',[
            'orders' => Order::latest()->paginate(15),
        ]);
    }

    public function create(){
        return view('pages.orders.form',[
            'resource' => new Order(),
            'customers' => Customer::latest()->pluck('name','id')->toArray(),
            'products' => Product::latest()->get(),
        ]);
    }


    public function edit(Order $order){
        return view('pages.orders.form',[
            'resource' => $order,
            'customers' => Customer::latest()->pluck('name','id')->toArray(),
            'products' => Product::latest()->get(),
        ]);
    }
    public function store(SaveOrder $request){
        $inputs = $request->validated();
        $order_data = [
            'customer_id' => $inputs['customer_id'],
            'order_no' => $inputs['order_no'],
            'date' => $inputs['date'],
            'total' => $inputs['total'],
        ];

        $order = Order::create($order_data);
        $this->storeOrderDetails($inputs,$order);

        session()->flash('success', 'item stored successfully ');
        return back();
    }


    public function update(SaveOrder $request , Order $order){
        $inputs = $request->validated();
        $order_data = [
            'customer_id' => $inputs['customer_id'],
            'order_no' => $inputs['order_no'],
            'date' => $inputs['date'],
            'total' => $inputs['total'],
        ];
       $order->update($order_data);
       $this->storeOrderDetails($inputs,$order);

        session()->flash('success', 'item updated successfully ');
        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        OrderDetails::where('order_id',$order->id)->delete();
        $order->delete();
        session()->flash('success', 'Product Deleted successfully ');
        return back();
    }


    private function storeOrderDetails($inputs,$order){

        OrderDetails::where('order_id',$order->id)->delete();
        foreach ($inputs['products'] as $id => $quantity) {
            $product = Product::findOrFail($id);
            $order_details =[
                'order_id' => $order->id,
                'product_id' =>$id,
                'quantity' =>$quantity['quantity'],
                'total' => $quantity['quantity'] * $product->price,
            ];
            OrderDetails::create($order_details);
            $product->update([
                    'quantity' =>  $product->quantity - $quantity['quantity'],
                ]);
        }
    }
}
