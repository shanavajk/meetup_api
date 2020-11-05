<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participants;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Adding Authentication for the routes
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getParticipants()
    {
        // Returns all participants
        return Participants::all();

    }
    public function index()
    {
        $participants  = $this->getParticipants();
        return view('participants.list')->with('participants', $participants);
    }
    public function edit($participant_id)
    {
        //Retrieves selected participant for edit operation
        $participant = Participants::find($participant_id);
        return view('participants.edit')->with('participant', $participant);
    }

    public function update(Request $request)
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

        //Search Participant if found update details
        $participant_id = $request->get('participant_id');
        $participant = Participants::find($participant_id);
        $participant->name = $request->get('name');
        $participant->dob = $request->get('dob');
        $participant->age = $request->get('age');
        $participant->profession = $request->get('profession');
        $participant->locality = $request->get('locality');
        $participant->no_of_guests = $request->get('no_of_guests');
        $participant->address = $request->get('address');
        $saved =  $participant->save();

        if ( ! $saved)
        {
            $message = 'Update failed...!';
        }
        else
        {
            $message = 'Participant details updated successfully...!';
        }
        $participants  = $this->getParticipants();
        return view('participants.list')->with('message', $message)->with('participants', $participants);        
    }
}
