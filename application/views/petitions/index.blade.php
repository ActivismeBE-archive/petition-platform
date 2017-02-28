@layout('layouts/app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#recent">Recenste petities</a></li>
                        <li><a data-toggle="tab" href="#popular">Populairste petities</a></li>

                        @if ($this->user)
                            <li><a data-toggle="tab" href="#me">Mijn petities</a></li>
                        @endif
                    </ul>

                    <div style="padding-top: 10px;" class="tab-content">
                        <div id="recent" class="tab-pane fade in active">
                            @if ((int) count($recent) === 0)
                                <div class="alert alert-info" role="alert">
                                    <strong>Info:</strong> Er zijn nog geen petities in het systeem.
                                </div>
                            @else
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Handtekeningen:</th>
                                            <th>Naam petitie:</th>
                                            <th>Gecreerd op:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recent as $petition1)
                                            <tr>
                                                <td><span class="label label-primary">{{ count($petition1->signatures) }}</span></td>
                                                <td><a href="{{ base_url('manifest/show/' . $petition1->id) }}">{{ $petition1->title }}</a></td>
                                                <td>{{ $petition1->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>

                        @if ($this->user)
                            <div id="me" class="tab-pane fade in">
                                @if ((int) count($userPetitions) === 0)
                                    <div class="alert alert-info" role="alert">
                                        <strong> <span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong> U hebt nog geen petities aangemaakt.

                                        <a href="{{ base_url('manifest/create') }}" class="pull-right btn btn-xs btn-default">
                                            <span class="fa fa-plus" aria-hidden="true"></span> Maak een petitie.
                                        </a>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-hover table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Handtekeningen:</th>
                                                    <th>Naam petitie:</th>
                                                    <th>Gecreerd op:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userPetitions as $petition3)
                                                    <tr>
                                                        <td><span class="label label-primary">{{ count($petition3->signatures) }} handtekeningen</span></td>
                                                        <td><a href="{{ base_url('manifest/show/' . $petition3->id) }}"> {{ $petition3->title }} </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div id="popular" class="tab-pane fade in">
                            @if ((int) count($popular) === 0)
                                <div class="alert alert-info" role="alert">
                                    <strong>Info:</strong> Er zijn nog geen petities in het systeem.
                                </div>
                            @else
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Handtekeningen:</th>
                                            <th>Naam petitie:</th>
                                            <th>Gecreerd op:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popular as $petition2)
                                            <tr>
                                                <td><span class="label label-primary">{{ count($petition2->signatures) }}</span></td>
                                                <td><a href="{{ base_url('manifest/show/' . $petition2->id) }}">{{ $petition2->title }}</a></td>
                                                <td>{{ $petition2->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
