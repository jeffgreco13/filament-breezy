<?php

return [
    "login" => [
        "forgot_password_link" => "Esqueceu a senha?",
        "create_an_account" => "Criar a sua conta",
    ],
    "registration" => [
        "title" => "Registrar",
        "heading" => "Criar uma conta",
        "submit" => [
            "label" => "Inscrever-se",
        ],
        "notification_unique" =>
            "Já existe uma conta com este e-mail. Por favor, verifique.",
    ],
    "reset_password" => [
        "title" => "Esqueceu a senha",
        "heading" => "Redefinir sua senha",
        "submit" => [
            "label" => "Enviar",
        ],
        "notification_error" => "Erro: Por favor, tente novamente mais tarde.",
        "notification_error_link_text"=>"Try Again",
        "notification_success" => "Verifique sua caixa de entrada para instruções!",
    ],
    "verification" => [
        "title" => "Verificar e-mail",
        "heading" => "Verificação de e-mail requerida",
        "submit" => [
            "label" => "Sair",
        ],
        "notification_success" => "Verifique sua caixa de entrada para instruções!",
        "notification_resend" => "O e-mail de verificação foi reenviado.",
        "before_proceeding" =>
            "Antes de prosseguir, por favor, procure no seu e-mail o link de verificação.",
        "not_receive" => "Se você não recebeu o e-mail,",
        "request_another" => "clique aqui para solicitar reenvio.",
    ],
    "profile" => [
        "account" => "Conta",
        "profile" => "Perfil",
        "my_profile" => "Meu Perfil",
        "personal_info" => [
            "heading" => "Informações pessoais",
            "subheading" => "Gerencie suas informações pessoais.",
            "submit" => [
                "label" => "Atualizar",
            ],
            "notify" => "Perfil atualizado com sucesso!",
        ],
        "password" => [
            "heading" => "Senha",
            "subheading" => "Deve conter 8 caracteres.",
            "submit" => [
                "label" => "Atualizar",
            ],
            "notify" => "Senha alterada com sucesso!",
        ],
    ],
    "sanctum" => [
        "title" => "Tokens API",
        "description" =>
            "Gerencie tokens de API para permitir serviços de terceiros acessar este aplicativo em seu nome. NOTA: seu token é mostrado uma vez após a criação. Se você perder seu token, será necessário excluí-lo e criar um novo.",
        "create" => [
            "notify" => "Token criado com sucesso!",
            "submit" => [
                "label" => "Criar",
            ],
        ],
        "update" => [
            "notify" => "Token atualizado com sucesso!",
        ],
    ],
    "fields" => [
        "email" => "E-mail",
        "login" => "Usuário",
        "name" => "Nome",
        "password" => "Senha",
        "password_confirm" => "Confirme a senha",
        "new_password" => "Nova senha",
        "new_password_confirmation" => "Confirme a senha",
        "token_name" => "Nome do Token",
        "abilities" => "Permissões",
    ],
    "or" => "Ou",
];
