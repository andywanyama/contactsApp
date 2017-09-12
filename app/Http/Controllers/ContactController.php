<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactGroup;
use App\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts', $contacts));
    }

    public function postmail(Request $request) {
        $this->validate($request, ['email' => 'required', 'emailmsg' => 'required']);
        $email = $request->email;
        Mail::raw($request->emailmsg, function ($m) use ($email) {
            $m->from('phpmaster90@gmail.com', 'Contacts Email');
            $m->to($email)->subject('Andrew Contact Email');
        });
        session()->flash('success', 'Mail sent successfully!');
        return redirect()->back();
    }

    public function sendmail(Request $request, $email) {
        return view('contacts.email', compact('email', $email));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $contact = '';
        $groups = ContactGroup::all();
        //dd($groups);
        return view('contacts.create', compact('groups', 'contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required'
        ]);
        $input = $request->all();
        Contact::create($input);
        session()->flash('success', 'Contact created successfully!');
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $contact = Contact::findOrFail($id);
        $groups = ContactGroup::all();
        return view('contacts.create', compact('groups', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required'
        ]);
        $input = $request->all();
        $contact->fill($input)->save();
        $contact->contact_group()->attach($id);
        session()->flash('success', 'Contact updated successfully!');
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
