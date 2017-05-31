<h4>Please enter in the following information:</h4>
<div class="feedback">
    {{ Form::open(array('action' => 'AppointmentController@store')) }}

    {{ Form::hidden('status', 'pending') }}

    <p>
        {{ Form::label('lblFirstName', 'First Name: ') }}
        {{ Form::text('firstName') }} |
        {{ Form::label('lblLastName', '   Last Name: ') }}
        {{ Form::text('lastName') }}
        <br><br>
        {{ Form::label('lblAddress', 'Address: ') }}
        {{ Form::text('address') }} |
        {{ Form::label('lblCity', '   City: ') }}
        {{ Form::text('city') }}
        <br><br>
        {{ Form::label('lblPostal', 'Postal Code: ') }}
        {{ Form::text('postalCode') }} |
        {{ Form::label('lblPhoneNum', '   Phone Number: ') }}
        {{ Form::text('phoneNum') }}
    </p>

    <hr>

    <p>
        {{ Form::label('lblAppType', 'Appointment Type: ') }}
        {{ Form::text('appType') }} |
        {{ Form::label('lblTime', 'Appointment Time: ') }}
        {{ Form::select('selTime',
        [
            '9:00am',
            '10:00am',
            '11:00am',
            '12:00pm',
            '1:00pm',
            '2:00pm',
            '3:00pm',
            '4:00pm',
            '5:00pm',
            '6:00pm',
            '7:00pm',
            '8:00pm'
        ], null, ['class' => 'appointments-select'])
        }}
    </p>
    <p>
        {{ Form::label('lblAppMonth', 'Month: ') }}
        {{ Form::selectMonth('appMonth') }} |
        {{ Form::label('lblAppDay', 'Day: ') }}
        {{ Form::selectRange('appDay', 1, 31) }}
    </p>
    <p>
        {{ Form::label('lblDetails', ('Would you like to add any additional details for your hair stylist?')) }}<br>
        {{ Form::textarea('details', null, ['size' => '60x5']) }}
    </p>

</div>

    <br>

    {{ Form::submit('Book Appointment', array('class' => 'hero-buttons')) }}

    {{ Form::close() }}





