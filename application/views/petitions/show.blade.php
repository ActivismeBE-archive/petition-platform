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
                    {{-- Petition manifest --}}
                        <div style="margin-top: -20px;" class="page-header">
                            <h2 style="margin-bottom: -5px;">{{ $petition->title }}</h2>
                        </div>

                        {{ $petition->description }}
                    {{-- /Petition manifest --}}
                </div>
            </div>

			<hr>

            {{-- Comment box --}}
                {{-- Comments --}}
                {{-- /Comments --}}

                {{-- Reaction box --}}
                    @if ($this->user)
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea name="name" rows="5" class="form-control" placeholder="Uw reactie"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <span class="fa fa-comment" aria-hidden="true"></span> Reageren
                                    </button>

                                    <button class="btn btn-sm btn-danger">
                                        <span class="fa fa-undo" aria-hidden="true"></span> Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info" role="alert">
                            <strong><span class="fa fa-warning" aria-hidden="true"></span> Info:</strong>
                            U moet ingelogd zijn om te kunnen reageren.
                        </div>
                    @endif
                {{-- /Reaction box --}}
            {{-- /COmment box --}}
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-pencil" aria-hidden="true"></span> Tekenen:
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" id="signature" action="index.html" method="post">
                        {{-- TODO: Implement CSRF token --}}

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Naam en voornaam" name="" value="">
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <input class="form-control" class="form-control" placeholder="Email adres" name="" value="">
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <select class="form-control" name="">
                                    <option value=""> -- Stad -- </option>

                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city_id}}">{{ $city->postal_code }} - {{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <select name="" class="form-control">
                                    <option value=""> -- Land --</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id}}"> {{ $country->country_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="checkbox" name="" value="Y"> Ik teken publiekelijk.
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel-footer">
                    <button class="btn btn-xs btn-success" form="signature" type="submit">
                        <span class="fa fa-pencil" aria-hidden="true"></span> Teken
                    </button>

                    <button class="btn btn-xs btn-danger">
                        <span class="fa fa-undo"></span> Formulier legen</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
