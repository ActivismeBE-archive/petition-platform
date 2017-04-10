@layout('layouts/app')

@section('extra-js')
    <script src="{{ base_url('assets/js/Comments.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default"> {{-- Petition panel --}}
                <div class="panel-body">
                    {{-- Petition manifest --}}
                        <div style="margin-top: -20px;" class="page-header">
                            <div class="pull-right">
                                <div class="dropdown">
                                    <button class='btn btn-sm btn-info dropdown-toggle' data-toggle="dropdown" type="button">
                                        <span class="fa fa-info-circle" aria-hidden="true"></span> Informatie <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        @if ($petition->creator_id === $this->user['id'])
                                            <li>
                                                <a onclick="getDataById('{{ base_url('manifest/getById/' . $petition->id) }}', 'update')" >
                                                    <span class="fa fa-plus" aria-hidden="true"></span> Schrijf een update
                                                </a>
                                            </li>
                                        @endif

                                        <li><a href="{{ base_url() }}"><span class="fa fa-info-circle" aria-hidden="true"></span> Updates</a></li>
                                        <li><a href="{{ base_url('manifest/signatures/' . $petition->id) }}"><span class="fa fa-file-text-o" aria-hidden="true"></span> Handtekeneningen</a></li>

                                        @if (! $petition->creator_id === $this->user['id'])
                                            <li><a href="mailto:{{ $petition->creator->email }}"><span class="fa fa-envelope" aria-hidden="true"></span> Contacteer verantwoordelijke</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <h2 style="margin-bottom: -5px;">{{ $petition->title }}</h2>
                        </div>

                        {{ $petition->description }}
                    {{-- /Petition manifest --}}
                </div>
            </div> {{-- /petition panel --}}

            {{-- TODO: Make dynamic --}}
            @if ((int) count($petition->updates) > 0)
                <div class="panel panel-info"> {{-- Petition updates --}}
                    <div class="panel-heading">Laatste updates: <a href="" class="pull-right label label-primary">Alle updates</a></div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach ($petition->updates as $update)
                                <div class="col-md-4">
                                    <a href="" style="text-decoration: none;" class="thumbnail">
                                        <div class="caption">
                                            <p>{{ $petition->description }} </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div><!--/row-->
                    </div>
                </div> {{-- /Petition updates --}}
            @endif

			<hr>

            {{-- Comment box --}}
                {{-- Comments --}}
                    {{ $comments_link }}
                    @foreach ($comments as $comment)
                        <div class="well well-sm" style="margin-bottom:10px;">
							<div class="media">
	  							<div class="media-left">
	    							<a href="#">
	      								<img style="width: 64px; height:64px;" class=" img-rounded media-object" src="" alt="...">
	    							</a>
	  							</div>

	  							<div class="media-body">
	    							<h4 class="media-heading">
                                        {{ Authencate::find($comment->pivot->author_id)->name }} <small>{{ $comment->created_at }}</small>

                                        @if ($this->user)
                                            <span class="pull-right">
												<small>
    	    									  	<a href="#" onclick="report('{{ base_url('comments/getId/' . $comment->id) }}')">
    	    										   	<small class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Rapporteer</small>
    	    										</a>

    	    										@if (in_array('Admin', $this->permissions) || (int) $comment->pivot->author_id === $this->user['id'])
                                                        <a href="{{ base_url('comments/delete/petition/' . $comment->id) }}">
        	    											<small class="text-danger"><span class="fa fa-close"></span> Verwijder</small>
        	    										</a>
                                                    @endif
    	    									</small>
											</span>
                                        @endif
	    							</h4>

	    							{{ $comment->comment }}
	  							</div>
							</div>
						</div>
                    @endforeach

                    @if ((int) count($comments) > 0)
                        <hr>
                    @endif
                {{-- /Comments --}}

                {{-- Reaction box --}}
                    @if ($this->user)
                        <form class="form-horizontal" action="{{ base_url('comments/insert/' . $petition->id) }}" method="post">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea name="comment" rows="5" class="form-control" placeholder="Uw reactie"></textarea>
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
                    <form class="form-horizontal" id="signature" action="{{ base_url('manifest/sign/' . $petition->id ) }}" method="post">
                        {{-- TODO: Implement CSRF token --}}

                        <div class="form-group form-group-sm {{ form_error('name') ? 'has-error' : '' }}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Naam en voornaam" name="name" value="">
                            </div>
                        </div>

                        <div class="form-group form-group-sm {{ form_error('email') ? 'has-error has-feedback' : '' }}">
                            <div class="col-sm-12">
                                <input class="form-control" class="form-control" placeholder="Email adres" name="email" value="{{ set_value('email') }}">

                                @if (form_error('email'))
                                    <span class="fa fa-exclamation-triangle form-control-feedback" aria-hidden="true"></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-group-sm {{ form_error('city') ? 'has-error' : '' }}">
                            <div class="col-sm-12">
                                <select class="form-control" name="city">
                                    <option value=""> -- Stad -- </option>

                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city_id }}" @if ((int) set_value('city') === $city->city_id) selected @endif>{{ $city->postal_code }} - {{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-sm {{ form_error('country') ? 'has-error' : '' }}">
                            <div class="col-sm-12">
                                <select name="country" class="form-control">
                                    <option value=""> -- Land --</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->country_id }}" @if ((int) set_value('country') === $country->country_id) selected @endif> {{ $country->country_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="checkbox" name="publish" value="Y"> Ik teken publiekelijk.
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

    {{-- Modal includes --}}
        @include('petitions/partials/report-modal')
        @include('petitions/partials/update-modal')
    {{-- /Modal includes --}}
@endsection
