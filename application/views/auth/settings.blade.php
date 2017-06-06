@layout('layouts/auth')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-sm-offset-1 col-lg-md-1 col-md-10 col-sm-10 col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">Account configuratie:</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        {{-- TODO: Implement csrf tokoen --}}

                        <fieldset>
                            <legend>Account informatie:</legend>

                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">
                                    Uw naam: <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="" placeholder="Uw naam" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="birthDate" class="control-label col-md-2">
                                    Geboortedatum: {{-- <span class="text-danger">*</span> --}}
                                </label>

                                <div class="col-md-2">
                                    <select class="form-control" name="day">
                                        <option value="">-- Dag --</option>

                                        @for($day = 1; $day < 32; $day++)
                                            <option value="{{ $day }}">{{ $day }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-control" name="month">
                                        <option value="">-- Maand --</option>
                                        <option value="01">Janauri</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maart</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Augustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-control" name="year">
                                        <option value="">-- Jaar --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-md-2 control-label">
                                    Gebruikersnaam: <span class="text-danger">*</danger>
                                </label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="" placeholder="Uw gebruikersnaam" value="{{ $user->username }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label">
                                    Email adres: <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-6">
                                    <input type="email" name="" value="{{ $user->email }}" placeholder="Uw email adress" class="form-control">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Adres gegevens: (gebruikt voor de petities)</legend>

                            <div class="form-group">
                                <label class="control-label col-md-2">
                                    Adres: {{-- <span class="text-danger">*<span> --}}
                                </label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="address" value="" placeholder="Jouw adres">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">
                                    Stad: {{-- <span class="text-danger">*<span> --}}
                                </label>

                                <div class="col-md-6">
                                    <select name="city" class="form-control">
                                        <option value="">-- Selecteer je stad --</option>

                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id}}"> {{ $city->postal_code }} - {{ $city->city_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">
                                    Land: {{-- <span class="text-danger">*<span> --}}
                                </label>

                                <div class="col-md-6">
                                    <select name="country" class="form-control">
                                        <option value=""> -- Selecteer je land -- </option>

                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"> {{ $country->country_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldest>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Aanpassen
                                </button>

                                <button type="reset" class="btn btn-sm btn-danger">
                                    <span class="fa fa-close" aria-hidden="true"></span> Reset formulier
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
