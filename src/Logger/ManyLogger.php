<?php
namespace Juhara\ZzzLogger;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

/**
 * Logger class that duplicate log to one or more loggers
 *
 * @author Zamrony P. Juhara <zamronypj@yahoo.com>
 */
final class ManyLogger extends AbstractLogger
{
    /**
     * array of logger instance Psr/Log/LoggerInterface
     * @var array
     */
    private $loggers;

    /**
     * constructor
     * @param array $loggers  array of loggers
     */
    public function __construct(array $loggers = array())
    {
        $this->loggers = $loggers;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message, $context);
        }
    }

}
