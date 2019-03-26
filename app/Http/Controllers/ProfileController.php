<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
    }


    public function index() {
        return view('main.users.index', [
            'users' =>  User::paginate(15)->onEachSide(1)
        ]);
    }

    public function profile($route) {

        $user = User::where('route', $route)->orWhere('username', $route)->firstOrFail();

        if(!is_null($user->route) && $route != $user->route)
            return redirect(route('user.profile', $user->route),301);

        return view('main.users.profile', [
            'user' => $user
        ]);
    }



    public function edit($route) {

        $user = User::where('route', $route)->orWhere('username', $route)->firstOrFail();

        if($user->id != Auth::id())
            return abort(404);

        if(!is_null($user->route) && $route != $user->route)
            return redirect(route('user.profile.edit', $user->route),301);

        return view('main.users.profile_edit', [
            'user' => $user
        ]);
    }








    public function editUrl ($route) {
        if(request()->ajax()) {
            $user = User::find(Auth::id());
            return 'dsds';
        }
    }
}
