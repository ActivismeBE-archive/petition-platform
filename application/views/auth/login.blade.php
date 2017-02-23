@layout('layouts/auth')

@section('content')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-sm-8 col-md-8 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body box-shadow">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Inloggen</h2>
                    </div>

                    <form class="form-horizontal" action="" method="post">
                        {{-- TODO: Implement a csrf token --}}

                        <div class="form-group">
                            <label for="email" class="control-label col-md-3">
                                Email adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" class="form-control" name="email" placeholder="Email adres">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label col-md-3">
                                Wachtwoord: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-5">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span class="fa fa-sign-in" aria-hidden="true"></span> Inloggen
                                </button>

                                <a href="" class="btn btn-sm btn-primary">
                                    <span class="fa fa-info-circle"></span> Wachtwoord vergeten
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel-footer box-shadow">
                    Geen account? <a href="{{ base_url('auth/register')}}">Registreer</a>
                </div>
            </div>
        </div>
    </div>
@endsection
