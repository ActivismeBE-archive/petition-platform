@layout('layouts/app')

@section('content')
    <div class="row">

    </div>

    <div class="row row-padding">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Registreer</h2>
                    </div>

                    <form class="form-horizontal" action="index.html" method="post">
                        {{-- TODO: Implement CSRF --}}

                        <div class="form-group">
                            <label for="name" class="control-label col-md-2">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="name" placeholder="Uw naam" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="control-label col-md-2">
                                Gebruikersnaam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="username" placeholder="Uw gebruikersnaam" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label col-md-2">
                                Email adres: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-5">
                                <input type="text" name="email" placeholder="Uw email adres" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span for="password" class="control-label col-md-2">
                                Wachtwoord: <span class="text-danger">*</span>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="confirmation" class="control-label col-md-2">
                                Wachtwoord bevestiging: <span class="text-danger">*</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
