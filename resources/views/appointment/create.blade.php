<!doctype html>
<html lang="{{ config('app.locale') }}">

    @include('template.head')

    <body>
        <div class="hero-enterLot">
            <div class="hero-content">
                <div class="title m-b-md">
                    Salon
                </div>
                @include('session')
                @include('errors')
                @include('forms.bookAppointmentForm')
            </div>
        </div>
    </body>

    @include('template.footer')

</html>
