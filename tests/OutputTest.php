<?php

namespace duncan3dc\SymfonyCLImateTests;

use duncan3dc\ObjectIntruder\Intruder;
use duncan3dc\SymfonyCLImate\Output;
use Mockery;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OutputTest extends \PHPUnit_Framework_TestCase
{
    private $output;
    private $console;

    public function setUp()
    {
        $this->console = Mockery::mock(ConsoleOutputInterface::class);
        $this->output = new Output($this->console);
    }


    public function tearDown()
    {
        Mockery::close();
    }


    public function testGetConsoleOutput()
    {
        $output = new Intruder(new Output);

        $console = $output->getConsoleOutput();
        $this->assertInstanceOf(ConsoleOutputInterface::class, $console);
    }


    public function testWrite1()
    {
        $this->console->shouldReceive("write")->once()->with("ok", false, OutputInterface::OUTPUT_NORMAL);
        $this->output->write("ok");
    }
    public function testWrite2()
    {
        $this->console->shouldReceive("write")->once()->with("ok", true, OutputInterface::OUTPUT_NORMAL);
        $this->output->write("ok", true);
    }
    public function testWrite3()
    {
        $this->console->shouldReceive("write")->once()->with("ok", true, OutputInterface::OUTPUT_PLAIN);
        $this->output->write("ok", true, OutputInterface::OUTPUT_PLAIN);
    }


    public function testWriteln1()
    {
        $this->console->shouldReceive("writeln")->once()->with("ok", OutputInterface::OUTPUT_NORMAL);
        $this->output->writeln("ok");
    }
    public function testWriteln2()
    {
        $this->console->shouldReceive("writeln")->once()->with("ok", OutputInterface::OUTPUT_PLAIN);
        $this->output->writeln("ok", OutputInterface::OUTPUT_PLAIN);
    }


    public function testSetVerbosity()
    {
        $this->console->shouldReceive("setVerbosity")->once()->with(7);
        $this->output->setVerbosity(7);
    }


    public function testGetVerbosity()
    {
        $this->console->shouldReceive("getVerbosity")->once()->with()->andReturn(8);
        $result = $this->output->getVerbosity();
        $this->assertSame(8, $result);
    }


    public function testSetFormatter()
    {
        $formatter = Mockery::mock(OutputFormatterInterface::class);

        $this->console->shouldReceive("setFormatter")->once()->with($formatter);
        $this->output->setFormatter($formatter);
    }


    public function testGetFormatter()
    {
        $this->console->shouldReceive("getFormatter")->once()->with()->andReturn("formatter");
        $result = $this->output->getFormatter();
        $this->assertSame("formatter", $result);
    }


    public function testIsQuiet()
    {
        $this->console->shouldReceive("isQuiet")->once()->with()->andReturn("quiet");
        $result = $this->output->isQuiet();
        $this->assertSame("quiet", $result);
    }


    public function testIsVerbose()
    {
        $this->console->shouldReceive("isVerbose")->once()->with()->andReturn("verbose");
        $result = $this->output->isVerbose();
        $this->assertSame("verbose", $result);
    }


    public function testIsVeryVerbose()
    {
        $this->console->shouldReceive("isVeryVerbose")->once()->with()->andReturn("very-verbose");
        $result = $this->output->isVeryVerbose();
        $this->assertSame("very-verbose", $result);
    }


    public function testIsDebug()
    {
        $this->console->shouldReceive("isDebug")->once()->with()->andReturn("debug");
        $result = $this->output->isDebug();
        $this->assertSame("debug", $result);
    }


    public function testSetDecorated()
    {
        $this->console->shouldReceive("setDecorated")->once()->with(7);
        $this->output->setDecorated(7);
    }


    public function testIsDecorated()
    {
        $this->console->shouldReceive("isDecorated")->once()->with()->andReturn("decorated");
        $result = $this->output->isDecorated();
        $this->assertSame("decorated", $result);
    }
}
