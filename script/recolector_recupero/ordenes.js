$(document).ready(function(){ //esto contiene el documento
$('#table1').hide(); //lo escondemos cuando inicia 

$('#task-form').submit(function(e){

var id_reco = $('#id_recoleorden').val()

    const postData = {
        id_recoleorden: $('#id_recoleorden').val(),
        fecha_orden: $('#fecha_orden').val()
    };
    $.post('../../model/recolector_recupero/generar-orden.php' , postData, function(response){
        fetchTasks(id_reco); //ejecuta la funcion fetchTasks

//$('#task-form').trigger('reset'); este limpia lo que hay en el form
    });
    e.preventDefault(); //bloquea el recargar
    
});

function fetchTasks(id_reco){

    $.ajax({
        url: '../../model/recolector_recupero/mostrar-orden.php',
        type: 'GET',
        data:{id_reco},
        success: function (response){
            //console.log(response); imprimir lo que tengo 
        let tasks= JSON.parse(response); 
        let template = '';
        tasks.forEach(task => {
            template += `
            <tr>
                <th>${task.id}</th>
                
            </tr>
            `
        });
        $('#tasks').html(template);
        $('#table1').show(); //lo mostramos cuando hacemos click
    
        }
    });

}
});