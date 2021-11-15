$(document).ready(function(){
	var clase = document.getElementsByClassName("active-menu");
	if(typeof clase != 'undefined'){
		$(".active-menu").parent().addClass("activo").css("font-weight","100");
		$(".activo").children().eq(1).css("display","block");
	}
	$("body").append("<div id='previewSlideshow'><div id='imagen'><img width=700 height=350><div id='descripcion'></div><div id='cerrar'>Cerrar</div></div></div>");	

	$("#foto img").click(function(){
		var img = $(this).attr("alt");
		$("#previewSlideshow").fadeIn(100);
		$("#previewSlideshow img").attr("src", "../styles/images/"+img);

	});
	$("#previewSlideshow #cerrar").click(function(){
		$("#previewSlideshow").fadeOut(100);
	});
	$(".item").click(function(){
		$(".activo").children().eq(1).hide();
		$(".activo").removeClass("activo");
		$(this).children().eq(1).fadeIn();
		$(this).addClass("activo");
	});

	$('.icon-delete').click(function(){
		var id = $(this).attr("alt");
		$("#id_h").attr("value",id);
		$('#mensaje').fadeIn();
	});
	$('#mensaje #cerrar').click(function(){
		$('#mensaje').fadeOut();
	});


});

function valida(f){

		if(f.files.length==1){
			if(f.files[0].size<3145728){
			var ext=['gif','jpg','jpeg','png'];
			var v=f.value.split('.').pop().toLowerCase();
			for(var i=0,n;n=ext[i];i++){
				if(n.toLowerCase()==v)
					return
			}
			var t=f.cloneNode(true);
			t.value='';
			f.parentNode.replaceChild(t,f);
			alert('extensión no válida');
			}else{
				f.value="";
				alert('tamaño maximo es 3MB');
			}
		}else{
			f.value="";
			alert('seleccione solo un archivo');
		}
}
function valida_multiple(f){

	if(f.files[0].size<3145728){
	var ext=['gif','jpg','jpeg','png'];
	var v=f.value.split('.').pop().toLowerCase();
	for(var i=0,n;n=ext[i];i++){
		if(n.toLowerCase()==v)
			return
	}
	var t=f.cloneNode(true);
	t.value='';
	f.parentNode.replaceChild(t,f);
	alert('extensión no válida');
	}else{
		f.value="";
		alert('tamaño maximo es 3MB');
	}
}