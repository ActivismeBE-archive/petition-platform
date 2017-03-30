@layout()

@section('content')
	<div class="row"> {{-- Image --}}
	</div> {{-- /Image --}}

	<div class="row row-padding"> {{-- Content --}}
		<div class="col-sm-9"> {{-- Content section --}}
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header" style="margin-top: -20px;"> {{-- Page heading --}}
						<div class="btn-toolbar pull-right">
							<div class="btn-group">
								<a href="{{ base_url('support/create') }}" class="btn btn-default btn-sm">
									<span aria-hidden="true" class="fa fa-plus"></span> New thread
								</a>
							</div>
						</div>
					</div> {{-- /Page heading --}}

					{{-- Support question listing --}}
					{{-- /Support question listing. --}}
				</div>
			</div>
		</div> {{-- /Content section --}}

		<div class="col-sm-3"> {{-- Sidebar --}}
 		</div> {{-- /Sidebar --}}
	</div> {{-- /Content --}}
@endsection
