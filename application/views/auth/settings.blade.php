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
                                    <select class="form-control" name="">
                                        <option value="">-- Dag --</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-control" name="">
                                        <option value="">-- Maand --</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select class="form-control" name="">
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
                                    <input type="text" class="form-control" name="" value="" placeholder="Jouw adres">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">
                                    Stad: {{-- <span class="text-danger">*<span> --}}
                                </label>

                                <div class="col-md-6">
                                    <select name="" class="form-control">
                                        <option value="">-- Selecteer je stad --</span>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">
                                    Land: {{-- <span class="text-danger">*<span> --}}
                                </label>

                                <div class="col-md-6">
                                    <select name="" class="form-control">
                                        <option value=""> -- Selecteer je land -- </option>
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
