<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
		{
				$this->middleware('auth');
		}

		public function index()
		{
				return view('chat')->with(['auth_user' => Auth::user()]);
		}

		public function fetchMessages()
		{
				return Message::with('user')->get();
		}

		public function sendMessage(Request $request)
		{
				$user = Auth::user();

				$message = $user->messages()->create([
						'message' => $request->input('message')
				]);

				broadcast(new MessageSent($user, $message))->toOthers();

				return ['status' => 'Message Sent'];
		}
}
