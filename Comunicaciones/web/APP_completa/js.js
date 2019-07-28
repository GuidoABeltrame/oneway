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

	var scroll = new SmoothScroll('.nav-item a[href*="#"]',{
		header: '.navbar'
	});

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
            	alert(myData['text']);
            }
    });
		/*var checks = 
		$('#sendForm input:checked').each(function() {
			console.log(this.val);
	        //values.push(this.val);
	    });
		$('#DynamicValueAssignedHere').find('input[name="FirstName"]').val();
		var name = forma.find('input[name="name"]').val(),
			last = forma.find('input[name="last"]').val(), 
			tel = forma.find('input[name="tel"]').val(),
			mail = forma.find('input[name="mail"]').val(),
			check = forma.find('input[name="inputCheck"]');

		var myCheckboxes = new Array();
		check.each(function() {
		   data['myCheckboxes[]'].push($(this).val());
		});
		//var checkboxes = check.is(':checked').val();
		console.log( 'input -' + myCheckboxes );*/
	})
	/**/

})