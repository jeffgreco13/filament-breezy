<?php

return [
    'password_confirm' => [
        'heading' => 'Confirmar palavra-passe',
        'description' => 'Por favor, confirme a sua palavra-passe para completar esta acção.',
        'current_password' => 'Palavra-passe actual',
    ],
    'two_factor' => [
        'heading' => 'Autenticação por 2 Factores',
        'description' => 'Por favor, confirme o acesso à sua conta indicando o código gerado pela sua aplicação de autenticação.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Autenticação por 2 Factores',
            'description' => 'Por favor, confirme o acesso à sua conta indicando um dos códigos de recuperação.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Perdeu o dispositivo?',
        'recovery_code_link' => 'Utilizar um código de recuperação',
        'back_to_login_link' => 'Voltar ao início',
    ],
    'profile' => [
        'account' => 'Conta',
        'profile' => 'Perfil',
        'my_profile' => 'O Meu Perfil',
        'subheading' => 'Gerir o meu perfil de utilizador.',
        'personal_info' => [
            'heading' => 'Informação Pessoal',
            'subheading' => 'Gerir a minha informação pessoal.',
            'submit' => [
                'label' => 'Actualizar',
            ],
            'notify' => 'Perfil actualizado com sucesso!',
        ],
        'password' => [
            'heading' => 'Palavra-passe',
            'subheading' => 'Deve conter, no mínimo, 8 caracteres.',
            'submit' => [
                'label' => 'Actualizar',
            ],
            'notify' => 'Palavra-passe actualizada com sucesso!',
        ],
        '2fa' => [
            'title' => 'Autenticação por 2 Factores',
            'description' => 'Gerir a autenticação por 2 factores para a minha conta (recomendado).',
            'actions' => [
                'enable' => 'Activar',
                'regenerate_codes' => 'Regerar Códigos de Recuperação',
                'disable' => 'Desactivar',
                'confirm_finish' => 'Confirmar & concluir',
                'cancel_setup' => 'Cancelar ativação',
            ],
            'setup_key' => 'Chave de Configuração',
            'must_enable' => 'É necessário activar a Autenticação por 2 Factores para utilizar esta aplicação.',
            'not_enabled' => [
                'title' => 'Ainda não activou a autenticação por 2 factores.',
                'description' => 'Quando a autenticação por 2 factores está activa, ser-lhe-á pedido uma chave segura e aleatória, durante o processo de autenticação. Pode obter esta chave através da aplicação Google Authenticator no seu telemóvel.',
            ],
            'finish_enabling' => [
                'title' => 'Concluir a activação da autenticação por 2 factores.',
                'description' => 'Para concluir a activação da autenticação por 2 factores, leia o código QR utilizando a aplicação de autenticação no seu telemóvel ou indique a chave de configuração e insira o código OTP gerado.',
            ],
            'enabled' => [
                'notify' => 'Autenticação por 2 factores activada.',
                'title' => 'Autenticação por 2 factores activada!',
                'description' => 'A autenticação por 2 factores encontra-se activada! Esta autenticação ajuda a manter a sua conta mais segura.',
                'store_codes' => 'Os seguintes códigos podem ser utilizados para recuperar o acesso à sua conta caso perca o seu telemóvel. Atenção! Estes códigos só serão mostrados uma vez.',
            ],
            'disabling' => [
                'notify' => 'Autenticação por 2 factores desactivada.',
            ],
            'regenerate_codes' => [
                'notify' => 'Foram gerados novos códigos de recuperação.',
            ],
            'confirmation' => [
                'success_notification' => 'Código verificado. Autenticação por 2 factores activada.',
                'invalid_code' => 'O código que indicou é inválido.',
            ],
        ],
        'sanctum' => [
            'title' => 'Chaves únicas API',
            'description' => 'Gerir chaves únicas API que permitem a serviços de terceiros a aceder a esta aplicação com os seus dados.',
            'create' => [
                'notify' => 'Chave única criada com sucesso!',
                'message' => 'A sua chave única será mostrada, apenas, uma vez aquando da sua criação. Se a perder, terá de a eliminar e criar uma nova.',
                'submit' => [
                    'label' => 'Criar',
                ],
            ],
            'update' => [
                'notify' => 'Chave única actualizada com sucesso!',
            ],
            'copied' => [
                'label' => 'Já copiei a minha chave única',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Copiar para a área de transferência',
        'tooltip' => 'Copiado!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'E-mail',
        'login' => 'Iniciar sessão',
        'name' => 'Nome',
        'password' => 'Palavra-passe',
        'password_confirm' => 'Confirmar palavra-passe',
        'new_password' => 'Nova palavra-passe',
        'new_password_confirmation' => 'Confirmação de nova palavra-passe',
        'token_name' => 'Nome da chave única',
        'token_expiry' => 'Validade da chave única',
        'abilities' => 'Capacidades',
        '2fa_code' => 'Código',
        '2fa_recovery_code' => 'Código de Recuperação',
        'created' => 'Criado',
        'expires' => 'Expira',
    ],
    'or' => 'Ou',
    'cancel' => 'Cancelar',
];
