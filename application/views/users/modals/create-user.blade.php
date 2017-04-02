{{-- Create user modal --}}
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"> {{-- Modal content --}}
            <div class="modal-header"> {{-- Modal header --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="myModalLabel">Creer een gebruiker.</h4>
            </div> {{-- /Modal header --}}

            <div class="modal-body form"> {{-- Content body --}}
                <form class="form-horizontal" action="{{ base_url('auth/store') }}" method="post"> {{-- Create user form --}}
                    {{-- CSRF Input && Hidden inputss --}}
                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">
                    <input type="hidden" value="password12345!" name="password">                {{-- Password field. --}}
                    <input type="hidden" value="password12345!" name="password_confirmation">   {{-- Password confirmation field. --}}

                    {{-- Info: notice --}}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="alert alert-info" role="alert">
                                <strong>Info:</strong> The user his password will be default to 'password12345!'.
                            </div>
                        </div>
                    </div>

                    {{-- Name form-group --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Naam: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="Naam">
                        </div>
                    </div>

                    {{-- Username form-group --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Nickname: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" placeholder="Account naam.">
                        </div>
                    </div>

                    {{-- Email form-group --}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            E-mail: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Email adres">
                        </div>
                    </div>

                    {{-- Submit and reset form group --}}
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">
                                <span class="fa fa-check" aria-hidden="true"></span> Aanmaken
                            </button>

                            <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">
                                <span class="fa fa-undo" aria-hidden="true"></span> Annuleer
                            </button>
                        </div>
                    </div>
                </form> {{-- /Create user form --}}
            </div> {{-- /Content body --}}
        </div> {{-- /Modal content --}}
    </div>
</div>
{{-- /Create user modal --}}
