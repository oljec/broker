<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Order;
use App\Question;

class AdminController extends Controller
{
    public function index(){
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('CPanel.index', compact('orderCount', 'questionCount'));
    }
    public function showSettings(){
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('CPanel.settings', compact('orderCount', 'questionCount'));
    }
    public function login(){
        if ( Auth::check() ) {
            return redirect('/CPanel');
        }
        return view('CPanel.login');
    }

    public function store(){
        if ( Auth::check() ) {
            return redirect('/CPanel');
        }
        if (! auth()->attempt(request(['name', 'password']))){
            return back()->withErrors(['Проверте свои данные и попробуйте снова']);
        }
        return redirect('/CPanel');
    }

    public function logout(){
        auth()->logout();

        return redirect('/CPanel/login')->withErrors(['Вы вышли с системы']);
    }
}
