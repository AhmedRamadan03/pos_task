<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\SaveCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        return view('pages.customer.index',[
            'customers' => Customer::latest()->paginate(15),
            'resource' => request()->resource > 0? Customer::find(request()->resource) : new Customer(),
        ]);
    }

    public function store(SaveCustomer $request){
        $data = $request->validated();
        Customer::create($data);
        session()->flash('success', 'item stored successfully ');
        return back();
    }


    public function update(SaveCustomer $request , Customer $customer){
        $data = $request->validated();
       $customer->update($data);
        session()->flash('success', 'item updated successfully ');
        return redirect()->route('customer.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('success', 'Customer Deleted successfully ');
        return back();
    }
}
