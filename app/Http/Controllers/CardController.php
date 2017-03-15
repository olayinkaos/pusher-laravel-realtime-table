<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\User;
use App\Events\ScoreUpdated;

class CardController extends Controller
{
    //

	public function show(Card $card) {
		$user = auth()->user();
		$user->score = $user->score + $card->value;
		$user->save();

        event(new ScoreUpdated($user)); // broadcast `ScoreUpdated` event
        return redirect()->back()->withValue($card->value);
    }

    public function leaderboard () {
    	return User::all(['id', 'name', 'score']);
    }
}
