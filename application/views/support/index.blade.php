@layout('layouts/app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ base_url('assets/img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-sm-9"> {{-- Content --}}
            <div class="panel panel-default">
                <div class="panel-body box-shadow">
                    <div class="page-header" style="margin-top: -20px;"> {{-- Page header --}}
                        <div class="btn-toolbar pull-right">
							<div class="btn-group">
                            	<a href="{{ base_url('support/create') }}" class="btn btn-default btn-sm">
									<span aria-hidden="true" class="fa fa-plus"></span> New thread
								</a>
                        	</div>
                    	</div>

                    	<h2>Support Questions</h2>
					</div> {{-- /Page header --}}

					<p>
						<span style="margin-right: 10px;">Showing:</span>
						<a href="" class="btn btn-xs btn-info">
							All
						</a>
						<a href="" class="btn btn-xs btn-info">
							Open
						</a>
						<a href="" class="btn btn-xs btn-info">
							Solved
						</a>
						<a href="" class="btn btn-xs btn-info">
							Closed
						</a>
					</p>

					<div class="well well-sm" style="margin-bottom: 5px;"> {{-- Topic listing --}}
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img class="img-rounded user-avatar media-object" src="..." alt="">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Ik ben een titel <small class="pull-right text-success">Solved!</small></h4>
								<i><small>Posted by Tim Joosten - 00-00-0000</small></i>
							</div>
						</div>
					</div> {{-- Topic listing --}}

                </div>
            </div>
        </div> {{-- /Content --}}

        <div class="col-sm-3"> {{-- Sidebar --}}
            <div class="well well-sm">
                <form method="get" action=""> {{-- Search form --}}
                    <div class="input-group">
                        <input type="text" name="term" placeholder="Zoek op titel" class="form-control">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-danger">
								<span aria-hidden="true" class="fa fa-search"></span>
							</button>
                        </div>
                    </div>
                </form> {{-- /Search form --}}
            </div>

            <div class="panel panel-default"> {{-- Categories --}}
                <div class="panel-heading">
                    <span class="fa fa-tags" aria-hidden="true"></span> Categorieen:
                </div>

                <div class="panel-body">
                </div>
            </div> {{-- /Categories --}}
        </div> {{-- /Sidebar --}}
    </div>
@endsection
