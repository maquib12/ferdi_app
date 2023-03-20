@extends('sponsor.layout.master')
@section('content')
    <body onload="JavaScript:AutoRefresh(10000);">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-5">
                    <div class="card verify-otp-page">
                        <div class="card-header bg-white text-center" style="color:black"><h4 class="font-bold mb-0 py-3">{{ __('Verify Your Email Address') }}</h4></div>

                        <div class="card-body text-center text-dark">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                   <p> {{ __('A fresh verification link has been sent to your email address.') }}</p>
                                </div>
                            @endif

                            <p>{{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the any email for verify') }},</p>
                            <form class="d-inline" method="POST" action="{{route('resend-mail')}}">
                                @csrf
                                <input type="hidden" name="email" id="email_verify" value="{{$email}}">
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline font-bold text-capitalize">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
 @endsection
 <script type="text/javascript">
        function AutoRefresh( t )
        {
            setTimeout("location.reload(true);", t);
        }
        // setInterval('autoRefreshPage(150000)', 150000);
</script>
