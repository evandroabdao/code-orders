<?php
/**
 * This file was autogenerated by zfcampus/zf-mvc-auth (bin/zf-mvc-auth-oauth2-override.php),
 * and overrides the ZF\OAuth2\Service\OAuth2Server to provide the ability to create named
 * OAuth2\Server instances.
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'ZF\OAuth2\Service\OAuth2Server' => 'ZF\MvcAuth\Factory\NamedOAuth2ServerFactory',
        ),
    ),
    'zf-oauth2' => array(
        'access_lifetime' => 3600,
        'allow_implicit' => true,
        'options' => [
            'always_issue_new_refresh_token' => true,
        ]
    )
);