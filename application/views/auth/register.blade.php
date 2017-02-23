@layout('layouts/auth')

@section('content')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-sm-8 col-md-8 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body box-shadow">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Registreer</h2>
                    </div>

                    <form class="form-horizontal" action="{{ base_url('auth/store') }}" method="post">
                        {{-- TODO: Implement CSRF --}}

                        <div class="form-group">
                            <label for="name" class="control-label col-md-3">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="name" placeholder="Uw naam" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="control-label col-md-3">
                                Gebruikersnaam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="username" placeholder="Uw gebruikersnaam" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label col-md-3">
                                Email adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="email" placeholder="Uw email adres" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label col-md-3">
                                Wachtwoord: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input class="form-control" name="password" class="form-control" placeholder="Wachtwoord.">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirmation" class="control-label col-md-3">
                                Bevestiging: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input class="form-control" name="password_confirmation" class="form-control" placeholder="Bevestiging wachtwoord.">
                            </div>
                        </div>

                        <diç>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Registereren
                                </button>

                                <button type="reset" class="btn btn-sm btn-danger">
                                    <span class="fa fa-close" aria-hidden="true"></span> Reset formulier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Bij de registratie van een account accepteerd u onze <a href="{{ base_url('disclaimer') }}">disclaimer.</a>
                </div>
            </div>
        </div>
    </div>
@endsection
