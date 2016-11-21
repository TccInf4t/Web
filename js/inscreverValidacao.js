////Javascript que irá validar os campos de inscrição
$(function(){


$("#nome").blur(function(){

	isempt("#nome");

});

$("#cep").blur(function(){

	isempt("#logradouro");
	islenght("#cep",9);

});

$("#numero").blur(function(){

	isempt("#numero");

});

$("#logradouro").blur(function(){

	isempt("#logradouro");

});

$("#bairro").blur(function(){

	isempt("#bairro");

});

$("#senha").blur(function(){

	isempt("#senha");
	islenght("#senha",8);

});

$("#email").blur(function(event){


	event.preventDefault();
                   
    $.ajax({
        url : 'crud/login.php',//url para acessar o arquivo
        data: {
         lemail : $("#email").val()
        },//parametros para a funcao
        type : 'post',//PROTOCOLO DE ENVIO PODE SER GET/POST
        dataType : 'json',//TIPO DO RETORNO JSON/TEXTO 
        success : function(data){//DATA É O VALOR RETORNADO
           if(usuarioexiste("#email",data.valor) == 0){

             isempt("#email");

           }else{

             usuarioexiste("#email",data.valor);

           }  

        },
    });

});

$("#resenha").blur(function(){

	isempt("#senha");

	isequal("#resenha","#senha");

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

$("#resenha").bind('input propertychange', function(){

	isequal("#resenha","#senha");

	semespeciais("#resenha");

});

$("#numero").bind('input propertychange', function(){

	sonumero("#numero");

});

$("#nome").bind('input propertychange', function(){

	soletras("#nome");

});

$("#logradouro").bind('input propertychange', function(){

	semespeciais("#logradouro");

});

$("#bairro").bind('input propertychange', function(){

	semespeciais("#bairro");

});

$("#complemento").bind('input propertychange', function(){

	semespeciais("#complemento");

});

$("#email").bind('input propertychange', function(){

	paraemail("#email");

});


$("#senha").bind('input propertychange', function(){

	islenght("#senha",8);

	isequal("#resenha","#senha");

	semespeciais("#senha");

	
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


$("#prosseguir").click(function(event){

	cont = 0;

	cont+=isempt("#nome");
	cont+=isempt("#senha");
	cont+=islenght("#senha",8);
	cont+=isempt("#resenha");
	cont+=isequal("#resenha","#senha");

	if($("#cpfc:checked").val() == 1){
							
		cont+=isempt("#cpf");
		cont+=islenght("#cpf",14);
					
	}else{
					
		cont+=isempt("#cnpj");
		ont+=islenght("#cnpj",18);
					
	}

	cont+=isempt("#data");	
	cont+=islenght("#data",10);	


	event.preventDefault();
    $.ajax({
        url : 'crud/login.php',//url para acessar o arquivo
        data: {
        lemail : $("#email").val()
        },//parametros para a funcao
        type : 'get',//PROTOCOLO DE ENVIO PODE SER GET/POST
        dataType : 'json',//TIPO DO RETORNO JSON/TEXTO 
        success : function(data){//DATA É O VALOR RETORNADO
            if(usuarioexiste("#email",data.valor) == 1){

            	cont+=1;

            }else{

              	cont+=isempt("#email");
              	
              	if(cont == 0){


					$("#dadosbasicos").hide("fast");
					$("#endereco").show("fast");

				}

            }
        },
    });	
});

$("#salvar").click(function(){

	var cont=0;

	cont+=isempt("#logradouro");
	cont+=isempt("#numero");
	cont+=isempt("#cep");
	cont+=islenght("#cep",9);
	cont+=isempt("#bairro");

	if(cont == 0){
		$("#formInscrever").submit();
	}

});

});