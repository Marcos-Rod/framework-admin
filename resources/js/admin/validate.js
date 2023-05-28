$().ready(function () {

    $('#login').validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 40
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            password: {
                required: "Escriba una contrase&ntilde;a",
                minlength: "Debes escribir correctamente tu contraseña (m&iacute;nimo 8 car&aacute;cteres)",
                maxlength: "Debes escribir correctamente tu contraseña (m&iacute;nimo 8 car&aacute;cteres)"
            },
            email: {
                required: "Escriba su correo",
                email: "Escriba un correo v&aacute;lido"
            }
        }
    });
    
    $('#frm-ejecutivos').validate({
        rules: {
            nombre: {
                required: true,
                minlength: 4
            },
            correo: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            nombre: {
                required: "Escribe el nombre del ejecutivo",
                minlength: "Escribe el nombre completo"
            },
            correo: {
                required: "La descripci&oacute;n es obligatioria",
                minlength: "Debe ser m&aacute;s espec&iacute;fico"
            }
        }
    });
    
    $('#form-post').validate({
        rules: {
            name: {
                required: true,
                minlength: 4
            },
            description: {
                required: true,
                minlength: 10
            },
            file: {
                accept: "image/jpeg, image/png, image/jpg, image/gif",
                maxsize: '614400'
            }
        },
        messages: {
            name: {
                required: "Escriba el titulo del post",
                minlength: "Escriba un titulo m&aacute;s descriptivo"
            },
            description: {
                required: "La descripci&oacute;n es obligatioria",
                minlength: "Debe ser m&aacute;s espec&iacute;fico"
            },
            file: {
                accept: "Solo se aceptan archivos gif, jpeg, jpg, png",
                maxsize: "El archivo no puede pesar m&aacute;s de 600 KB"
            }
        }
    });
    
    $('#frm-tags').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            slug: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Escriba el nombre de la etiqueta",
                minlength: "Escriba un titulo m&aacute;s largo"
            },
            slug: {
                required: "El slug es obligatorio"
            }
        }
    });

    $('#form-eventos').validate({
        rules: {
            date: {
                required: true,
                date: true
            },
            start: {
                required: {
                    depends: function(element){
                        if ($('#allDay').is(':checked')){
                            return false;
                        } else {
                            return true;
                        }
                    },
                },
                time: true
            },
            end: {
                required: {
                    depends: function(element){
                        if ($('#allDay').is(':checked')){
                            return false;
                        } else {
                            return true;
                        }
                    },
                },
                
                time: true
            }
        },
        messages: {
            date: {
                required: "Escriba la fecha del evento",
                date: "La fecha no es v&aacute;lida"
            },
            start: {
                required: "Escriba la hora de inicio del evento",
                time: "La hora de inicio no es v&aacute;lida"
                },
            end: {
                required: "Escriba la hora de fin del evento",
                time: "La hora de fin no es v&aacute;lida"
            }
        }
    });

});