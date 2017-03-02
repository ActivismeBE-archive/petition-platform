{{-- Report reaction modal --}}
<div class="modal fade" id="report_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="myModalLabel">Rapporteer een reactie.</h4>
            </div>

            <div class="modal-body">
                <form action="{{  base_url('comments/report')  }}" id="form" method="POST" class="form-horizontal">
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">
                    <input type="hidden" value="" name="id"/> {{-- ID will be placed from AJAX request --}}


                    <div class="form-group">
                        <label for="reason" class="control-label col-sm-3">
                            Reden: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <select class="form-control" name="reason_id">
                                <option value="">-- selecteer reden --</option>

                                @foreach(Reasons::all() as $reason)
                                    <option value="{{ $reason->id }}"> {{ $reason->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label col-sm-3">
                            Verklaring: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" rows="7" placeholder="Verklaar waarom je dit wilt rapporteren."></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-sm btn-success">
                                 <span class="fa fa-check" aria-hidden="true"></span> Rapporteer
                            </button>

                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                <span class="fa fa-close" aria-hidden="true"></span> Sluiten
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>{{-- /.modal-content --}}
    </div>{{-- /.modal-dialog --}}
</div>{{-- /.modal --}}
<!-- /Report reaction modal -->
