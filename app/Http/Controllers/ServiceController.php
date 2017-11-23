<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use App\Order;
use App\Question;

class ServiceController extends Controller
{
    public function create(){
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Services.create', compact('orderCount', 'questionCount'));
    }
    public function store(Request $request){
        $imgFile = $request->file('img_file');
        $imgFilename = $imgFile->getClientOriginalName();
        $imgFile->move(base_path() . '/public/img/services/', $imgFilename);
        $imgFilepath = '/img/services/'.$imgFilename;

        $promo_imgFile = $request->file('promo_img_file');
        $promo_imgFilename = $promo_imgFile->getClientOriginalName();
        $promo_imgFile->move(base_path() . '/public/img/services/', $promo_imgFilename);
        $promo_imgFilepath = '/img/services/'.$promo_imgFilename;

        Service::create([
            'title' => request('title'),
            'img_path' => $imgFilepath,
            'text' => request('text'),
            'active' => request('active'),
            'order_num' => request('order_num'),
            'promo_title' => request('promo_title'),
            'promo_img_path' => $promo_imgFilepath,
            'promo_descr' => request('promo_descr')
        ]);

        return redirect('/CPanel/all-services');
    }

    public function read($id){
        $service = Service::find($id);
        $services = Service::where('active', 1)->orderBy('order_num')->get()->toArray();

        if ( empty($service) ){
            return response()->view('page404', compact('services'));
        }

        return view('Services.read', compact('service', 'services'));
    }
    public function update($id){
        $service = Service::find($id);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Services.update', compact('service', 'orderCount', 'questionCount'));
    }
    public function save($id)
    {
        if (request('submit') == 'save') {
            $dataToSave = [
                'title' => request('title'),
                'text' => request('text'),
                'active' => request('active'),
                'order_num' => request('order_num'),
                'promo_title' => request('promo_title'),
                'promo_descr' => request('promo_descr')
            ];

            if (request()->file('img_file')){
                $imgFile = request()->file('img_file');
                $imgFilename = $imgFile->getClientOriginalName();
                $imgFile->move(base_path() . '/public/img/services/', $imgFilename);
                $imgFilepath = '/img/services/'.$imgFilename;

                $dataToSave['img_path'] = $imgFilepath;
            }
            if (request()->file('promo_img_file')){
                $promo_imgFile = request()->file('promo_img_file');
                $promo_imgFilename = $promo_imgFile->getClientOriginalName();
                $promo_imgFile->move(base_path() . '/public/img/services/', $promo_imgFilename);
                $promo_imgFilepath = '/img/services/'.$promo_imgFilename;

                $dataToSave['promo_img_path'] = $promo_imgFilepath;
            }

            Service::find($id)->update($dataToSave);

            return back()->withErrors(['Сервис изменен']);
        } else {
            Service::find($id)->delete();
            return redirect('/CPanel/all-services');
        }
    }

    public function changeState(){
        Service::find(request('id'))->update([
            'active' => request('active')
        ]);

        return redirect('/CPanel/all-services');
    }

    public function showAll(){
        $services= Service::orderBy('order_num')->get();
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Services.showAll', compact('services', 'orderCount', 'questionCount'));
    }
}
