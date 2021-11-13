<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98d33d300270ee6169f9f6eaf1caf1eb
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sbc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sbc\\' => 
        array (
            0 => __DIR__ . '/..' . '/ludefreitas/php-classes/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'Rain\\Tpl' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl.php',
        'Rain\\Tpl\\Exception' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/Exception.php',
        'Rain\\Tpl\\IPlugin' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/IPlugin.php',
        'Rain\\Tpl\\NotFoundException' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/NotFoundException.php',
        'Rain\\Tpl\\Plugin' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/Plugin.php',
        'Rain\\Tpl\\PluginContainer' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/PluginContainer.php',
        'Rain\\Tpl\\Plugin\\ImageResize' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/Plugin/ImageResize.php',
        'Rain\\Tpl\\Plugin\\PathReplace' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/Plugin/PathReplace.php',
        'Rain\\Tpl\\SyntaxException' => __DIR__ . '/..' . '/rain/raintpl/library/Rain/Tpl/SyntaxException.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'Sbc\\DB\\Sql' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/DB/Sql.php',
        'Sbc\\Mailer' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Mailer.php',
        'Sbc\\Model' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model.php',
        'Sbc\\Model\\Atividade' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Atividade.php',
        'Sbc\\Model\\Cart' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Cart.php',
        'Sbc\\Model\\CartsTurmas' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/CartsTurmas.php',
        'Sbc\\Model\\Endereco' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Endereco.php',
        'Sbc\\Model\\Espaco' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Espaco.php',
        'Sbc\\Model\\Faixaetaria' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Faixaetaria.php',
        'Sbc\\Model\\Horario' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Horario.php',
        'Sbc\\Model\\Insc' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Insc.php',
        'Sbc\\Model\\InscStatus' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/InscStatus.php',
        'Sbc\\Model\\Local' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Local.php',
        'Sbc\\Model\\Modalidade' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Modalidade.php',
        'Sbc\\Model\\Pessoa' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Pessoa.php',
        'Sbc\\Model\\Saude' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Saude.php',
        'Sbc\\Model\\Sorteio' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Sorteio.php',
        'Sbc\\Model\\SorteioStatus' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/SorteioStatus.php',
        'Sbc\\Model\\StatusTemporada' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/StatusTemporada.php',
        'Sbc\\Model\\Temporada' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Temporada.php',
        'Sbc\\Model\\Turma' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/Turma.php',
        'Sbc\\Model\\TurmaStatus' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/TurmaStatus.php',
        'Sbc\\Model\\User' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/User.php',
        'Sbc\\Model\\UserStatus' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Model/UserStatus.php',
        'Sbc\\Page' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/Page.php',
        'Sbc\\PageAdmin' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/PageAdmin.php',
        'Sbc\\PageProf' => __DIR__ . '/..' . '/ludefreitas/php-classes/src/PageProf.php',
        'Slim\\Environment' => __DIR__ . '/..' . '/slim/slim/Slim/Environment.php',
        'Slim\\Exception\\Pass' => __DIR__ . '/..' . '/slim/slim/Slim/Exception/Pass.php',
        'Slim\\Exception\\RequestSlash' => __DIR__ . '/..' . '/slim/slim/Slim/Exception/RequestSlash.php',
        'Slim\\Exception\\Stop' => __DIR__ . '/..' . '/slim/slim/Slim/Exception/Stop.php',
        'Slim\\Http\\Headers' => __DIR__ . '/..' . '/slim/slim/Slim/Http/Headers.php',
        'Slim\\Http\\Request' => __DIR__ . '/..' . '/slim/slim/Slim/Http/Request.php',
        'Slim\\Http\\Response' => __DIR__ . '/..' . '/slim/slim/Slim/Http/Response.php',
        'Slim\\Http\\Util' => __DIR__ . '/..' . '/slim/slim/Slim/Http/Util.php',
        'Slim\\Log' => __DIR__ . '/..' . '/slim/slim/Slim/Log.php',
        'Slim\\LogWriter' => __DIR__ . '/..' . '/slim/slim/Slim/LogWriter.php',
        'Slim\\Middleware' => __DIR__ . '/..' . '/slim/slim/Slim/Middleware.php',
        'Slim\\Middleware\\ContentTypes' => __DIR__ . '/..' . '/slim/slim/Slim/Middleware/ContentTypes.php',
        'Slim\\Middleware\\Flash' => __DIR__ . '/..' . '/slim/slim/Slim/Middleware/Flash.php',
        'Slim\\Middleware\\MethodOverride' => __DIR__ . '/..' . '/slim/slim/Slim/Middleware/MethodOverride.php',
        'Slim\\Middleware\\PrettyExceptions' => __DIR__ . '/..' . '/slim/slim/Slim/Middleware/PrettyExceptions.php',
        'Slim\\Middleware\\SessionCookie' => __DIR__ . '/..' . '/slim/slim/Slim/Middleware/SessionCookie.php',
        'Slim\\Route' => __DIR__ . '/..' . '/slim/slim/Slim/Route.php',
        'Slim\\Router' => __DIR__ . '/..' . '/slim/slim/Slim/Router.php',
        'Slim\\Slim' => __DIR__ . '/..' . '/slim/slim/Slim/Slim.php',
        'Slim\\View' => __DIR__ . '/..' . '/slim/slim/Slim/View.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit98d33d300270ee6169f9f6eaf1caf1eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98d33d300270ee6169f9f6eaf1caf1eb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit98d33d300270ee6169f9f6eaf1caf1eb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit98d33d300270ee6169f9f6eaf1caf1eb::$classMap;

        }, null, ClassLoader::class);
    }
}
