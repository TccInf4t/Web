
//função que verifica se usuário existe.Caso sim, retorna 1,caso não,0
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

//Função que garante que string só tenha números
function sonumero(element){

	var txt = $(element).val().trim();
	txt2 = txt.charAt(txt.length-1);

	if(isNaN(parseFloat(txt))){

		txt = txt.replace(txt2, "");
		$(element).val(txt);

	}

}

//Função que garante que não tenha caracteres especiais na string
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