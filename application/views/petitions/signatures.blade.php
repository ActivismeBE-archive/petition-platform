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
                        <h2 style="margin-bottom: -5px;">
                            {{ ucfirst($signatures->title) }}
                            <small>- handtekeningen ({{ count($signatures->signatures) }})</small>
                        </h2>
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
                                            <tr>
                                                <td>#{{ $signature->id }}</td>

                                                @if ($signature->publish == 'Y')
                                                    <td>{{ $signature->name}}</td>
                                                    <td>
                                                        <img style="height: 12px;" src="{{ base_url('assets/img/flags/' . $signature->countryRel->country_flag) }}" alt="{{ $signature->cityRel->city_name }}">
                                                        {{ $signature->countryRel->country_name }} | {{ $signature->cityRel->postal_code }} - {{ $signature->cityRel->city_name}}
                                                    </td>
                                                    <td>{{ $signature->created_at }}</td>
                                                @else
                                                    <td colspan="3"><i><span class="text-muted">Deze gebruiker heeft gekozen om anoniem te tekenen.</i></td>
                                                @endif
                                            </tr>
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
