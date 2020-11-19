<div class="modal fade" id="modalAlta" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alta recolector</h5>
                <button type="button" class="close">
                    <span data-dismiss="modal" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="d-flex flex-column bd-highlight mb-3 > ">

                        <label for="">Nombre Recolector</label>
                        <input type="text" id="nombre_recolector" class="from-group ">

                    </div>
                    <div class="d-flex flex-column bd-highlight mb-3>">

                        <label for="">Correo Recolector</label>
                        <input type="text" id="correo_recolector" class="from-control">
                        <input type="hidden" id="id_recolector" class="from-control">

                    </div>
                    <div class="d-flex flex-column bd-highlight mb-3>">

                        <label for="">Tipo</label>
                        <select name="tipo" id="tipo">
                            <option value="0">Seleccion tipo</option>
                            <option value="recolector">RECOLECTOR</option>
                            <option value="operador">OPERADOR</option>
                            <option value="comercio">COMERCIO</option>
                            <option value="admin">ADMIN</option>
                        </select>

                    </div>
                    <div class="d-flex flex-column bd-highlight mb-3>">

                        <label for="">ALTA/BAJA</label>
                        <select name="status_reco" id="status_reco">
                            <option value="0">Seleccion Estado</option>
                            <option value="active">ALTA PARA NUEVOS RECOLECTORES/COMERCIOS/CALL</option>
                            <option value="down">BAJA</option>
                            <option value="activeExist">ALTA PARA RECOLECTORES/COMERCIOS/CALL DADOS DE BAJA</option>
                        </select>

                    </div>

                    <div class="d-flex flex-column bd-highlight mb-3>">

                        <label for="">id</label>
                        <input type="text" id="id_ingreso" class="from-control">

                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" id="send-data-alta" class="btn btn-info"> Guardar</button>

                </div>
            </div>
        </div>
    </div>
</div>