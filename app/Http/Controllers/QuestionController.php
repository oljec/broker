<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Question;

class QuestionController extends Controller
{
    public function store(){
        $this->validate(request(), [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'text' => 'required'
        ]);

        Question::create([
            'title' => request('title'),
            'name' => request('name'),
            'surname' => request('surname'),
            'structure' => request('structure'),
            'phone' => request('phone'),
            'email' => request('email'),
            'text' => request('text')
        ]);

        return redirect('/');
    }

    public function read($id){
        $question = Question::find($id);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Questions.read', compact('question', 'orderCount', 'questionCount'));
    }
    public function save($id)
    {
        Question::where('id', $id)->update([
            'state_new' => request('state_new')
        ]);

        return back()->withErrors(['Вопрос изменен']);
    }

    public function showAll(){
        $questions= Question::orderBy('state_new', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        $orderCount = Order::where('state_new', 1)->count();
        $questionCount = Question::where('state_new', 1)->count();

        return view('Questions.showAll', compact('questions', 'orderCount', 'questionCount'));
    }
}
