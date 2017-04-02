@layout('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline pull-left" action="{{ base_url('users/search') }}" method="post">
                <div class="form-group">
                    <label class="sr-only" for="term">Zoekterm:</label>
                    <input type="text" class="form-control input-sm" id="term" placeholder="Uw zoekterm">
                </div>

                <button type="submit" class="btn btn-sm btn-info">
                    <span class="fa fa-search" aria-hidden="true"></span> Zoek
                </button>
            </form>

            <a class="pull-right btn btn-sm btn-primary" href="">
                <span class="fa fa-plus" aria-hidden="true"></span> Gebruiker toevoegen
            </a>
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body box-shadow">
                    @if ((int) count($users) === 0) {{-- No users found --}}
                        <div class="alert alert-info" role="alert">
                            <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
                            Wij konden geen gebruikers vinden in het systeem.
                        </div>
                    @else {{-- Users found --}}
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam:</th>
                                    <th>Gebruikersnaam:</th>
                                    <th>Email:</th>
                                    <th colspan="2">Aangemaakt op:</th> {{-- Colspan="2" needed for the functions.  --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><code>#U{{ $user->id }}</code></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>

                                        <td class="pull-right"> {{-- Functions --}}
                                            <a href="{{ base_url('users/show/' . $user->id) }}" class="label label-info">Bekijk</a>

                                            @if ((string) $user->blocked === 'N')
                                                <a onclick="edit('{{ base_url('users/getUser/' . $user->id) }}')" class="label label-danger">Blokkeer</a>
                                            @else
												<a href="{{ base_url('users/unblock/' . $user->id) }}" class="label label-success">Deblokkeer</a>
                                            @endif

                                            <a href="{{ base_url('users/delete/' . $user->id) }}" class="label label-danger">Verwijder</a>
                                        </td> {{-- /Functions --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Includes --}}
        @include('users/modals/block-user')
    {{-- /Modal includes --}}
@endsection
