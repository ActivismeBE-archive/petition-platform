@layout('layouts/app')

@section('content')
	<div class="row"> {{-- Image --}}
	</div> {{-- /Image --}}

	<div class="row row-padding"> {{-- Content --}}
		<div class="col-sm-9"> {{-- Content section --}}
			<div class="panel panel-default">
				<div class="panel-body">
					<div style="margin-top: -20px;" class='page-header'> {{-- Page header --}}
						<h2>Stel een nieuwe vraag</h2>
					</div> {{-- End page header --}}

					<form action="" method="post"> {{-- Question form --}}
						{{-- TODO: Implement csrf token --}}

						{{-- Title form-group --}}
						<div class="form-group">
							<label for="subject">Subject: <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="title" id="subject" placeholder="Onderwerp">
						</div>

						{{-- Question form-group --}}
						<div class="form-group">
							<label for="description">Uw vraag: <span class="text-danger">*</span></label>
							<textarea class="form-control" name="description" rows="7" placeholder="Uw vraag"></textarea>
						</div>

						<h4>Describe your question by selecting tags.</h4>

						@if ((int) count($categories) > 0)
							@foreach ($categories as $tag)
								<label style="padding-right: 8px;">
									<input name="tags[]" type="checkbox"> {{ $tag->name }}
								</label>
							@endforeach
						@else
							<div class="alert alert-warning" role="alert">
								Er zijn geen categorieen gevonden.
							</div>
						@endif

						{{-- Submit & reset form-group --}}
						<div class="form-group">
							<button class="btn btn-sm btn-success" type="submit">
								<span class="fa fa-check" aria-hidden="true"></span> Insturen
							</button>

							<button class="btn btn-sm btn-danger" type="reset">
								<span class="fa fa-undo" aria-hidden="true"></span> Reset formnulier
							</button>
						</div>
					</form> {{-- /Question form --}}
				</div>
			</div>
		</div> {{-- /Content section --}}

		<div class="col-sm-3"> {{-- Sidebar --}}
			<div class="well well-sm"> {{-- Search form --}}
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
			</div>  {{-- /Search form --}}

			<div class="panel panel-default"> {{-- Category box --}}
				<div class="panel-heading"><span class="fa fa-tags" aria-hidden="true"></span> Categories:</div>

				<div class="panel-body">
					@if ((int) count($categories) === 0)
						<small><i>(Er zijn geen categories gevonden)</i></small>
					@else
						@foreach ($categories as $category)
							<a href="{{ base_url() }}" class="label label-primary">
								{{ $category->category_name }}
							</a>
						@endforeach
					@endif
				</div>
			</div> {{-- /Category box --}}
 		</div> {{-- /Sidebar --}}
	</div> {{-- /Content --}}
@endsection
