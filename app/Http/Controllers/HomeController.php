<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Turn;
use App\Events\NewGame;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $usersQuery = User::where('id', '!=', $user->id);
        if($request->has('search')){
            $usersQuery->where('name', 'like', "%{$request->get('search')}%");
        }
        $users = $usersQuery->paginate(5);
        return view('home', compact('user', 'users'));
    }
    public function newGame(Request $request)
    {
        $user = $request->user();
        $opponentId = $request->get('user_id');
        $gameId = Game::insertGetId([]);
        for($i = 1; $i <= 9; $i++) {
            Turn::insert([
                "game_id" => $gameId,
                "id" => $i,
                "type" => $i % 2 ? 'x' : 'o',
                "player_id" => $i % 2 ? $user->id : $opponentId,
            ]);
        }
        event(new NewGame($opponentId, $gameId, $user->name));

        return redirect("/board/{$gameId}");
    }
}
