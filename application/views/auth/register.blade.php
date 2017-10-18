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

                        <div class="form-group {{ form_error('name') ? 'has-error has-feedback' : '' }}">
                            <label for="name" class="control-label col-md-3">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="name" placeholder="Uw naam" class="form-control">

                                @if (form_error('name'))
                                    <span class="fa fa-exclamation-triangle form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block">{{ form_error('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('username') ? 'has-error has-feedback' : '' }}">
                            <label for="username" class="control-label col-md-3">
                                Gebruikersnaam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="username" placeholder="Uw gebruikersnaam" class="form-control">

                                @if (form_error('username'))
                                    <span class="fa fa-exclamation-triangle form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block">{{ form_error('username') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('email') ? 'has-error has-feedback' : '' }}">
                            <label for="email" class="control-label col-md-3">
                                Email adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="email" placeholder="Uw email adres" class="form-control">

                                @if (form_error('email'))
                                    <span class="fa fa-exclamation-triangle form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block">{{ form_error('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('password') ? 'has-error has-feedback' : '' }}">
                            <label for="password" class="control-label col-md-3">
                                Wachtwoord: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="password" class="form-control" name="password" class="form-control" placeholder="Wachtwoord.">

                                @if (form_error('password'))
                                    <span class="fa fa-exclamation-triangle form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block">{{ form_error('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ form_error('password_confirmation') ? 'has-error has-feedback' : '' }}">
                            <label for="confirmation" class="control-label col-md-3">
                                Bevestiging: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="password" class="form-control" name="password_confirmation" class="form-control" placeholder="Bevestiging wachtwoord.">

                                @if (form_error('password_confirmation'))
                                    <span class="fa fa-exclamation-triangle form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block">{{ form_error('password_confirmation') }}</span>
                                @endif
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
