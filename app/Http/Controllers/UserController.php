<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\User\User;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Routes;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $user = new User($input);
        $user->password = Hash::make(Input::get('password'));

        $exists = User::where('email', $user->email)->first();
        if ($exists) {
            $message = 'User already exists, please login!';
            return Redirect::back()->withInput()->withErrors(array('email' => $message));
        }

        if ($user->save()) {
            $message = 'Successfully added user!';
            return Redirect::back()->withInput()->withErrors(array('email' => $message));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showLogin()
    {
        // show the form
        return view('user.login');
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $user = User::where('email', '=', Input::get('email'))->first();

        //check if email address exists
        if (!$user) {
            $message = "Email address does not exist on user's table, please register";
            return Redirect::back()->withInput()->withErrors(array('email' => $message));
        } else {
            $user_id = $user->id;
            return Redirect::route('contacts', ['user_id' => $user_id]);
        }
    }
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return view('user.login');
    }
}
