{{-- Report reaction modal --}}
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="myModalLabel">Blokkeer een gebruiker.</h4>
            </div>

            <div class="modal-body form">
                <form action="{{ base_url('users/block') }}" id="form" method="POST" class="form-horizontal">
                    {{-- CSRF --}}
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">

                    <input type="hidden" value="" name="id"/>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                Gebruiker: {{-- <span class="text-danger">*</span> --}}
                            </label>

                            <div class="col-sm-10">
                                <input class="form-control" name="user" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                Reden: <span class="text-danger">*</span>
                            </label>

                            <div class="col-sm-10">
                                <textarea name="reason" rows="8" class="form-control" placeholder="Reden tot blokkering"></textarea>
                            </div>
                        </div>

                        {{-- Submit and reset group  --}}
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-check" aria-hidden="true"></span> Blokkeer</button>
                                <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="fa fa-close" aria-hidden="true"></span> Annuleer</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>

        </div>{{-- /.modal-content --}}
    </div>{{-- /.modal-dialog --}}
</div>{{-- /.modal --}}
<!-- /Report reaction modal -->
