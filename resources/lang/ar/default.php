<?php

return [
    'login' => [
        'forgot_password_link' => 'نسيت كلمة المرور؟',
        'create_an_account' => 'إنشاء حساب',
    ],
    'registration' => [
        'title' => 'تسجيل حساب',
        'heading' => 'إنشاء حساب جديد',
        'submit' => [
            'label' => 'تسجيل',
        ],
        'notification_unique' => 'لقد تم تسجيل هذا البريد الإليكتروني مسبقاً',
    ],
    'reset_password' => [
        'title' => 'استعادة كلمة المرور',
        'heading' => 'استعادة كلمة المرور',
        'submit' => [
            'label' => 'أرسل',
        ],
        'notification_error' => 'عذراً, نرجو المحاولة مرة أخرى لاحقاً.',
        'notification_success' => 'تم إرسال التعليمات للبريد الإليكتروني الخاص بك!',
    ],
    'verification' => [
        'title' => 'التحقق من البريد الإليكتروني',
        'heading' => 'التحقق من البريد الإليكتروني مطلوب',
        'submit' => [
            'label' => 'تسجيل الخروج',
        ],
        'notification_success' => 'تم إرسال التعليمات للبريد الإليكتروني الخاص بك!',
        'notification_resend' => 'تم إعادة إرسال رابط التحقق لبريدك الإليكتروني.',
        'before_proceeding' => 'قبل المتابعة، يرجى التحقق من رابط التفعيل المرسل إلى بريدك الإليكتروني.',
        'not_receive' => 'إذا لم يصلك رابط التفعيل على بريدك الإليكتروني',
        'request_another' => 'اضغط هنا لإرسال رابط آخر.',
    ],
    'profile' => [
        'account' => 'الحساب',
        'profile' => 'الملف الشخصي',
        'my_profile' => 'ملفي الشخصي',
        'personal_info' => [
            'heading' => 'البيانات الشخصية',
            'subheading' => 'قم بإدارة بياناتك الشخصية.',
            'submit' => [
                'label' => 'تحديث',
            ],
            'notify' => 'تم تحديث بياناتك الشخصية بنجاح!',
        ],
        'password' => [
            'heading' => 'كلمة المرور',
            'subheading' => 'يجب أن تتألف كلمة المرور من 8 خانات على الأقل.',
            'submit' => [
                'label' => 'تحديث',
            ],
            'notify' => 'تم تحديث كلمة المرور بنجاح!',
        ],
        'sanctum' => [
            'title' => 'رموز API',
            'description' => 'إدارة رموز API التي تسمح لخدمات الطرف الثالث الإتصال بالتطبيق بالإنابة عنك. ملاحظة: يتم عرض الرمز مرة واحدة لحظة إنشائه. إذا فقدت رمزك، فسيتوجب عليك حذفه وإنشاء رمز جديد.',
            'create' => [
                'notify' => 'تم إنشاء الرمز بنجاح!',
                'submit' => [
                    'label' => 'Create',
                ],
            ],
            'update' => [
                'notify' => 'Token updated successfully!',
            ],
        ],
    ],
    'fields' => [
        'name' => 'الإسم',
        'email' => 'البريد الإليكتروني',
        'password' => 'كلمة المرور',
        'password_confirm' => 'تأكيد كلمة المرور',
        'new_password' => 'كلمة مرور جديدة',
        'new_password_confirmation' => 'تأكيد كلمة المرور الجديدة',
        'token_name' => 'اسم الرمز',
        'abilities' => 'القدرات',
    ],
    'or' => 'أو',
];
