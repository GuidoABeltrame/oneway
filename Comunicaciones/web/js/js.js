$(function(){
	$('.center').slick({
		centerMode: true,
		centerPadding: '180px',
		slidesToShow: 5,
		adaptiveHeight: false,
		autoplay: true,
		arrows: false,
		responsive: [{
			breakpoint: 2600,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '180px',
				slidesToShow: 5,
				adaptiveHeight: false,
			}
		},{
			breakpoint: 1400,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '180px',
				slidesToShow: 5,
				adaptiveHeight: false,
			}
		},{
			breakpoint: 480,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '70px',
				slidesToShow: 1,
				adaptiveHeight: true,
			}
		}]
	});

	/*var scroll = new SmoothScroll('.nav-item a[href*="#"]',{
		header: '.navbar'
	});*/

	/* sending the mail */
	$('#buttonForm').click(function(e){

		e.preventDefault();
		var url = $('#sendForm').attr('action');
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
            	/*alert(myData['text']);*/
            	if( myData['type'] == "success" ){
            		$('#message').html('<div class="text-center py-5 px-2"><h1 class="display-3 text-uppercase pt-5"><b><span class="condensed">Tu cotización</span><br><span class="light">va en camino.</span></b></h1><h1 class="white condensed display-4 text-uppercase">¡O si preferis<br>llámanos!</h1><h1 class="light gray">(5411) 4793 111111</h1></div>')
            		$('#message_1').html('<div class="text-center py-5 px-2"><h1 class="display-3 text-uppercase pt-5"><b><span class="condensed">Tu cotización</span><br><span class="light">va en camino.</span></b></h1><h1 class="white condensed display-4 text-uppercase">¡O si preferis<br>llámanos!</h1><h1 class="light gray">(5411) 4793 111111</h1></div>')
            	}else{
            		alert(myData['text']);
            	}
            }
    	});
		
	})

})