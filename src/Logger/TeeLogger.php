<?php
namespace Juhara\ZzzLogger;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

/**
 * Logger class that duplicate log to two other loggers
 * similar like what tee command in linux.
 *
 * @author Zamrony P. Juhara <zamronypj@yahoo.com>
 */
final class TeeLogger extends AbstractLogger
{
    /**
     * first logger instance
     * @var Psr/Log/LoggerInterface
     */
    private $firstLogger;

    /**
     * second logger instance
     * @var Psr/Log/LoggerInterface
     */
    private $secondLogger;

    /**
     * constructor
     * @param LoggerInterface $firstLogger  first logger
     * @param LoggerInterface $secondLogger second logger
     */
    public function __construct(
        LoggerInterface $firstLogger,
        LoggerInterface $secondLogger
    ) {
        $this->firstLogger = $firstLogger;
        $this->secondLogger = $secondLogger;
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
        $this->firstLogger->log($level, $message, $context);
        $this->secondLogger->log($level, $message, $context);
    }

}
