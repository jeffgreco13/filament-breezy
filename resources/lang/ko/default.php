<?php

declare(strict_types=1);

return [
    'password_confirm' => [
        'heading' => '비밀번호 확인',
        'description' => '이 작업을 완료하려면 암호를 확인하십시오', // Please confirm your password to complete this action.
        'current_password' => '현재 비밀번호',
    ],
    'two_factor' => [
        'heading' => '2단계 인증 도전',
        'description' => '인증기 애플리케이션에서 제공된 코드를 입력하여 계정에 액세스를 확인하세요.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => '2단계 인증 도전',
            'description' => '비상 복구 코드 중 하나를 입력하여 계정에 액세스를 확인하세요.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => '기기를 잃어버렸습니까?',
        'recovery_code_link' => '복구 코드 사용',
        'back_to_login_link' => '로그인으로 돌아가기',
    ],
    'profile' => [
        'account' => '계정',
        'profile' => '프로필',
        'my_profile' => '내 프로필',
        'subheading' => '계정 프로필은 여기에서 관리할 수 있습니다.',
        'personal_info' => [
            'heading' => '개인 정보',
            'subheading' => '당신의 개인정보를 관리할 수 있습니다.',
            'submit' => [
                'label' => '수정',
            ],
            'notify' => '프로필이 변경되었습니다!',
        ],
        'password' => [
            'heading' => '비밀번호',
            'subheading' => '최소 8글자의 비밀번호를 입력해주세요.',
            'submit' => [
                'label' => '수정',
            ],
            'notify' => '비밀번호를 변경했습니다!',
        ],
        '2fa' => [
            'title' => '2단계 인증',
            'description' => '계정의 2단계 인증을 관리합니다 (권장됨).',
            'actions' => [
                'enable' => '활성화',
                'regenerate_codes' => '복구 코드 다시 생성',
                'disable' => '비활성화',
                'confirm_finish' => '확인 및 완료',
                'cancel_setup' => '설정 취소',
            ],
            'setup_key' => '설정 키',
            'must_enable' => '이 애플리케이션을 사용하려면 2단계 인증을 활성화해야 합니다.',
            'not_enabled' => [
                'title' => '2단계 인증이 활성화되어 있지 않습니다.',
                'description' => '2단계 인증이 활성화되면 인증 중에 안전하고 무작위 토큰을 입력하라는 메시지가 표시됩니다. 이 토큰은 휴대폰의 Google Authenticator 애플리케이션에서 얻을 수 있습니다.',
            ],
            'finish_enabling' => [
                'title' => '2단계 인증 활성화 완료',
                'description' => '2단계 인증을 활성화하려면 휴대폰의 인증 애플리케이션에서 다음 QR 코드를 스캔하거나 설정 키를 입력하고 생성된 OTP 코드를 제공하세요.',
            ],
            'enabled' => [
                'notify' => '2단계 인증이 활성화되었습니다.',
                'title' => '2단계 인증이 활성화되었습니다!',
                'description' => '이제 2단계 인증이 활성화되었습니다. 이것은 계정을 더 안전하게 만들어줍니다.',
                'store_codes' => '이 코드를 사용하여 기기를 잃어버린 경우 계정에 대한 액세스를 복구할 수 있습니다. 경고! 이 코드는 한 번만 표시됩니다.',
            ],
            'disabling' => [
                'notify' => '2단계 인증이 비활성화되었습니다.',
            ],
            'regenerate_codes' => [
                'notify' => '새 복구 코드가 생성되었습니다.',
            ],
            'confirmation' => [
                'success_notification' => '코드가 확인되었습니다. 2단계 인증이 활성화되었습니다.',
                'invalid_code' => '입력한 코드가 유효하지 않습니다.',
            ],
        ],
        'sanctum' => [
            'title' => 'API 토큰',
            'description' => '제3자 서비스가 이 애플리케이션에 대한 액세스를 가능하게 하는 API 토큰을 관리합니다.',
            'create' => [
                'notify' => '토큰이 성공적으로 생성되었습니다!',
                'message' => '토큰은 생성 시 한 번만 표시됩니다. 토큰을 잃어버리면 삭제하고 새로운 토큰을 생성해야 합니다.',
                'submit' => [
                    'label' => '생성',
                ],
            ],
            'update' => [
                'notify' => '토큰이 성공적으로 업데이트되었습니다!',
            ],
            'copied' => [
                'label' => '토큰을 복사했습니다',
            ],
        ],
    ],
    'clipboard' => [
        'link' => '클립보드에 복사',
        'tooltip' => '복사됨!',
    ],
    'fields' => [
        'avatar' => '아바타',
        'email' => '이메일',
        'login' => '로그인',
        'name' => '이름',
        'password' => '비밀번호',
        'password_confirm' => '비밀번호 확인',
        'new_password' => '신규 비밀번호',
        'new_password_confirmation' => '신규 비밀번호 확인',
        'token_name' => '토큰 이름',
        'token_expiry' => '토큰 만료일',
        'abilities' => '능력',
        '2fa_code' => '코드',
        '2fa_recovery_code' => '복구 코드',
    ],
    'or' => '또는',
    'cancel' => '취소',
];
