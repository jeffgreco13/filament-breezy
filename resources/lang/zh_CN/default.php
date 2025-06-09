<?php

return [
    'password_confirm' => [
        'heading' => '确认密码',
        'description' => '请确认您的密码以完成此操作。',
        'current_password' => '当前密码',
    ],
    'two_factor' => [
        'heading' => '双因素身份验证',
        'description' => '请输入身份验证应用程序提供的代码来确认您可以访问您的帐户。',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => '双因素身份验证',
            'description' => '请输入一个您未使用的紧急恢复代码，以便确认您能访问您的帐户。',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => '设备丢失？',
        'recovery_code_link' => '使用恢复代码',
        'back_to_login_link' => '返回登录',
    ],
    'profile' => [
        'account' => '帐户',
        'profile' => '个人资料',
        'my_profile' => '我的个人资料',
        'subheading' => '在此处管理您的个人资料。',
        'personal_info' => [
            'heading' => '个人信息',
            'subheading' => '管理您的个人信息。',
            'submit' => [
                'label' => '更新',
            ],
            'notify' => '个人资料更新成功！',
        ],
        'password' => [
            'heading' => '密码',
            'subheading' => '长度必须至少为 8 个字符。',
            'submit' => [
                'label' => '更新',
            ],
            'notify' => '密码更新成功！',
        ],
        '2fa' => [
            'title' => '双因素身份验证设置',
            'description' => '管理您帐户的双因素身份验证（推荐启用）。',
            'actions' => [
                'enable' => '开启',
                'regenerate_codes' => '重新生成恢复代码',
                'disable' => '关闭',
                'confirm_finish' => '验证代码并完成',
                'cancel_setup' => '取消设置',
            ],
            'setup_key' => '设置密钥',
            'must_enable' => '您必须启用双因素身份验证才能使用此应用程序。',
            'not_enabled' => [
                'title' => '您尚未启用双因素身份验证。',
                'description' => '启用双因素身份验证后，身份验证过程中会提示您输入安全的随机令牌。您可以使用智能手机上的身份验证器应用（例如 Google Authenticator、Microsoft Authenticator 等）来执行此操作。',
            ],
            'finish_enabling' => [
                'title' => '完成启用双因素身份验证。',
                'description' => '要完成启用双因素身份验证，请使用手机的身份验证器应用程序扫描以下二维码或输入设置密钥并提供生成的 OTP 代码。',
            ],
            'enabled' => [
                'notify' => '已启用双因素身份验证。',
                'title' => '您已启用双因素身份验证！',
                'description' => '双重身份验证现已启用。这有助于提高您的帐户安全性。',
                'store_codes' => '如果您的设备丢失，这些代码可用于恢复您帐户的访问权限。警告！这些代码只会显示一次，请务必妥善保存。',
            ],
            'disabling' => [
                'notify' => '双因素身份验证已被禁用。',
            ],
            'regenerate_codes' => [
                'notify' => '新的恢复代码已生成。',
            ],
            'confirmation' => [
                'success_notification' => '代码已验证。已启用双重身份验证。',
                'invalid_code' => '您输入的代码无效。',
            ],
        ],
        'sanctum' => [
            'title' => 'API令牌',
            'description' => '管理允许第三方服务代表您访问此应用程序的 API 令牌。',
            'create' => [
                'notify' => '令牌创建成功！',
                'message' => '您的令牌在创建后仅显示一次。如果您丢失了令牌，则需要删除它并创建新的令牌。',
                'submit' => [
                    'label' => '创建',
                ],
            ],
            'update' => [
                'notify' => '令牌更新成功！',
                'submit' => [
                    'label' => '更新',
                ],
            ],
            'copied' => [
                'label' => '我已经复制了我的令牌',
            ],
        ],
        'browser_sessions' => [
            'heading' => '浏览器会话',
            'subheading' => '管理您的活动会话。',
            'label' => '浏览器会话',
            'content' => '如有必要，您可以退出所有设备上的所有其他浏览器会话。以下列出了您最近的一些会话；但此列表可能并不详尽。如果您认为您的帐户已被盗用，您也应该更新密码。',
            'device' => '当前设备',
            'last_active' => '最后活跃',
            'logout_other_sessions' => '注销其他浏览器会话',
            'logout_heading' => '注销其他浏览器会话',
            'logout_description' => '请输入您的密码以确认您想要退出所有设备上的其他浏览器会话。',
            'logout_action' => '注销其他浏览器会话',
            'incorrect_password' => '您输入的密码不正确。请重试。',
            'logout_success' => '所有其他浏览器会话均已成功注销。',
        ],
    ],
    'clipboard' => [
        'link' => '复制到剪贴板',
        'tooltip' => '复制成功！',
    ],
    'fields' => [
        'avatar' => '头像',
        'email' => '邮箱',
        'login' => '登录',
        'name' => '名称',
        'password' => '密码',
        'password_confirm' => '密码确认',
        'new_password' => '新密码',
        'new_password_confirmation' => '确认密码',
        'token_name' => '令牌名称',
        'token_expiry' => '令牌过期时间',
        'abilities' => '权限',
        '2fa_code' => '2FA 验证码',
        '2fa_recovery_code' => '恢复代码',
        'created' => '已创建',
        'expires' => '已过期',
    ],
    'or' => '或',
    'cancel' => '取消',
];
