<table>
    <thead>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Address</td>
        <td>City</td>
        <td>Postal Code</td>
        <td>Phone Number</td>
        <td>Appointment Type</td>
        <td>Date</td>
        <td>Status</td>
    </thead>
    <tbody>
        @foreach($appointments as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->firstName }}</td>
                <td>{{ $value->lastName }}</td>
            </tr>
        @endforeach
    </tbody>
</table>