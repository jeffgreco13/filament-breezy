<?php

return [
    'password_confirm' => [
        'heading' => '確認密碼',
        'description' => '請確認您的密碼以完成此操作。',
        'current_password' => '當前密碼',
    ],
    'two_factor' => [
        'heading' => '雙重要素挑戰',
        'description' => '請輸入您的身份驗證器應用程序提供的代碼來確認對您帳戶的訪問。',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => '雙重要素挑戰',
            'description' => '請輸入您的緊急還原碼以存取您的帳號。',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => '設備丟失？',
        'recovery_code_link' => '使用復原碼',
        'back_to_login_link' => '回到登入',
    ],
    'profile' => [
        'account' => '帳號',
        'profile' => '個人資料',
        'my_profile' => '我的個人資料',
        'subheading' => '在這裡管理您的用戶個人資料。',
        'personal_info' => [
            'heading' => '個人信息',
            'subheading' => '管理您的個人信息。',
            'submit' => [
                'label' => '更新',
            ],
            'notify' => '個人資料更新成功！',
        ],
        'password' => [
            'heading' => '密碼',
            'subheading' => '長度必須至少為 8 個字符。',
            'submit' => [
                'label' => '更新',
            ],
            'notify' => '密碼更新成功！',
        ],
        '2fa' => [
            'title' => '雙重要素驗證',
            'description' => '管理您帳戶的雙重要素身份驗證（推薦）。',
            'actions' => [
                'enable' => '啟用',
                'regenerate_codes' => '重新產生復原碼',
                'disable' => '禁用',
                'confirm_finish' => '確認並完成',
                'cancel_setup' => '取消設置',
            ],
            'setup_key' => '設置金鑰',
            'must_enable' => '您必須啟用雙因素身份驗證才能使用此應用程序。',
            'not_enabled' => [
                'title' => '您尚未啟用雙因素身份驗證。',
                'description' => '啟用雙因素身份驗證後，系統將在身份驗證過程中提示您輸入安全的隨機 Token。 您可以從手機的 Google Authenticator 應用程序中檢索此 Token。',
            ],
            'finish_enabling' => [
                'title' => '完成啟用雙因素身份驗證。',
                'description' => '要完成啟用雙因素身份驗證，請使用手機的身份驗證器應用程序掃描以下二維碼，或輸入設置密鑰並提供生成的 OTP 代碼。',
            ],
            'enabled' => [
                'notify' => '啟用雙重要素身份驗證。',
                'title' => '您已啟用雙重要素身份驗證！',
                'description' => '現已啟用雙重要素身份驗證。 這有助於使您的帳戶更加安全。',
                'store_codes' => '如果您的設備丟失，這些代碼可用於恢復對您帳戶的訪問權限。 警告！ 這些代碼只會顯示一次。',
            ],
            'disabling' => [
                'notify' => '雙重要素身份驗證已被禁用。',
            ],
            'regenerate_codes' => [
                'notify' => '新的恢復代碼已生成。',
            ],
            'confirmation' => [
                'success_notification' => '代碼已驗證。 啟用雙重要素身份驗證。',
                'invalid_code' => '您輸入的代碼無效。',
            ],
        ],
        'sanctum' => [
            'title' => 'API Tokens',
            'description' => '管理允許第三方服務代表您訪問此應用程序的 API Token。',
            'create' => [
                'notify' => 'Token 創建成功！',
                'message' => '您的 Token 在創建時僅顯示一次。 如果您丟失了 Token，則需要將其刪除並創建一個新 Token。',
                'submit' => [
                    'label' => '新增',
                ],
            ],
            'update' => [
                'notify' => 'Token 更新成功！',
            ],
            'copied' => [
                'label' => '我已經復制了我的 Token',
            ],
        ],
    ],
    'clipboard' => [
        'link' => '複製到剪貼板',
        'tooltip' => '已複製！',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => '登入',
        'name' => '名稱',
        'password' => '確認',
        'password_confirm' => '密碼確認',
        'new_password' => '新的密碼',
        'new_password_confirmation' => '確認密碼',
        'token_name' => 'Token 名稱',
        'token_expiry' => 'Token 到期',
        'abilities' => 'Abilities',
        '2fa_code' => 'Code',
        '2fa_recovery_code' => '恢復代碼',
        'created' => '創建',
        'expires' => '到期',
    ],
    'or' => ' 或 ',
    'cancel' => '取消',
];
