{{-- Navigation bar --}}
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expaneded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ base_url() }}">ActivismeBE - Petities</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if (! $this->user)
                        <li><a href="{{ base_url('manifest') }}"><span class="fa fa-file-text-o" aria-hidden="true"></span> Petities</a></li>
                    @endif

                    @if ($this->user)
                        <li class="dropdown">
                            <a href="#" lass="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-file-text-o" aria-hidden="true"></span> Petities
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ base_url('manifest')}}"><span class="fa fa-file-text-o" aria-hidden="true"></span> Petities</a></li>
                                <li><a href="{{ base_url('manifest/create') }}"><span class="fa fa-plus"></span> Nieuwe petitie</a></li>
                            </ul>
                        </li>
                    @endif

                    <li><a href="{{ base_url('disclaimer') }}"> <span class="fa fa-info-circle" aria-hidden="true"></span> Disclaimer</a></li>
                </ul>

                @if ($this->user)
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="fa fa-user" aria-hidden="true"></span> {{ $this->user['name'] }} ({{ $this->user['username'] }}) <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href=""><span class="fa fa-wrench" aria-hidden="true"></span> Account configuratie</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ base_url('auth/logout') }}"><span class="fa fa-power-off" aria-hidden="true"></span> Uitloggen</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="fa fa-sign-in" aria-hidden="true"></span> Login <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" role="form" method="post" action="{{ base_url('auth/verify') }}" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email adres</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address">
                                                </div>

                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Wachtwoord</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                                    <div class="help-block text-right"><a href="">Wachtwoord vergeten?</a></div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Inloggen</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="bottom text-center">Nieuw hier? <a href="{{ base_url('auth/register') }}"><b>Registreer</b></a></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
{{-- /Navgation bar --}}
