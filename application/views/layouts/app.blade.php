<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ActivismeBE petitie platform"> {{-- TODO: Replace this with a config variable --}}
        <meta name="author" content="Activisme BE"> {{-- TODO: Replace this with a config variable --}}

        <title> ActivismeBE petities | {{ $title }}</title>

        <link rel="icon" href="{{ base_url('assets/favicon.ico') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/ie10-viewport-bug-workaround.css')}}">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
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
                            <li><a href="{{ base_url('manifest') }}"><span class="fa fa-file-text-o" aria-hidden="true"></span> Petities</a></li>
                            <li><a href="{{ base_url('disclaimer') }}"> <span class="fa fa-info-circle" aria-hidden="true"></span> Disclaimer</a></li>
                        </ul>

                        @if ($this->user)
                            <ul class="nav navbar-nav navbar-right">
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
															<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
														</div>

														<div class="form-group">
															<label class="sr-only" for="exampleInputPassword2">Wachtwoord</label>
															<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
															<div class="help-block text-right"><a href="">Wachtwoord vergeten?</a></div>
														</div>

														<div class="form-group">
															<button type="submit" class="btn btn-primary btn-block">Inloggen</button>
														</div>
													</form>
												</div>

												<div class="bottom text-center">Nieuw hier? <a href="#"><b>Registreer</b></a></div>
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

        {{-- Content --}}
            <div class="container">
                {{-- Flash session --}}
                    @if (! empty($this->session->flashdata('class')) && ! empty($this->session->flashdata('message')))
                        <div class="{{ $this->session->flashdata('class') }} alert-dismissable fade in" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $this->session->flashdata('message') }}
                        </div>
                    @endif
                {{-- /Flash session --}}

                @yield('content') {{-- Content partial --}}
            </div>
        {{-- /Content --}}

        {{-- Footer --}}
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 footerleft ">
                        <div class="logofooter">Info</div>
                            <p>
                                ActivismeBE is getart als burgerbeweging dat onafhankelijk is van elke politieke bewegeging. Een organisatie dat zich inzet vanuit burgerinitiatief voor burgers.
                                Wij worden in leven gehouden door vrijwilligers , eigen financiële inbreng en door giften van mensen die onze organisatie steunen.
                            </p>
                        </div>

                        <div class="col-md-2 col-sm-6 paddingtop-bottom">
                            <h6 class="heading7">GENERAL LINKS</h6>

                            <ul class="footer-ul">
                                <li><a href="#"> Activisme.be </a></li>
                                <li><a href="#"> Petities </a></li>
                                <li><a href="#"> Registreren </a></li>
                                <li><a href="#"> Disclaimer </a></li>
                            </ul>
                        </div>

                        <div class="col-md-3 col-sm-6 paddingtop-bottom">
                            <h6 class="heading7">LATEST POST</h6>

                            <div class="post">
                                <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                                <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                                <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 paddingtop-bottom">
                            <h6 class="heading7">CONTACT</h6>

                            <div class="footer-icons">
                                <a class="icon icon-facebook" href=""><i class="fa fa-facebook"></i></a>
                                <a class="icon icon-twitter" href=""><i class="fa fa-twitter"></i></a>
                                <a class="icon icon-skype" href=""><i class="fa fa-skype"></i></a>
                                <a class="icon icon-phone" href=""><i class="fa fa-phone"></i></a>
                                <a class="icon icon-envelop" href=""><i class="fa fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="copyright">
                <div class="container">
                    <div class="col-md-6 no-padding">
                        <p>© {{ date('Y') }} - <a href="">Activisme.be</a></p>
                    </div>

                    <div class="col-md-6">
                        <ul class="bottom_ul">
                            <li><a href="#">Nederlands</a></li>
                            <li><a href="">Engels</a></li>
                            <li><a href="">Frans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        {{-- /Footer --}}

        {{-- JavaScript --}}
        {{-- ====================================== --}}
        {{-- Placed in the bottom because the pagespeed Insights --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>

        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="{{ base_url('assets/js/ie-10-viewport-bug-workaround.js') }}"></script>
    </body>
</html>
