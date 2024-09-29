<?php

declare(strict_types=1);

return [
    'password_confirm' => [
        'heading'          => '确认密码',
        'description'      => '请确认您的密码以完成此操作。',
        'current_password' => '当前密码',
    ],
    'two_factor' => [
        'heading'          => '双因素身份验证',
        'description'      => '请输入您的验证器应用程序提供的验证码来确认访问您的帐户。',
        'code_placeholder' => 'XXX-XXX',
        'recovery'         => [
            'heading'     => '双因素身份验证',
            'description' => '请通过输入您的紧急恢复代码来访问您的帐户。',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text'        => '密钥丟失？',
        'recovery_code_link'        => '使用密钥',
        'back_to_login_link'        => '回到登录',
    ],
    'profile' => [
        'account'       => '账号',
        'profile'       => '个人资料',
        'my_profile'    => '我的资料',
        'subheading'    => '个人资料管理',
        'personal_info' => [
            'heading'    => '基本信息',
            'subheading' => '基本信息管理',
            'submit'     => [
                'label' => '更新',
            ],
            'notify' => '更新成功',
        ],
        'password' => [
            'heading'    => '密码',
            'subheading' => '密码长度至少为8个字符',
            'submit'     => [
                'label' => '更新',
            ],
            'notify' => '密码更新成功！',
        ],
        '2fa' => [
            'title'       => '双因素认证(2FA)',
            'description' => '身份证验证器管理 (推荐)',
            'actions'     => [
                'enable'           => '启用',
                'regenerate_codes' => '重新生成恢复代码',
                'disable'          => '禁用',
                'confirm_finish'   => '确认完成',
                'cancel_setup'     => '取消设置',
            ],
            'setup_key'   => '设置KEY',
            'must_enable' => '您必须启用双因素身份验证才能使用此应用程序。',
            'not_enabled' => [
                'title'       => '您尚未启用双因素身份验证。',
                'description' => '当启用双因素身份验证时，将提示您在身份验证期间输入安全的随机令牌。你可以使用智能手机上的身份验证应用程序，如谷歌身份验证器，微软身份验证器等很方便完成验证。',
            ],
            'finish_enabling' => [
                'title'       => '完成启用双因素身份验证。',
                'description' => '要完成启用双因素身份验证，请使用手机的身份验证应用程序扫描以下QR码，或输入设置密钥并提供生成的OTP代码。',
            ],
            'enabled' => [
                'notify'      => '启用双因素身份验证。',
                'title'       => '您已启用双因素身份验证！',
                'description' => '现在启用了双因素身份验证。这有助于使您的帐户更安全。',
                'store_codes' => '如果你的设备丢失了，这些代码可以用来恢复对你账户的访问权限。警告!这些代码只会显示一次。',
            ],
            'disabling' => [
                'notify' => '已禁用双因素身份验证。',
            ],
            'regenerate_codes' => [
                'notify' => '新的恢复代码已经生成。',
            ],
            'confirmation' => [
                'success_notification' => '验证完成。启用了双因素身份验证。',
                'invalid_code'         => '您输入的代码无效。',
            ],
        ],
        'sanctum' => [
            'title'       => 'API Tokens',
            'description' => '管理 API 令牌，允许第三方服务代表您访问此应用程序。',
            'create'      => [
                'notify'  => 'Token 创建成功',
                'message' => '您的令牌只在创建时显示一次。如果您丢失了令牌，则需要删除它并创建一个新的。',
                'submit'  => [
                    'label' => '新增',
                ],
            ],
            'update' => [
                'notify' => 'Token 更新成功！',
            ],
            'copied' => [
                'label' => '我已经复制了我的令牌',
            ],
        ],
    ],
    'clipboard' => [
        'link'    => '复制到剪贴板',
        'tooltip' => '已复制',
    ],
    'fields' => [
        'avatar'                    => '头像',
        'email'                     => '邮箱',
        'login'                     => '登录',
        'name'                      => '名称',
        'password'                  => '确认',
        'password_confirm'          => '确认密码',
        'new_password'              => '新的密碼',
        'new_password_confirmation' => '确认新的密码',
        'token_name'                => 'Token 名称',
        'token_expiry'              => 'Token 时效',
        'abilities'                 => '能力',
        '2fa_code'                  => 'Code',
        '2fa_recovery_code'         => '恢复代码',
        'created'                   => '创建',
        'expires'                   => '到期',
    ],
    'or'     => ' 或 ',
    'cancel' => '取消',
];
