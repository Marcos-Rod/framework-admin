$().ready(function () {

    $('#frm-contacto').validate({
        rules: {
            name: {
                required: true,
                minlength: 4,
            },
            phone: {
                required: true,
                phoneUS: true
            },
            email: {
                required: true,
                email: true
            },
            comments: {
                maxlength: 255,
            }
        },
        messages: {
            name: {
                required: "Debe escribir un nombre",
                minlength: "Escribe tu nombre completo",
            },
            phone: {
                required: "El teléfono es requerido",
                phoneUS: "Escriba un número de teléfono válido"
            },
            email: {
                required: "Escriba su correo",
                email: "Escriba un correo v&aacute;lido"
            },
            comments: {
                maxlength: "Debe ser mas breve"
            }
        }
    });

});