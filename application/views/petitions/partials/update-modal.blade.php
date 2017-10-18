<div id="update" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update: petitie</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" action="{{ base_url('update/insert') }}" method="post">
                    {{-- TODO: Implement csrf token --}}
                    <input type="hidden" value="" name="id">

                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Titel: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" placeholder="Titel van de update">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Beschrijving: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <textarea name="description" rows="7" class="form-control" placeholder="Update beschrijving"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-sm btn-success">
                                <span class="fa fa-check" aria-hidden="true"></span> Invoegen
                            </button>

                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                <span class="fa fa-undo"></span> Sluiten
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
