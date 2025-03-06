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
 * @method CLImate highlight(?string $str = null)
 */
class Output extends CLImate implements OutputInterface
{
    /** @var ConsoleOutputInterface|null */
    private $console;


    public function __construct(?ConsoleOutputInterface $console = null)
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
    public function write($messages, bool $newline = false, int $type = OutputInterface::OUTPUT_NORMAL): void
    {
        $this->getConsoleOutput()->write($messages, $newline, $type);
    }


    /**
     * @param string|iterable<string> $messages The message as an iterable of strings or a single string
     *
     * @return void
     */
    public function writeln($messages, int $type = OutputInterface::OUTPUT_NORMAL): void
    {
        $this->getConsoleOutput()->writeln($messages, $type);
    }


    public function setVerbosity(int $level): void
    {
        $this->getConsoleOutput()->setVerbosity($level);
    }


    public function getVerbosity(): int
    {
        return $this->getConsoleOutput()->getVerbosity();
    }


    public function setFormatter(OutputFormatterInterface $formatter): void
    {
        $this->getConsoleOutput()->setFormatter($formatter);
    }


    public function getFormatter(): OutputFormatterInterface
    {
        return $this->getConsoleOutput()->getFormatter();
    }


    public function isQuiet(): bool
    {
        return $this->getConsoleOutput()->isQuiet();
    }


    public function isVerbose(): bool
    {
        return $this->getConsoleOutput()->isVerbose();
    }


    public function isVeryVerbose(): bool
    {
        return $this->getConsoleOutput()->isVeryVerbose();
    }


    public function isDebug(): bool
    {
        return $this->getConsoleOutput()->isDebug();
    }


    public function setDecorated(bool $decorated): void
    {
        $this->getConsoleOutput()->setDecorated($decorated);
    }


    public function isDecorated(): bool
    {
        return $this->getConsoleOutput()->isDecorated();
    }
}
