<?php

namespace App\Http\Controllers;

use App\Models\Contact\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Routes;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        $contacts = Contact::where('user_id', '=', $user_id)->get();
        return view('contact.index', compact('contacts', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->user_id;
        return view('contact.create', compact('user_id'));
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
        $contact = new Contact($input);
        $contact->user_id = $request->user_id;
        $user_id = $request->user_id;

        $exists = Contact::where('email', $contact->email)->first();
        if ($exists)
            return view('contact.create', compact('user_id'));

        if ($contact->save()) {
            $contacts = Contact::where('user_id', '=', $user_id)->get();
            return view('contact.index', compact('contacts', 'user_id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //dd($request->user_id);
        $contact = Contact::find($id);
        $user_id = $request->user_id;
        return view('contact.edit', compact('contact', 'user_id'));
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
        $contact = Contact::find($id);
        $contact->name = Input::get('name');
        $contact->surname = Input::get('surname');
        $contact->email = Input::get('email');
        $contact->contact_no = Input::get('contact_no');

        $exists = Contact::where('email', $contact->email)->first();
        if ($exists  && $exists->id != $id) {
            return Redirect::route('contact.edit', [$id])->withInput()->with('danger', 'Contact with email "' . $contact->email . '" already exists!');
        }

        if ($contact->update()) {
            $user_id = $request->user_id;
            $contacts = Contact::where('user_id', '=', $user_id)->get();
            return view('contact.index', compact('contacts', 'user_id'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        $user_id = $request->user_id;
        $contacts = Contact::where('user_id', '=', $user_id)->get();
        return view('contact.index', compact('contacts', 'user_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $id)
    {
        //
    }
}
