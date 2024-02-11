<?php

return [
    'login' => [
        'username_or_email' => 'שם משתמש או כתובת דואר אלקטרוני',
        'forgot_password_link' => 'שכחת סיסמה?',
        'create_an_account' => 'צור חשבון',
    ],
    'password_confirm' => [
        'heading' => 'אימות סיסמה',
        'description' => 'אנא אמת את הסיסמה שלך כדי להשלים פעולה זו.',
        'current_password' => 'סיסמה נוכחית',
    ],
    'two_factor' => [
        'heading' => 'אימות דו שלבי',
        'description' => 'אנא אמת גישה לחשבונך על ידי הזנת הקוד שאושר על ידי אפליקציית האימות שלך.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'אימות דו שלבי',
            'description' => 'אנא אמת גישה לחשבונך על ידי הזנת אחת מקודי ההחלפה לחירום שלך.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'אבדת מכשיר?',
        'recovery_code_link' => 'השתמש בקוד ההחלפה',
        'back_to_login_link' => 'חזרה להתחברות',
    ],
    'registration' => [
        'title' => 'הרשמה',
        'heading' => 'צור חשבון חדש',
        'submit' => [
            'label' => 'הירשם',
        ],
        'notification_unique' => 'כבר קיים חשבון עם כתובת הדואר האלקטרוני הזו. אנא התחבר.',
    ],
    'reset_password' => [
        'title' => 'שכחתי סיסמה',
        'heading' => 'איפוס סיסמה',
        'submit' => [
            'label' => 'שלח',
        ],
        'notification_error' => 'שגיאה באיפוס הסיסמה. אנא בקש שחזור סיסמה חדשה.',
        'notification_error_link_text' => 'נסה שוב',
        'notification_success' => ' להוראות בדוק את תיבת הדואר הנכנס שלך!',
    ],
    'verification' => [
        'title' => 'אימות דואר אלקטרוני',
        'heading' => 'נדרש אימות דואר אלקטרוני',
        'submit' => [
            'label' => 'התנתקות',
        ],
        'notification_success' => 'להוראות בדוק את תיבת הדואר הנכנס שלך!',
        'notification_resend' => ' הודעת אימות נשלחה מחדש לדואר האלקטרוני שלך.',
        'before_proceeding' => 'לפני שנמשיך, אנא בדוק את תיבת הדואר האלקטרוני שלך לקבלת קישור לאימות.',
        'not_receive' => 'אם לא קיבלת את האימייל,',
        'request_another' => 'לחץ כאן לבקשת אימות נוסף',
    ],
    'profile' => [
        'account' => 'חשבון',
        'profile' => 'פרופיל',
        'my_profile' => 'הפרופיל שלי',
        'personal_info' => [
            'heading' => 'מידע אישי',
            'subheading' => 'ניהול מידע האישי שלך.',
            'submit' => [
                'label' => 'עדכון',
            ],
            'notify' => 'פרופיל עודכן בהצלחה!',
        ],
        'password' => [
            'heading' => 'סיסמה',
            'subheading' => 'יש להכיל לפחות 8 תווים.',
            'submit' => [
                'label' => 'עדכון',
            ],
            'notify' => 'הסיסמה עודכנה בהצלחה!',
        ],
        '2fa' => [
            'title' => 'אימות דו-שלבי',
            'description' => 'ניהול אימות דו-שלבי עבור החשבון שלך (מומלץ).',
            'actions' => [
                'enable' => 'הפעלה',
                'regenerate_codes' => 'יצירת קודים חדשים',
                'disable' => 'השבתה',
                'confirm_finish' => 'אישור וסיום',
                'cancel_setup' => 'ביטול הגדרות',
            ],
            'setup_key' => 'מפתח התקנה',
            'not_enabled' => [
                'title' => 'לא הפעלת אימות דו-שלבי.',
                'description' => 'כאשר אימות דו-שלבי מופעל, תתבקש להכניס קוד מאובטח ואקראי במהלך האימות. תוכל לקבל קוד זה מאפליקציית האימות הדו-שלבית של Google בטלפון הנייד שלך.',
            ],
            'finish_enabling' => [
                'title' => 'סיום הפעלת אימות דו-שלבי.',
                'description' => 'לסיום הפעלת אימות דו-שלבי, סרוק את קוד ה-QR הבא באמצעות אפליקצית האימות הדו-שלבית של הטלפון הנייד שלך או הכנס את מפתח ההגדרה וספק את קוד ה-OTP שהתקבל.',
            ],
            'enabled' => [
                'title' => 'הפעלת אימות דו-שלבי בוצעה בהצלחה!',
                'description' => 'אימות דו-שלבי מופעל כעת. זה עוזר להגביר את ביטחון החשבון שלך.',
                'store_codes' => 'שמור על קודי השחזור האלו במנהל ססמאות מאובטח. ניתן להשתמש בהם לשחזור גישה לחשבון במקרה שנתקלת באובדן ההתקנה של אימות הדו-שלבי.',
                'show_codes' => 'הצג קודי שחזור',
                'hide_codes' => 'הסתר קודי שחזור',
            ],
            'confirmation' => [
                'success_notification' => 'הקוד אומת. אימות דו-שלבי מופעל.',
                'invalid_code' => 'הקוד שהוכנס אינו תקין.',
            ],
        ],
        'sanctum' => [
            'title' => 'טוקנים לממשק API',
            'description' => 'ניהול של טוקנים לממשק API שמאפשרים לשירותים צד שלישי לגשת ליישום הזה בשם שלך. הערה: הטוקן מוצג רק בפעם הראשונה ביצירתו. אם אתה מאבד את הטוקן, תצטרך למחוק אותו וליצור חדש.',
            'create' => [
                'notify' => 'טוקן נוצר בהצלחה!',
                'submit' => [
                    'label' => 'יצירה',
                ],
            ],
            'update' => [
                'notify' => 'טוקן עודכן בהצלחה!',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'העתק',
        'tooltip' => 'הועתק!',
    ],
    'fields' => [
        'email' => 'אימייל',
        'login' => 'כניסה',
        'name' => 'שם',
        'password' => 'סיסמה',
        'password_confirm' => 'אישור סיסמה',
        'new_password' => 'סיסמה חדשה',
        'new_password_confirmation' => 'אישור סיסמה חדשה',
        'token_name' => 'שם טוקן',
        'abilities' => 'יכולות',
        '2fa_code' => 'קוד 2FA',
        '2fa_recovery_code' => 'קוד שחזור 2FA',
        'created' => 'נוצר',
        'expires' => 'פג תוקף',
    ],
    'or' => 'או',
    'cancel' => 'ביטול',
];
