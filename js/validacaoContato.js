$(document).ready( function() {
    $("#form").validate({
        // Define as regras
        rules: {
            txtNome: {
                required: true, minlength: 3
            },
            
            txtEmail: {
                required: true, email: true
            },
            
            txtArea: {
                required: true, minlength: 10
            },

            txtTelefone: {
                required: true
            }
        },
        // Define as mensagens de erro para cada regra
        messages: {
            txtNome: {
                required: "Digite o seu nome", minLength: "O seu nome deve conter, no mínimo, 2 caracteres"
            },

            txtEmail: {
                required: "Digite o seu email para contato", email: "Digite um email válido"
            },

            txtArea: {
                required: "Digite a sua mensagem", minLength: "A sua mensagem deve conter, no mínimo, 10 caracteres"
            },

            txtTelefone: {
                required: "Digite o seu telefone para contato"
            },
        }
    });
});