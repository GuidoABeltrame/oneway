$(function(){

	/* sending the mail */
	$('#buttonForm').click(function(e){

		//alert('Hola');
		e.preventDefault();
		var url = $('#sendForm').attr('action');
		console.log(url);
		$.ajax({
			type:  'POST', //método de envio
            url:   url, //archivo que recibe la peticion
            data:  $('#sendForm').serialize(),
            beforeSend: function () {
                //$("#resultado").html("Procesando, espere por favor...");
                console.log('cargando');
            },
            success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            	var myData = JSON.parse(data); 
            	/**/
            	if(myData['type'] == "success"){
	            	$('#message').html('<div class="text-center py-5 px-2"><h1 class="display-3 text-uppercase pt-5"><b><span class="condensed">Tu cotización</span><br><span class="light">va en camino.</span></b></h1><h1 class="white condensed display-4 text-uppercase">¡O si preferis<br>llámanos!</h1><h1 class="light gray">(5411) 4793 111111</h1></div>');
	            	$('#message_1').html('<div class="text-center py-5 px-2"><h1 class="display-3 text-uppercase pt-5"><b><span class="condensed">Tu cotización</span><br><span class="light">va en camino.</span></b></h1><h1 class="white condensed display-4 text-uppercase">¡O si preferis<br>llámanos!</h1><h1 class="light gray">(5411) 4793 111111</h1></div>')
	            }else{
	            	alert(myData['text']);
	            }
            }
    	});
		
	});

	/* Input Range */
	$(document).on('input','.range',function(){
		var mts = $(this).val();
		$('.mts').html(mts);
		$('.range').val(mts);
	})

})