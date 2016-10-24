$(function(){


	function sonumero(element){

	var txt = $(element).val().trim();
	txt2 = txt.charAt(txt.length-1);

	if(isNaN(parseFloat(txt))){

		txt = txt.replace(txt2, "");
		$(element).val(txt);

	}

}

function semespeciais(element){

	var regex = '[^a-zA-Z0-9]+';
	var txt = $(element).val().trim();
	txt2 = txt.charAt(txt.length-1);

	 if(txt2.match(regex)) {
        
	 	txt = txt.replace(txt2, "");
		$(element).val(txt);

   	}

}

function paraemail(element){

	var regex = '[^a-zA-Z0-9@.]+';
	var txt = $(element).val().trim();
	txt2 = txt.charAt(txt.length-1);

	 if(txt2.match(regex)) {
        
	 	txt = txt.replace(txt2, "");
		$(element).val(txt);

   	}

}

function soletras(element){

	var regex = '[^a-zA-Z]+';
	var txt = $(element).val().trim();
	txt2 = txt.charAt(txt.length-1);

	 if(txt2.match(regex)) {
        
	 	txt = txt.replace(txt2, "");
		$(element).val(txt);

   	}

}

function isempt(element) {
  
	if($(element).val().trim() == ""){

		$(element).addClass("formTextError");
		$(element+"error").text("O campo está vazio!");
		$(element+"error").show("fast");

		return 1;

	}else{

		$(element).removeClass("formTextError");
		$(element+"error").hide("fast");

		return 0;

	}

}

function islenght(element,tamanho) {

	var txt = $(element).val().trim();
	txt = txt.replace("_", "");


	if(txt.length < tamanho){

		$(element).addClass("formTextError");
		$(element+"error").text("O campo tem que ter no mínimo "+tamanho+" caracteres!");
		$(element+"error").show("fast");
		return 1;

	}else{

		$(element).removeClass("formTextError");
		$(element+"error").hide("fast");
		return 0;

	}

}

function isequal(element,element2) {


	if($(element).val().trim() != $(element2).val().trim()){

			$(element).addClass("formTextError");
			$(element+"error").text("As senhas não correspondem!");
			$(element+"error").show("fast");
			return 1;
		}else{

			$(element).removeClass("formTextError");
			$(element+"error").hide("fast");
			return 0;

		}

}
$("#tcpf").css("display","block");
$("#tcnpj").css("display","none");


$("#cpfc").click(function(){
			
	$("#tcpf").show("fast");
	$("#tcnpj").hide("fast");
			
});
			
$("#cnpjc").click(function(){
			
	$("#tcpf").hide("fast");
	$("#tcnpj").show("fast");
			
});

function usuarioexiste(element,num){

	if(num == 1){

		$(element).addClass("formTextError");
		$(element+"error").text("Já existe um usuário com este email !");
		$(element+"error").show("fast");

		return 1;

	}else{

		$(element).removeClass("formTextError");
		$(element+"error").hide("fast");

		return 0;

	}

}

function senhacerta(element,num){

	if(num == 0){

		$(element).addClass("formTextError");
		$(element+"error").text("Senha Incorreta !");
		$(element+"error").show("fast");

		return 1;

	}else{

		$(element).removeClass("formTextError");
		$(element+"error").hide("fast");

		return 0;

	}

}

$("#nome").blur(function(){

	isempt("#nome");


});

$("#email").blur(function(event){

	event.preventDefault();
	$.ajax({
		url : 'crud/perfilSelect.php',
		data: {
	    
	    	lemail : $("#email").val()
	   
	   	},
	   
	   	type : 'post',
	   
	   	dataType : 'json',
	   
	   	success : function(data){
	      
	      	if(usuarioexiste("#email",data.valor) == 0){

	        	isempt("#email");

	      	}else{

	        	usuarioexiste("#email",data.valor);

	      	}  

	   	},
	});

});

$("#senha").blur(function(event){

	event.preventDefault();
    $.ajax({
    	url : 'crud/perfilSelect.php',
    	data: {
     		lsenha : $("#senha").val()
    	},
    	type : 'post',
    	dataType : 'json',
    	success : function(data){
       	senhacerta("#senha",data.valor);
    	},
    });

});

$("#cpf").blur(function(){

	isempt("#cpf");

	islenght("#cpf",14);

});

$("#cnpj").blur(function(){

	isempt("#cnpj");

	islenght("#cnpj",18);

});

$("#data").blur(function(){

	isempt("#data");

	islenght("#data",10);

});

$("#data").bind('input propertychange', function(){

	var dia = $("#data").val().substr(0, 2);
	var mes = $("#data").val().substr(3, 2);
	var ano = $("#data").val().substr(6, 10);

    if(mes > 12 ){
         $(this).val(dia+"12"+ano);
    }

    if(mes == 0){

    	$(this).val(dia+"01"+ano);

    }

    if(mes%2 != 0){

    	 if(dia > 31 ){
         	$(this).val("31"+mes+ano);
   		 }

   		  if(dia == 0){
         	$(this).val("01"+mes+ano);
   		 }

    }else{

    	if(mes != 2){

    		 if(dia > 30 ){
         		$(this).val("30"+mes+ano);
   			 }

   			 if(dia == 0){
         		$(this).val("01"+mes+ano);
   			 }

    	}else{

    		if(dia > 28 ){
         		$(this).val("28"+mes+ano);
   			 }

   			 if(dia == 0){
         	$(this).val("01"+mes+ano);
   		 }

    	}

    	

    }

});

$("#nome").bind('input propertychange', function(){

	soletras("#nome");

});


$("#email").bind('input propertychange', function(){

	paraemail("#email");

});

$("#salvar").click(function(){

	cont = 0;
	
	cont+=isempt("#nome");

	if($("#cpfc:checked").val() == 1){
					
					
		cont+=isempt("#cpf");
		cont+=islenght("#cpf",14);
					
	}else{
					
		cont+=isempt("#cnpj");
		cont+=islenght("#cnpj",18);				
	}

	cont+=isempt("#data");	
	cont+=islenght("#data",10);	

	event.preventDefault();
	$.ajax({
        url : 'crud/perfilSelect.php',//url para acessar o arquivo
        data: {
         lemail : $("#email").val()
        },//parametros para a funcao
        type : 'post',//PROTOCOLO DE ENVIO PODE SER GET/POST
        dataType : 'json',//TIPO DO RETORNO JSON/TEXTO 
        success : function(data){//DATA É O VALOR RETORNADO
            if(usuarioexiste("#email",data.valor) == 1){

              	cont++;
               
            }else{

              	cont+=isempt("#email");

              	event.preventDefault();
                    $.ajax({
                    url : 'crud/perfilSelect.php',//url para acessar o arquivo
                    data: {
                    	lsenha : $("#senha").val()
                    },//parametros para a funcao
                    type : 'post',//PROTOCOLO DE ENVIO PODE SER GET/POST
                    dataType : 'json',//TIPO DO RETORNO JSON/TEXTO 
                    success : function(data){//DATA É O VALOR RETORNADO
                       if(senhacerta("#senha",data.valor) == 1){

                       		cont++;

                       }else{

                       		if(cont == 0){

								$("#dadosbasicos").hide("fast");
								$("#endereco").show("fast");
								$("#formeditdados").submit();

							}

                       }

                    },
       			 });
              	
              }

            },
        });

});

jQuery('#formeditdados').submit(function(){
	var dados = jQuery( this ).serialize();

	jQuery.ajax({
		type: "POST",
		url: "crud/perfil.php",
		data: dados,
		success: function( data )
		{				  
		    $("#editDados").hide("fast");
			$("#usuarioDados").show("fast");
			$("#infdadosusuario").load("perfil/infDadosUsuario.php");
		}
	});
					
	return false;	
});


});


