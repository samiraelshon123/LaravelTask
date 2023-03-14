<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{__('custom.keywordHead')}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                {{__('custom.keywordMassage')}}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form id="deleteFormAction"  method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" >{{__('custom.delete')}}</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{__('custom.close')}}</button>
                </form>
            </div>

        </div>
    </div>
</div>
