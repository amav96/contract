<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(0);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"../datos.php",
			data:"codigorecolectores=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#hide1").click(function(){
    $("#elementidentificacion").hide();
  });
  $("#show1").click(function(){
    $("#elementidentificacion").show();
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#hide3").click(function(){
    $("#elementpactar").hide();
  });
  $("#show3").click(function(){
    $("#elementpactar").show();
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide4").click(function(){
    $("#elementpactar4").hide();
  });
  $("#show4").click(function(){
    $("#elementpactar4").show();
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide5").click(function(){
    $("#elementpactar5").hide();
  });
  $("#show5").click(function(){
    $("#elementpactar5").show();
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#hide6").click(function(){
    $("#elementpactar6").hide();
  });
  $("#show6").click(function(){
    $("#elementpactar6").show();
  });
});
</script>