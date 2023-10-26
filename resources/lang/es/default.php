<?php

return [
    "login" => [
        "username_or_email" => "Nombre de usuario o correo electrónico",
        "forgot_password_link" => "¿Olvidó su contraseña?",
        "create_an_account" => "Crear una cuenta",
    ],
    "password_confirm" => [
        "heading" => "Confirmación de contraseña",
        "description" => "Confirme su contraseña para completar esta acción.",
        "current_password" => "Contraseña actual"
    ],
    "two_factor" => [
        "heading" => "Autenticación de dos factores",
        "description" => "Teclee el código de autentificación proporcionado por su aplicación de autentificación para confirmar el acceso a su cuenta.",
        "code_placeholder" => "XXX-XXX",
        "recovery" => [
            "heading" => "Autentificación de dos factores",
            "description" => "Teclee uno de sus códigos de recuperación de emergencia para confirmar el acceso a su cuenta.",
        ],
        "recovery_code_placeholder" => "abcdef-98765",
        "recovery_code_text" => "¿Perdió su dispositivo?",
        "recovery_code_link" => "Utilice un código de recuperación",
        "back_to_login_link" => "Regresar a la página de acceso"
    ],
    "registration" => [
        "title" => "Registro",
        "heading" => "Creación de cuenta",
        "submit" => [
            "label" => "Registrarse",
        ],
        "notification_unique" => "Ya existe una cuenta asociada a este correo electrónico. Favor de acceder.",
    ],
    "reset_password" => [
        "title" => "Recuperación de contraseña",
        "heading" => "Creación de una nueva contraseña",
        "submit" => [
            "label" => "Enviar",
        ],
        "notification_error" => "Error: intente de nuevo más tarde.",
        "notification_error_link_text"=>"Try Again",
        "notification_success" => "Se ha enviado un correo, abra el mensaje para seguir las instrucciones.",
    ],
    "verification" => [
        "title" => "Verificación de correo electrónico",
        "heading" => "Debe verificar su cuenta de correo electrónico",
        "submit" => [
            "label" => "Cerrar sesión",
        ],
        "notification_success" => "Se ha enviado un correo, abra el mensaje para seguir las instrucciones.",
        "notification_resend" => "Se ha reenviado el correo con las instrucciones.",
        "before_proceeding" => "Antes de continuar, verifique el correo que se le ha enviado y haga clic sobre el enlace de activación.",
        "not_receive" => "Si no ha recibido el mensaje de correo electrónico,",
        "request_another" => "Haga clic aquí para solicitar otro",
    ],
    "profile" => [
        "account" => "Cuenta",
        "profile" => "Perfil",
        "subheading" => "Desde aquí puede gestionar su perfil de usuario.",
        "my_profile" => "Mi perfil",
        "personal_info" => [
            "heading" => "Información personal",
            "subheading" => "Administrar su información personal.",
            "submit" => [
                "label" => "Actualizar",
            ],
            "notify" => "¡Perfil actualizado exitosamente!",
        ],
        "password" => [
            "heading" => "Contraseña",
            "subheading" => "Debe contener al menos 8 caracteres.",
            "submit" => [
                "label" => "Modificar",
            ],
            "notify" => "¡Contraseña actualizada exitosamente!",
        ],
        "2fa" => [
            "title" => "Autentificación de dos factores",
            "description" => "Administre el acceso a su cuenta por autentificación de dos factores (recomendado).",
            "actions" => [
                "enable" => "Habilitar",
                "regenerate_codes"=>"Regenerar los códigos de recuperación",
                "disable"=>"Deshabilitar",
                "confirm_finish" => "Confirmar y terminar",
                "cancel_setup" => "Cancelar la configuración"
            ],
            "setup_key" => "Llave de configuración",
            "must_enable" => "Debe habilitar la autenticación de dos factores para usar esta aplicación.",
            "not_enabled" => [
                "title" => "Usted no ha habilitado la autentificación de dos factores.",
                "description"=>"Cuando la autentificación de dos factores se encuentra habilitada, se le pedirá un código aleatorio durante la autentificación. Usted puede obtener dicho código desde la aplicación Autenticador de Google en su celular."
            ],
            "finish_enabling" => [
                "title"=>"Terminar la habilitación de la autentificación de dos factores.",
                "description" => "Para terminar de habilitar la autentificación de dos factores, escanee el siguiente código QR utilizando la aplicación autenticadora de su teléfono (por ejemplo, el Autenticador de Google) o teclee la llave de configuración e indique el código OTP generado."
            ],
            "enabled"=>[
                "notify" => "Autenticación de dos factores habilitada.",
                "title"=>"¡Usted ha habilitado la autentificación de dos factores!",
                "description"=>"Se ha habilitado la autentificación de dos factores. Escanee el siguiente código QR mediante la aplicación autenticadora de su celular (por ejemplo, el Autenticador de Google) o teclee la llave de configuración.",
                "store_codes"=>"Guarde estos códigos de recuperación en un administrador de contraseñas seguro. Pueden ser utilizadas para la recuperación del acceso a su cuenta en caso de que el dispositivo asociado a su autentificación de dos factores se pierda.",
                "show_codes"=>'Mostrar los códigos de recuperación',
                "hide_codes" => 'Esconder los códigos de recuperación'
            ],
            "disabling" => [
                "notify" => "La autenticación de dos factores ha sido deshabilitada."
            ],
            "confirmation" => [
                "success_notification" => 'El código ha sido verificado. La autentificación de dos factores se ha habilitado.',
                "invalid_code" => "El código tecleado no es válido."
            ]
        ],
        "sanctum" => [
            "title" => "Tokens de API",
            "description" => "Administre los API tokens que permiten el acceso a esta aplicación a terceros en su nombre. NOTA: su token es mostrado por única vez después de su creación. Si usted pierde su token, deberá borrarlo y crear uno nuevo.",
            "create" => [
                "notify" => "¡Token creado exitosamente!",
                "message" => "Su token solo se muestra una vez después de la creación. Si pierde su token, deberá eliminarlo y crear uno nuevo.",
                "submit" => [
                    "label" => "Nuevo",
                ],
            ],
            "update" => [
                "notify" => "¡Token actualizado exitosamente!",
            ],
            "copied" => [
                "label" => "Copié mi ficha",
            ]
        ],
    ],
    "clipboard" => [
        "link" => "Copiar al portapapeles",
        "tooltip" => "¡Copiado!",
    ],
    "fields" => [
        "avatar" => "Avatar",
        "email" => "Correo electrónico",
        "login" => "Usuario",
        "name" => "Nombre",
        "password" => "Contraseña",
        "password_confirm" => "Confirmar la contraseña",
        "new_password" => "Nueva contraseña",
        "new_password_confirmation" => "Confirme la nueva contraseña",
        "token_name" => "Nombre del token",
        "token_expiry" => "Caducidad del token",
        "abilities" => "Capacidades",
        "2fa_code" => "Código",
        "2fa_recovery_code" => "Código de recuperación"
    ],
    "or" => "o",
    "cancel" => "Cancelar"
];
