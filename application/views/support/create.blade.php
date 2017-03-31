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

						<div class="form-group">
							<label for="subject">Subject: <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="title" id="subject" placeholder="Subject">
						</div>
					</form> {{-- /Question form --}}
				</div>
			</div>
		</div> {{-- /Content section --}}

		<div class="col-sm-3"> {{-- Sidebar --}}
 		</div> {{-- /Sidebar --}}
	</div> {{-- /Content --}}
@endsection
