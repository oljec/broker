<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Question;

class OrderController extends Controller
{
    public function store(){
        $this->validate(request(), [
            'service_id' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ]);

        Order::create([
            'service_id' => request('service_id'),
            'name' => request('name'),
            'surname' => request('surname'),
            'structure' => request('structure'),
            'phone' => request('phone'),
            'email' => request('email'),
            'comments' => request('comments')
        ]);

        return back();
    }

    public function read($id){
        $order = Order::find($id);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Orders.read', compact('order', 'orderCount', 'questionCount'));
    }
    public function save($id)
    {
        Order::where('id', $id)->update([
            'state_new' => request('state_new')
        ]);

        return back()->withErrors(['Заказ изменен']);
    }

    public function showAll(){
        $orders = Order::orderBy('state_new', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Orders.showAll', compact('orders', 'orderCount', 'questionCount'));
    }
}