<?php

namespace App\Http\Controllers;

use App\Service;
use App\News;

class HomeController extends Controller
{
    public function index(){
        $services = Service::where('active', 1)->orderBy('order_num')->get()->toArray();
        $allNews = News::where('active', 1)->orderBy('news_date', 'desc')->take(5)->get();

        return view('home', compact('allNews', 'services'));
    }
}
