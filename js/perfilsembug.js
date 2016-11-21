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
    $("#escolherimg").hide("fast");
    $("#temCerteza").show("fast");

});

$("#editarNao").click(function(){

    $("#escolherimg").show("fast");
    $("#temCerteza").hide("fast");
    $("#preview").hide("fast");
    $("#imgusuario").show("fast");
     $('#fileupload').val('');

});

$("#editarSim").click(function(event){


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

                    $("#caixaUsuario").load("perfil/areaLogin.php");
                    $("#imgUser").load("perfil/imgUsuario.php");
					$("#escolherimg").show("fast");
                    $('#fileupload').val('');
					$("#temCerteza").hide("fast");
					$("#preview").hide("fast");
					$("#imgusuario").show("fast");

                }
            });
        }
    });
	
});

$("#editarDados").click(function(){
		
	$("#editDados").show("fast");
	$("#usuarioDados").hide("fast");
    $("#editEndereco").hide("fast");
    $("#editSenha").hide("fast");
	$("#editDadosUsuario").load("perfil/formEditDados.php");
});

$("#editarEndereco").click(function(){
		
	$("#editEndereco").show("fast");
	$("#usuarioDados").hide("fast");
    $("#editDados").hide("fast");
    $("#editSenha").hide("fast");
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
    $("#editDados").hide("fast");
    $("#editEndereco").hide("fast");
	$("#editarUserSenha").load("perfil/editarSenha.php");

});

$("#cancelarSenha").click(function(){
		
	$("#editSenha").hide("fast");
	$("#usuarioDados").show("fast");

});

});


