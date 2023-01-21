<?php

return [
    'name' => 'UserVerification',
    'user_table'=>'user_profile',
    'max_attempts'=>5,
    'validation_minutes'=>30,
    'db_update'=>[
        'enabled'=>true,
        'users_table'=>'users',
        'mobile_field'=>'mobile',
        'table'=>'user_profile',
        'verify_field'=>'mobile_verified',
        'user_id_field'=>'user_id'
    ]
];
