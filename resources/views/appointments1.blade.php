<!doctype html>
<html lang="{{ config('app.locale') }}">

    @include('template.head')

    <body>
        <div class="content">
            <div class="title m-b-md">
                Salon
            </div>
            @include('tables.appointmentListingTable')
        </div>
    </body>
</html>
