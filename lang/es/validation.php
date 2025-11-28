<?php

return [
    'user_validation_exception' => [
        'invalid_email_format' => 'El formato del correo electrónico no es válido.',
        'email_already_exists' => 'El correo electrónico ya está registrado.',
    ],

    'authorization_exception' => [
        'invalid_credentials' => 'Las credenciales no son correctas.',
    ],

    'company_validation_exception' => [
        'company_already_exists' => 'El nombre de la empresa ya está registrado.',
    ],

    'onboarding_session' => [
        'application_exception' => [
            'user_is_not_owner' => 'El usuario no es dueño de la empresa.',
            'company_is_not_pending_setup' => 'La empresa no está en estado de configuración pendiente.',
        ],
    ],
];
