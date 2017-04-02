@layout('layouts/app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">ActivismeBE - Petities</h2>
                    </div>

                    <p>
                        Via dit platform brengt Activisme.be hun petities tot bij u. De bedoeling van onze petities is om de keuzes van onze huidige regering aan te kaarten.
                        Met het oog op inspraak van de burgers op de keuzes van deze politici.
                    </p>

                    <p>
                        Hebt u zelf een idee voor een petitie en hebt u hulp nodig?
                        Dan kunt u gerust naar ons mailen op het adres (<a href="mailto:acties@activisme.be">acties@activisme.be</a>). En wij zullen u bijstaan met u petitie waar nodig.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Laatste petities:</div>

                @if (count($petitions) === 0)
                    <div class="panel-body">
                        <span class="text-muted"><i>(Geen petities gevonden)</i></span>
                    </div>
                @else
                    <div class="list-group">
                        @foreach ($petitions as $petition)
                            <a href="{{ base_url('manifest/show/' . $petition->id) }}" class="list-group-item">
                                <span class="fa fa-chevron-right" aria-hidden="true"></span>

                                @if (strlen($petition->title) > 15)
                                    {{ substr($petition->title, 0, 15) . '...' }}
                                @else 
                                    {{ $petition->title }}
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
