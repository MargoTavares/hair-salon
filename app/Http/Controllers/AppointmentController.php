<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class AppointmentController extends Controller
{
    const TOTAL_APPTS = 3;

    public function index()
    {
        $appointments = Appointment::all();

        return View::make('appointments')
            ->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookedAppointments = Appointment::all();
        $availableAppointments = self::TOTAL_APPTS - $bookedAppointments->count();

        return view(
            'appointment.create',
            [
                'availableAppointments' => $availableAppointments,
                'totalAppointments'     => self::TOTAL_APPTS,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'firstName'     =>  'required|max:30',
            'lastName'      =>  'required|max:30',
            'address'       =>  'required|max:30',
            'city'          =>  'required|max:20',
            'postalCode'    =>  'required|max:6',
            'phoneNum'      =>  'required|max:10',
            'appType'       =>  'required|max:30',
            'appMonth'      =>  'required',
            'appDay'        =>  'required',
            'details'       =>  'required|max:200',
            'status'        =>  'required'
    ]);

        $appointment                = new Appointment;
        $appointment->firstName     = $request->firstName;
        $appointment->lastName      = $request->lastName;
        $appointment->address       = $request->address;
        $appointment->city          = $request->city;
        $appointment->postalCode    = $request->postalCode;
        $appointment->phoneNum      = $request->phoneNum;
        $appointment->appType       = $request->appType;
        $appointment->appMonth      = $request->appMonth;
        $appointment->appDay        = $request->appDay;
        $appointment->details       = $request->details;
        $appointment->status        = $request->status;
        $appointment->save();

        return \Redirect::to('/appointments1')
            ->withMessage('Thank you, ' . $appointment->firstName .
                '. Your appointment has been booked.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookedAppointments     = Appointment::all();
        $availableAppointments  = self::TOTAL_APPTS - $bookedAppointments->count();
        $appointment            = Appointment::findOrFail($id);

        return View::make('bookAppointment')
            ->with('appointment', $appointment)
            ->with('availableAppointments', $availableAppointments)
            ->with('totalAppointments', self::TOTAL_APPTS);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'firstName'         => 'required',
            'lastName'          => 'required',
            'address'           => 'required',
            'city'              => 'required',
            'postalCode'        => 'required',
            'phoneNum'          => 'required',
            'appType'           => 'required',
            'appMonth'          => 'required',
            'appDay'            => 'required',
            'details'           => 'required',
            'status'            => 'required'
        ];
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('appointments/' . $id . '/edit')
                ->withErrors($validator);
        }

        $appointment = Appointment::find($id);
        $appointment->firstName     = Input::get('firstName');
        $appointment->lastName      = Input::get('lastName');
        $appointment->address       = Input::get('address');
        $appointment->city          = Input::get('city');
        $appointment->postalCode    = Input::get('postalCode');
        $appointment->phoneNum      = Input::get('phoneNum');
        $appointment->appType       = Input::get('appType');
        $appointment->appMonth      = Input::get('appMonth');
        $appointment->appDay        = Input::get('appDay');
        $appointment->details       = Input::get('details');
        $appointment->status        = Input::get('status');
        $appointment->save();

        return \Redirect::to('/appointments')
            ->withMessage('Updated appointment.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        \Session::flash('flash_message',
            'Appointment has been deleted.');

        return \Redirect::to('/appointments');
    }
}
