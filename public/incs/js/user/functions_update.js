$(document).ready(function() {
    $('form[name=form-user]').bootstrapValidator({
        //message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            inputname: {
                validators: {
                    notEmpty: {
                        message: 'Por favor preencha este campo'
                    }
                }
            },

            inputmail: {
                validators: {
                    notEmpty: {
                        message: 'Por favor preencha este campo'
                    },
                    emailAddress: {
                        message: 'Endereço de e-mail inválido'
                    }
                }
            },
             inputpass: {
                validators: {
                    // identical: {
                    //     field: 'inputconfirmpass',
                    //     message: 'The password and its confirm are not the same'
                    // }
                }
            },
            inputconfirmpass: {
                validators: {
                    identical: {
                        field: 'inputpass',
                        message: 'Senhas não batem'
                    }
                }
            }

        } //fim fields
    });
});