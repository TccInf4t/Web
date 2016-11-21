$(function(){


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


$("#senhaAtual").blur(function(){

	isempt("#senhaAtual");
	islenght("#senhaAtual",8);

});

$("#resenhaAtual").bind('input propertychange', function(){

	isequal("#resenhaAtual","#senhaAtual");

	semespeciais("#resenhaAtual");

});

$("#senhaAtual").bind('input propertychange', function(){

	islenght("#senhaAtual",8);

	isequal("#resenhaAtual","#senhaAtual");

	semespeciais("#senhaAtual");

	
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



$("#senhaSalvar").click(function(){

	cont = 0;

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


					cont+=isempt("#senhaAtual");
					cont+=islenght("#senhaAtual",8);
					cont+=isempt("#resenhaAtual");
					cont+=isequal("#resenhaAtual","#senhaAtual");

                    if(cont == 0){

						$("#formEditarSenha").submit();

					}

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
			$("#caixaUsuario").load("perfil/areaLogin.php");
		}
	});
					
	return false;	
});

jQuery('#formEditarSenha').submit(function(){
	var dados = jQuery( this ).serialize();

	jQuery.ajax({
		type: "POST",
		url: "crud/perfil.php",
		data: dados,
		success: function( data )
		{				  
		    $("#editSenha").hide("fast");
			$("#usuarioDados").show("fast");
		}
	});
					
	return false;	
});

$(function(){
	$("#cbEstado").change(function(){
		var id = $(this).val();

		$.get("cidades.php", {id: id}, function(dados){
			$("#cbCidade").html(dados);
		});
	});

});

$(function(){
		var id = $("#cbEstado").val();

		$.get("cidades.php", {id: id}, function(dados){
			$("#cbCidade").html(dados);
		});
});


$("#salvarEnd").click(function(){

	cont = 0;

	cont+=isempt("#logradouro");
	cont+=isempt("#numero");
	cont+=isempt("#cep");
	cont+=islenght("#cep",8);
	cont+=isempt("#bairro");

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
                    	
						$("#formeditendereco").submit();

					}

            }

        },
    });

});

jQuery('#formeditendereco').submit(function(){
	var dados = jQuery( this ).serialize();

	jQuery.ajax({
		type: "POST",
		url: "crud/perfil.php",
		data: dados,
		success: function( data )
		{				  

			$("#editEndereco").hide("fast");
			$("#usuarioDados").show("fast");
			$("#infenderecousuario").load("perfil/infEnderecoUsuario.php");

		}
	});
					
	return false;	
});

});


