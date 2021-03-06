<?php
/**
 * service_manager.php
 */
return [
    'factories' => [
        'doctrine.cache.doctrine_cache'
        => 'Rcm\Factory\DoctrineCacheFactory',
        'Rcm\Acl\CmsPermissionsChecks'
        => '\Rcm\Factory\CmsPermissionsChecksFactory',
        'Rcm\Acl\ResourceProvider'
        => 'Rcm\Factory\AclResourceProviderFactory',
        'Rcm\EventListener\EventWrapper'
        => 'Rcm\Factory\EventWrapperFactory',
        'Rcm\EventListener\RouteListener'
        => 'Rcm\Factory\RouteListenerFactory',
        'Rcm\EventListener\DispatchListener'
        => 'Rcm\Factory\DispatchListenerFactory',
        'Rcm\EventListener\EventFinishListener'
        => 'Rcm\Factory\EventFinishListenerFactory',
        'Rcm\EventListener\ViewEventListener'
        => 'Rcm\Factory\ViewEventListenerFactory',
        \Rcm\Middleware\DomainCheck::class
        => \Rcm\Factory\MiddlewareDomainCheckFactory::class,
        \Rcm\Middleware\LocaleSetter::class
        => \Rcm\Factory\MiddlewareLocaleSetterFactory::class,
        \Rcm\Middleware\RedirectCheck::class
        => \Rcm\Factory\MiddlewareRedirectCheckFactory::class,
        'Rcm\Service\AssetManagerCache'
        => 'Rcm\Factory\AssetManagerCacheFactory',
        'Rcm\Service\Cache'
        => 'Rcm\Factory\CacheFactory',
        'Rcm\Service\CurrentSite'
        => '\Rcm\Factory\CurrentSiteFactory',
        \Rcm\Service\DomainRedirectService::class
        => \Rcm\Factory\ServiceDomainRedirectServiceFactory::class,
        \Rcm\Service\DomainService::class
        => \Rcm\Factory\ServiceDomainServiceFactory::class,
        'Rcm\Service\HtmlIncludes'
        => 'Rcm\Factory\RcmHtmlIncludesServiceFactory',
        'Rcm\Service\LayoutManager'
        => 'Rcm\Factory\LayoutManagerFactory',
        \Rcm\Service\LocaleService::class
        => \Rcm\Factory\ServiceLocaleServiceFactory::class,
        'Rcm\Service\Logger'
        => 'Rcm\Factory\LoggerFactory',
        'Rcm\Service\PluginManager'
        => 'Rcm\Factory\PluginManagerFactory',
        'Rcm\Service\RcmUser'
        => 'Rcm\Factory\RcmUserFactory',
        \Rcm\Service\RedirectService::class
        => \Rcm\Factory\ServiceRedirectServiceFactory::class,
        'Rcm\Service\ResponseHandler'
        => 'Rcm\Factory\ResponseHandlerFactory',
        'Rcm\Service\SessionMgr'
        => 'Rcm\Factory\SessionManagerFactory',
        \Rcm\Service\SiteService::class
        => \Rcm\Factory\ServiceSiteServiceFactory::class,
        'Rcm\Service\ZendLogger'
        => '\Rcm\Factory\ZendLogFactory',
        'Rcm\Service\ZendLogWriter'
        => '\Rcm\Factory\ZendLogWriterFactory',
        'Rcm\Validator\Page'
        => 'Rcm\Factory\PageValidatorFactory',
        'Rcm\Validator\PageTemplate'
        => 'Rcm\Factory\PageTemplateFactory',
        'Rcm\Validator\MainLayout'
        => 'Rcm\Factory\MainLayoutValidatorFactory',
    ],
    'invokables' => [
        'Rcm\Service\DisplayCountService' => 'Rcm\Service\DisplayCountService'
    ],
    'aliases' => [
        'rcmLogger' => 'Rcm\Service\Logger',
    ]
];
