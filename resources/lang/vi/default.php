<?php

return [
    'login' => [
        'username_or_email' => 'Tên tài khoản hoặc mật khẩu',
        'forgot_password_link' => 'Quên mật khẩu?',
        'create_an_account' => 'tạo tài khoản mới',
    ],
    'password_confirm' => [
        'heading' => 'Xác nhận mật khẩu',
        'description' => 'Vui lòng xác nhận mật khẩu của bạn để hoàn tất thao tác này.',
        'current_password' => 'Mật khẩu hiện tại',
    ],
    'two_factor' => [
        'heading' => 'Xác thực hai yếu tố',
        'description' => 'Vui lòng xác nhận quyền truy cập vào tài khoản của bạn bằng cách nhập mã xác thực được cung cấp bởi ứng dụng xác thực của bạn.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Xác thực hai yếu tố',
            'description' => 'Vui lòng xác nhận quyền truy cập vào tài khoản của bạn bằng cách nhập một trong các mã khôi phục khẩn cấp của bạn.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Mất thiết bị?',
        'recovery_code_link' => 'Sử dụng mã khôi phục',
        'back_to_login_link' => 'Quay lại trang đăng nhập',
    ],
    'registration' => [
        'title' => 'Đăng ký',
        'heading' => 'Tạo tài khoản mới',
        'submit' => [
            'label' => 'Đăng ký',
        ],
        'notification_unique' => 'Địa chỉ email này đã tồn tại, vui lòng đăng nhập.',
    ],
    'reset_password' => [
        'title' => 'Quên mật khẩu',
        'heading' => 'Khôi phục mật khẩu',
        'submit' => [
            'label' => 'Gửi',
        ],
        'notification_error' => 'Lỗi khi đặt lại mật khẩu. Vui lòng yêu cầu đặt lại mật khẩu mới.',
        'notification_error_link_text' => 'Thử lại',
        'notification_success' => 'Kiểm tra hộp thư đến của bạn để biết hướng dẫn!',
    ],
    'verification' => [
        'title' => 'Xác nhận email',
        'heading' => 'Yêu cầu xác thực email',
        'submit' => [
            'label' => 'Đăng xuất',
        ],
        'notification_success' => 'Kiểm tra hộp thư đến của bạn để biết hướng dẫn!',
        'notification_resend' => 'Email xác minh đã được gửi lại.',
        'before_proceeding' => 'Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.',
        'not_receive' => 'Nếu bạn không nhận được email,',
        'request_another' => 'bấm vào đây để yêu cầu một cái khác',
    ],
    'profile' => [
        'account' => 'Tài khoản',
        'profile' => 'Hồ sơ',
        'my_profile' => 'Hồ sơ của tôi',
        'personal_info' => [
            'heading' => 'Thông tin cá nhân',
            'subheading' => 'Quản lý thông tin cá nhân của bạn.',
            'submit' => [
                'label' => 'Cập nhật',
            ],
            'notify' => 'Cập thông hồ sơ thành công!',
        ],
        'password' => [
            'heading' => 'Mật khẩu',
            'subheading' => 'Phải có 8 ký tự.',
            'submit' => [
                'label' => 'Cập nhật',
            ],
            'notify' => 'Cập nhật mật khẩu thành công!',
        ],
        '2fa' => [
            'title' => 'Xác thực hai yếu tố',
            'description' => 'Quản lý xác thực 2 yếu tố cho tài khoản của bạn (được khuyến nghị).',
            'actions' => [
                'enable' => 'Bật',
                'regenerate_codes' => 'Tạo mã lại',
                'disable' => 'Tắt',
                'confirm_finish' => 'Xác nhận & hoàn tất',
                'cancel_setup' => 'Hủy thiết lập',
            ],
            'setup_key' => 'Thiết lập khóa',
            'not_enabled' => [
                'title' => 'Bạn chưa bật xác thực hai yếu tố.',
                'description' => 'Khi xác thực hai yếu tố được bật, bạn sẽ được nhắc nhập mã token ngẫu nhiên, an toàn trong quá trình xác thực. Bạn có thể lấy mã token này từ ứng dụng Google Authenticator trên điện thoại của mình.',
            ],
            'finish_enabling' => [
                'title' => 'Hoàn tất việc bật xác thực hai yếu tố.',
                'description' => 'Để hoàn tất việc bật xác thực hai yếu tố, hãy quét mã QR sau bằng ứng dụng xác thực trên điện thoại của bạn hoặc nhập khóa thiết lập và cung cấp mã OTP đã tạo.',
            ],
            'enabled' => [
                'title' => 'Bạn đã bật xác thực hai yếu tố!',
                'description' => 'Xác thực hai yếu tố hiện đã được bật. Điều này giúp làm cho tài khoản của bạn an toàn hơn.',
                'store_codes' => 'Lưu trữ các mã khôi phục này trong trình quản lý mật khẩu an toàn. Chúng có thể được sử dụng để khôi phục quyền truy cập vào tài khoản của bạn nếu thiết bị xác thực hai yếu tố của bạn bị mất.',
                'show_codes' => 'Hiển thị mã khôi phục',
                'hide_codes' => 'Ẩn mã khôi phục',
            ],
            'confirmation' => [
                'success_notification' => 'Đã xác minh mã. Đã bật xác thực hai yếu tố.',
                'invalid_code' => 'Mã bạn đã nhập không hợp lệ.',
            ],
        ],
        'sanctum' => [
            'title' => 'Mã token API',
            'description' => 'Quản lý mã token API cho phép các dịch vụ của bên thứ ba thay mặt bạn truy cập vào ứng dụng này. LƯU Ý: mã token của bạn được hiển thị một lần khi tạo. Nếu bạn mất mã token của mình, bạn sẽ cần phải xóa nó và tạo một mã mới.',
            'create' => [
                'notify' => 'Tạo mã token thành công!',
                'submit' => [
                    'label' => 'Tạo',
                ],
            ],
            'update' => [
                'notify' => 'Cập nhật mã token thành công!',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Sao chép',
        'tooltip' => 'Đã sao chép!',
    ],
    'fields' => [
        'email' => 'Email',
        'login' => 'Đăng nhập',
        'name' => 'Tên',
        'password' => 'Mật khẩu',
        'password_confirm' => 'Mật khẩu xác nhận',
        'new_password' => 'Mật khẩu mới',
        'new_password_confirmation' => 'Mật khẩu xác nhận',
        'token_name' => 'Tên mã token',
        'abilities' => 'Khả năng',
        '2fa_code' => 'Mã',
        '2fa_recovery_code' => 'Mã khôi phục',
        'created' => 'Đã tạo',
        'expires' => 'Hết hạn',
    ],
    'or' => 'Hoặc',
    'cancel' => 'Hủy',
];
