$(function(){

$("#infdadosusuario").load("perfil/infDadosUsuario.php");
$("#infenderecousuario").load("perfil/infEnderecoUsuario.php");
$("#imgUser").load("perfil/imgUsuario.php")

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

    }
}



$("#fileupload").change(function(){

	$("#preview").show("fast");
	$("#imgusuario").hide("fast");
    readURL(this);
    $("#fileupload").hide("fast");
    $("#temCerteza").show("fast");

});

$("#editarNao").click(function(){

    $("#fileupload").show("fast");
    $("#temCerteza").hide("fast");
    $("#preview").hide("fast");
    $("#imgusuario").show("fast");

});

$("#editarSim").click(function(event){

    $("#fileupload").show("fast");
    $("#temCerteza").hide("fast");
    $("#preview").hide("fast");
    $("#imgusuario").show("fast");

    var data = new FormData();
    data.append('fileupload', $('#fileupload')[0].files[0]);

     $.ajax({
        url: 'crud/save.php',
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(dataReturn) {
             $.ajax({
                type:'post',
                url:'crud/perfil.php',
                data: {img: dataReturn},
                dataType:'html',
     
                success : function(txt){
                    
                    $("#imgUser").load("perfil/imgUsuario.php");

                }
            });
        }
    });

});




$("#editarDados").click(function(){
		
	$("#editDados").show("fast");
	$("#usuarioDados").hide("fast");
	$("#editDadosUsuario").load("perfil/formEditDados.php");
});

$("#editarEndereco").click(function(){
		
	$("#editEndereco").show("fast");
	$("#usuarioDados").hide("fast");
	$("#editEnderecoUsuario").load("perfil/formEditEndereco.php");
});

$("#cancelarDados").click(function(){
		
	$("#editDados").hide("fast");
	$("#editEndereco").hide("fast");
	$("#usuarioDados").show("fast");

});

$("#cancelarEndereco").click(function(){
		
	$("#editEndereco").hide("fast");
	$("#usuarioDados").show("fast");

});

$("#editarSenha").click(function(){
		
	$("#editSenha").show("fast");
	$("#usuarioDados").hide("fast");
	$("#editarUserSenha").load("perfil/editarSenha.php");

});

$("#cancelarSenha").click(function(){
		
	$("#editSenha").hide("fast");
	$("#usuarioDados").show("fast");

});

});


