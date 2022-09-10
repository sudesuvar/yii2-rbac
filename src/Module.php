<?php

namespace portalium\rbac;

class Module extends \portalium\base\Module
{
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'rbac/default',
            ]
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('rbac','@portalium/rbac/messages',[
            'rbac' => 'rbac.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('rbac', $message, $params);
    }
}