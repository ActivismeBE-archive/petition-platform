@layout('layouts/app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">{{ $signatures->title }}</h2>
                    </div>

                    {{-- Signatures --}}
                        @if ((int) count($signatures->signatures) === 0)
                            <div class="alert alert-info" role="alert">
                                <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
                                Er zijn nog geen handtekeningen voor deze petitie.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Naam:</th>
                                            <th>Plaats:</th>
                                            <th>Datum:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($signatures->signatures as $signature)
                                            @if ($signature->publish == 'Y') 
                                            @else
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    {{-- /Signatures --}}
                </div>
            </div>
        </div>
    </div>
@endsection
