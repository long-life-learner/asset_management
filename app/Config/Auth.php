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

    /**
     * If true, will redirect instead of throwing exceptions
     * when a user doesn't have sufficient permissions.
     * This prevents PermissionException from causing 500 errors in CI4 4.5+.
     */
    public $silent = true;

    /**
     * Landing route after login or when permission is denied (silent mode).
     */
    public $landingRoute = '/';
}
