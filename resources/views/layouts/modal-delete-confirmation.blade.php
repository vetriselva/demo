<div class="modal fade pullDown" id="delete-confirmation-modal" role="dialog" aria-labelledby="modalDeleteConfirm">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:50%; margin: auto;">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="modalDeleteConfirm">Confirm</h4>
            </div>
            <div class="modal-body modalMessage">
                  Are you sure to complete this operation?
            </div>
            <div class="modal-footer">
                <form method="POST" action="#" accept-charset="UTF-8">     
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success confirm" value="Confirm"/>
                </form>
            </div>
        </div>
    </div>    
</div> 
