<?php

namespace Modules\AccessLevel\Enums;

use BenSampo\Enum\Enum;

final class UserActivityTypes extends Enum
{
    const Create = 'created';
    const Update = 'updated';
    const Delete = 'deleted';
    const View = 'viewed';
    const Download = 'download';
    const Upload = 'upload';
    const Login = 'login';
    const Logout = 'logout';
    const Restricted = 'restricted';
    const WrongPassword = 'wrong-password';
}
