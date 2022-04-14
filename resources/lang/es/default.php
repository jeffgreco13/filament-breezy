<?php

return [
    "login" => [
        "username_or_email" => "Identifiant ou E-mail",
        "forgot_password_link" => "¿Olvidó su contraseña?",
        "create_an_account" => "Crear una cuenta",
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
        "sanctum" => [
            "title" => "API Tokens",
            "description" => "Administre los API tokens que permiten el acceso a esta aplicación a terceros en su nombre. NOTA: su token es mostrado por única vez después de su creación. Si usted pierde su token, deberá borrarlo y crear uno nuevo.",
            "create" => [
                "notify" => "¡Token creado exitosamente!",
                "submit" => [
                    "label" => "Nuevo",
                ],
            ],
            "update" => [
                "notify" => "¡Token actualizado exitosamente!",
            ],
        ],
    ],
    "fields" => [
        "name" => "Nombre",
        "email" => "Correo electrónico",
        "password" => "Contraseña",
        "password_confirm" => "Confirmar contraseña",
        "new_password" => "Nueva contraseña",
        "new_password_confirmation" => "Confirme la nueva contraseña",
        "token_name" => "Nombre del token",
        "abilities" => "Capacidades",
    ],
    "or" => "O",
];
