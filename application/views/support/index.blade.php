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
                    <div class="page-header" style="margin-top: -20px;">
                        <div class="btn-toolbar pull-right"><div class="btn-group">
                            <a href="" class="btn btn-default btn-sm"><span aria-hidden="true" class="fa fa-plus"></span> New thread </a>
                        </div>
                    </div>

                    <h2>Support Questions</h2></div>
                </div>
            </div>
        </div> {{-- /Content --}}

        <div class="col-sm-3"> {{-- Sidebar --}}
            <div class="well well-sm">
                <form method="get" action=""> {{-- Search form --}}
                    <div class="input-group">
                        <input type="text" name="term" placeholder="Search" class="form-control">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-danger"><span aria-hidden="true" class="fa fa-search"></span></button>
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
