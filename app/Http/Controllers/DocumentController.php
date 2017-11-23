<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Document;
use App\Order;
use App\Question;

class DocumentController extends Controller
{
    public function create(){
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Documents.create', compact('orderCount', 'questionCount'));
    }
    public function store(Request $request){
//        $this->validate(request(), [
//            'title' => 'required',
//            'img_path' => 'required',
//            'text' => 'required',
//            'active' => 'required',
//            'order' => 'required',
//            'promo_title' => 'required',
//            'promo_img_path' => 'required',
//            'promo_descr' => 'required'
//        ]);

        $imgFile = $request->file('img_file');
        $imgFilename = $imgFile->getClientOriginalName();
        $imgFile->move(base_path() . '/public/img/documents/', $imgFilename);
        $imgFilepath = '/img/documents/'.$imgFilename;

        $docFile = $request->file('doc_file');
        $docFilename = $docFile->getClientOriginalName();
        $docFile->move(base_path() . '/public/files/', $docFilename);
        $docFilepath = '/files/'.$docFilename;

        Document::create([
            'title' => request('title'),
            'img_path' => $imgFilepath,
            'file_path' => $docFilepath,
            'active' => request('active'),
            'order_num' => request('order_num'),
            'file_name' => $docFilename
        ]);

        return redirect('/CPanel/all-documents');
    }

    public function read(){
        $documents= Document::where('active', 1)->orderBy('order_num')->get();
        $services = Service::where('active', 1)->orderBy('order_num')->get()->toArray();

        return view('Documents.read', compact('documents', 'services'));
    }
    public function update($id){
        $document = Document::find($id);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Documents.update', compact('document', 'orderCount', 'questionCount'));
    }
    public function save($id)
    {
        if (request('submit') == 'save') {
            $dataToSave = [
                'title' => request('title'),
                'active' => request('active'),
                'order_num' => request('order_num')
            ];
            if (request()->file('img_file')){
                $imgFile = request()->file('img_file');
                $imgFilename = $imgFile->getClientOriginalName();
                $imgFile->move(base_path() . '/public/img/documents/', $imgFilename);
                $imgFilepath = '/img/documents/'.$imgFilename;

                $dataToSave['img_path'] = $imgFilepath;
            }
            if (request()->file('doc_file')){
                $docFile = request()->file('doc_file');
                $docFilename = $docFile->getClientOriginalName();
                $docFile->move(base_path() . '/public/files/', $docFilename);
                $docFilepath = '/files/'.$docFilename;

                $dataToSave['file_path'] = $docFilepath;
                $dataToSave['file_name'] = $docFilename;
            }
            Document::where('id', $id)->update($dataToSave);

            return back()->withErrors(['Документ изменен']);
        } else {
            Document::find($id)->delete();
            return redirect('/CPanel/all-documents');
        }
    }

    public function changeState(){
        Document::find(request('id'))->update([
            'active' => request('active')
        ]);

        return redirect('/CPanel/all-documents');
    }

    public function showAll(){
        $documents= Document::orderBy('order_num')->get();
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Documents.showAll', compact('documents', 'orderCount', 'questionCount'));
    }
}
