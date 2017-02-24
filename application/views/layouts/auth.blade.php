<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ActivismeBE petitie platform"> {{-- TODO: Replace this with a config variable --}}
        <meta name="author" content="Activisme BE"> {{-- TODO: Replace this with a config variable --}}

        <title> ActivismeBE petities | {{ $title }}</title>

        <link rel="icon" href="{{ base_url('assets/favicon.ico') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/ie10-viewport-bug-workaround.css')}}">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @include('layouts/partials/navbar')

        {{-- Content --}}
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-sm-8 col-md-8 col-lg-8">
                        {{-- Flash session --}}
                            @if (! empty($this->session->flashdata('class')) && ! empty($this->session->flashdata('message')))
                                <div class="{{ $this->session->flashdata('class') }} alert-dismissable fade in" role="alert">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $this->session->flashdata('message') }}
                                </div>
                            @endif
                        {{-- /Flash session --}}
                    </div>
                </div>

                @yield('content') {{-- Content partial --}}
            </div>
        {{-- /Content --}}

        {{-- JavaScript --}}
        {{-- ====================================== --}}
        {{-- Placed in the bottom because the pagespeed Insights --}}
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
        <script src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>

        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="{{ base_url('assets/js/ie-10-viewport-bug-workaround.js') }}"></script>
    </body>
</html>
