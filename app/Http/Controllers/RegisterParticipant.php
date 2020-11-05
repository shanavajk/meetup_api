<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participants;

class RegisterParticipant extends Controller
{
    public function index()
    {
        //Returns registartion view
        return view('participants.index');
    }
    public function create(Request $request)
    {
         //Validating all the inputs
        $this->validate($request, [
            'name' => 'required|regex:/^[a-z A-Z]+$/u|min:5|max:50',
            'dob' => 'required|date',
            'age' => 'required|numeric',
            'profession' => 'required|in:Employed,Student',
            'locality' => 'required|string',
            'no_of_guests' => 'numeric|min:0|max:2',
            'address' => 'required|max:50'
        ]);
        
        //Registering new participant
        $participant = new Participants;
        $participant->name = $request->get('name');
        $participant->dob = $request->get('dob');
        $participant->age = $request->get('age');
        $participant->profession = $request->get('profession');
        $participant->locality = $request->get('locality');
        $participant->no_of_guests = $request->get('no_of_guests');
        $participant->address = $request->get('address');
        $saved =  $participant->save();
        
        //If Registration failed send failed message oherwise success
        if ( ! $saved)
        {
            $message = 'Registration failed...!';
        }
        else
        {
            $message = 'Meetup request registered successfully...!';
        }
        return view('participants.index')->with('message', $message);
    }
}
