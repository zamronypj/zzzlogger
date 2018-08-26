# ZzzLogger
Collection of PSR-3 LoggerInterface implementation.

# Requirement
- [PHP >= 5.3](https://php.net)
- [PSR-3 LoggerInterface](https://www.php-fig.org/psr/psr-3/)
- [Composer](https://getcomposer.org)

# Installation
Run through composer

    $ composer require juhara/zzzlogger

# Available LoggerInterface implementation

- `TeeLogger` [LoggerInterface][LoggerInterface] implementation that duplicate log
to two other loggers.
- `ManyLogger` [LoggerInterface][LoggerInterface] implementation that duplicate log
to many loggers.


# How to use

## TeeLogger class

Combine two different loggers as one logger. For example using [Monolog][Monolog] to log to file and [PHP Debug bar][Debugbar] to log to html page.

```
<?php
$monolog = new Monolog\Logger\Logger();
$debugbar = new \DebugBar\StandardDebugBar();
...
$teeLogger = new \Juhara\ZzzLogger\TeeLogger($monolog, $debugbar['messages']);
$teeLogger->info('hello world');
$teeLogger->warning('world climate change warning');
```

Daisy chain loggers to combine more than two loggers as one logger.

```
<?php
$teeLogger1 = new \Juhara\ZzzLogger\TeeLogger($logger1, $logger2);
$teeLogger = new \Juhara\ZzzLogger\TeeLogger($teeLogger1, $logger3);
$teeLogger->info('hello world');
$teeLogger->warning('world climate change warning');
```

## ManyLogger class

Combine many loggers as one logger.

```
<?php
$manyLogger = new \Juhara\ZzzLogger\ManyLogger([$logger1, $logger2, $logger3]);
$manyLogger->info('hello world');
$manyLogger->warning('world climate change warning');
```

# Contributing

If you have any improvement or issues please submit PR.

Thank you.

[LoggerInterface]:https://www.php-fig.org/psr/psr-3/#3-psrlogloggerinterface
[Monolog]:https://github.com/Seldaek/monolog
[Debugbar]:https://github.com/maximebf/php-debugbar
