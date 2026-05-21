<?php

namespace Config;

use Myth\Auth\Config\Auth as MythAuthConfig;

/**
 * Custom authentication configuration overriding Myth/Auth defaults.
 *
 * Disables user self‑registration and the active password reset feature.
 */
class Auth extends MythAuthConfig
{
    /**
     * Allow users to register new accounts.
     * Set to false to disable the registration route and view.
     */
    public $allowRegistration = false;

    /**
     * Enable the active resetter (password recovery via email).
     * Set to false to turn off the forgot‑password functionality.
     */
    public $activeResetter = false;
}
