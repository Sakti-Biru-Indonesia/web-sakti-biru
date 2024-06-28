<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionSender;
use Illuminate\Support\Facades\Session;

class QuestionSenderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|numeric',
        'message' => 'required|string',
    ]);

    QuestionSender::create([
        'name' => $request->name,
        'phone_number' => $request->phone_number,
        'message' => $request->message,
    ]);

    Session::flash('success', 'Your message has been sent successfully.');
    return redirect()->back();
}


    public function index()
    {
        $messages = QuestionSender::simplePaginate(5);

        return view('pages.dashboard.question.index', compact('messages'));
    }

}

