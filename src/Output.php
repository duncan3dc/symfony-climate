<?php

namespace duncan3dc\SymfonyCLImate;

use League\CLImate\CLImate;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Output class that allows all the functionality of CLImate,
 * whilst also allowing standard OutputInterface behaviour.
 *
 * @method CLImate highlight(string $str = null)
 */
class Output extends CLImate implements OutputInterface
{
    /** @var ConsoleOutputInterface|null */
    private $console;


    /**
     * @inheritdoc
     */
    public function __construct(ConsoleOutputInterface $console = null)
    {
        parent::__construct();

        $this->style->addCommand("error", ["background_red", "white"]);
        $this->style->addCommand("highlight", ["background_cyan", "black"]);

        if ($console) {
            $this->console = $console;
        }
    }


    /**
     * Get the ConsoleOutput object we are mimicking.
     *
     * @return ConsoleOutputInterface
     */
    private function getConsoleOutput(): ConsoleOutputInterface
    {
        if (!$this->console) {
            $this->console = new ConsoleOutput();
        }

        return $this->console;
    }


    /**
     * @param string|iterable<string> $messages The message as an iterable of strings or a single string
     *
     * @return void
     */
    public function write($messages, $newline = false, $type = OutputInterface::OUTPUT_NORMAL)
    {
        $this->getConsoleOutput()->write($messages, $newline, $type);
    }


    /**
     * @param string|iterable<string> $messages The message as an iterable of strings or a single string
     *
     * @return void
     */
    public function writeln($messages, $type = OutputInterface::OUTPUT_NORMAL)
    {
        $this->getConsoleOutput()->writeln($messages, $type);
    }


    /**
     * @param int $level
     *
     * @return void
     */
    public function setVerbosity($level)
    {
        $this->getConsoleOutput()->setVerbosity($level);
    }


    /**
     * @inheritdoc
     */
    public function getVerbosity()
    {
        return $this->getConsoleOutput()->getVerbosity();
    }


    /**
     * @return void
     */
    public function setFormatter(OutputFormatterInterface $formatter)
    {
        $this->getConsoleOutput()->setFormatter($formatter);
    }


    /**
     * @inheritdoc
     */
    public function getFormatter()
    {
        return $this->getConsoleOutput()->getFormatter();
    }


    /**
     * @inheritdoc
     */
    public function isQuiet()
    {
        return $this->getConsoleOutput()->isQuiet();
    }


    /**
     * @inheritdoc
     */
    public function isVerbose()
    {
        return $this->getConsoleOutput()->isVerbose();
    }


    /**
     * @inheritdoc
     */
    public function isVeryVerbose()
    {
        return $this->getConsoleOutput()->isVeryVerbose();
    }


    /**
     * @inheritdoc
     */
    public function isDebug()
    {
        return $this->getConsoleOutput()->isDebug();
    }


    /**
     * @param bool $decorated
     *
     * @return void
     */
    public function setDecorated($decorated)
    {
        $this->getConsoleOutput()->setDecorated($decorated);
    }


    /**
     * @inheritdoc
     */
    public function isDecorated()
    {
        return $this->getConsoleOutput()->isDecorated();
    }
}
