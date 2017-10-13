<style>
    #myModal .modal-header{
        background: #222222;
        color: #FFFFFF !important;
    }
    #myModal .modal-footer{
        background: #e6e6e6;
        color: #FFFFFF !important;
    }
    .close-btn-model{
        color: #FFFFFF;
    }
</style>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times close-btn-model" aria-hidden="true"></i>
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    {{$title}}
                </h4>
            </div>
            <div class="modal-body">
                <form id="frmTasks" name="frmTasks" class="" novalidate="">
                    {{$form}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="row_id" name="row_id" value="0">
            </div>
        </div>
    </div>
</div>