<div class="modal fade" id="modalStatus" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enviar Contrato</h5>
                <button type="button" class="close">
                    <span data-dismiss="modal" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">


                    <div class="col-md-12  mb-5">

                        <div class="form-group">

                            <label for="">Estado</label>
                            <br>
                            <select class="form-control" name="status" id="status">
                                <option value="0">Seleccione estado</option>
                                <option class="form-control" value="signcontract">Contrato enviado para firmar</option>
                                <option value="doesNotQualify">No califica</option>
                            </select>

                        </div>
                    </div>
                            <input style="width:10rem;" type="text" id="id_status" class="from-control">

                       
               

                <div class="modal-footer">

                    <button type="button" id="send-data-status" class="btn btn-info"> Enviar</button>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>