<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Service;
use App\Order;
use App\Question;

class NewsController extends Controller
{
    public function create(){
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('News.create', compact('orderCount', 'questionCount'));
    }
    public function store(){
        $dataToSave = [
            'title' => request('title'),
            'text' => request('text'),
            'promo_text' => request('promo_text'),
            'active' => request('active'),
            'news_date' => request('news_date')
        ];

        if (request()->file('img_file')){
            $imgFile = request()->file('img_file');
            $imgFilename = $imgFile->getClientOriginalName();
            $imgFile->move(base_path() . '/public/img/news/', $imgFilename);
            $imgFilepath = '/img/news/'.$imgFilename;

            $dataToSave['img_path'] = $imgFilepath;
        }

        News::create($dataToSave);

        return redirect('/CPanel/all-news');
    }

    public function read($id){
        $news = News::find($id);
        $allNews = News::where('active', 1)->orderBy('news_date', 'desc')->take(8)->get();
        $services = Service::where('active', 1)->orderBy('order_num')->get()->toArray();

        if ( empty($news) ){
            return response()->view('page404', compact('services'));
        }

        return view('News.read', compact('news', 'allNews', 'services'));
    }

    public function readAll(){
        $menuNews = News::where('active', 1)->orderBy('news_date', 'desc')->take(8)->get();
        $allNews = News::where('active', 1)->orderBy('news_date', 'desc')->paginate(8);
        $services = Service::where('active', 1)->orderBy('order_num')->get()->toArray();

        return view('News.readAll', compact('menuNews', 'allNews', 'services'));
    }

    public function update($id){
        $news = News::find($id);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('News.update', compact('news', 'orderCount', 'questionCount'));
    }
    public function save($id)
    {
        if (request('submit') == 'save') {
            $dataToSave = [
                'title' => request('title'),
                'text' => request('text'),
                'promo_text' => request('promo_text'),
                'active' => request('active'),
                'news_date' => request('news_date')
            ];

            if (request()->file('img_file')){
                $imgFile = request()->file('img_file');
                $imgFilename = $imgFile->getClientOriginalName();
                $imgFile->move(base_path() . '/public/img/news/', $imgFilename);
                $imgFilepath = '/img/news/'.$imgFilename;

                $dataToSave['img_path'] = $imgFilepath;
            }

            News::find($id)->update($dataToSave);

            return back()->withErrors(['Новость изменена']);
        } else {
            News::find($id)->delete();
            return redirect('/CPanel/all-news');
        }
    }

    public function changeState(){
        News::find(request('id'))->update([
            'active' => request('active')
        ]);

        return redirect('/CPanel/all-news');
    }

    public function showAll(){
        $allNews= News::orderBy('news_date', 'desc')->paginate(10);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('News.showAll', compact('allNews', 'orderCount', 'questionCount'));
    }
}
