<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    public function storeFeedback(Request $request)
    {
        $feedbacks = new Feedback;
        $feedbacks->name = $request->name;
        $feedbacks->email = $request->email;
        $feedbacks->message = $request->message;
        $feedbacks->subject = $request->subject;
        $feedbacks->save();

        return redirect()->to('contact');
    }
}
