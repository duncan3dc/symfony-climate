<?php

namespace duncan3dc\SymfonyCLImateTests;

use duncan3dc\ObjectIntruder\Intruder;
use duncan3dc\SymfonyCLImate\Output;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OutputTest extends TestCase
{
    /** @var Output */
    private $output;

    /** @var ConsoleOutputInterface|MockInterface */
    private $console;


    public function setUp(): void
    {
        $this->console = Mockery::mock(ConsoleOutputInterface::class);
        $this->output = new Output($this->console);
    }


    public function tearDown(): void
    {
        Mockery::close();
    }


    public function testGetConsoleOutput(): void
    {
        $output = new Intruder(new Output());

        $console = $output->getConsoleOutput();
        $this->assertInstanceOf(ConsoleOutputInterface::class, $console);
    }


    public function testWrite1(): void
    {
        $this->console->shouldReceive("write")->once()->with("ok", false, OutputInterface::OUTPUT_NORMAL);
        $this->output->write("ok");
        $this->assertTrue(true);
    }


    public function testWrite2(): void
    {
        $this->console->shouldReceive("write")->once()->with("ok", true, OutputInterface::OUTPUT_NORMAL);
        $this->output->write("ok", true);
        $this->assertTrue(true);
    }


    public function testWrite3(): void
    {
        $this->console->shouldReceive("write")->once()->with("ok", true, OutputInterface::OUTPUT_PLAIN);
        $this->output->write("ok", true, OutputInterface::OUTPUT_PLAIN);
        $this->assertTrue(true);
    }


    public function testWriteln1(): void
    {
        $this->console->shouldReceive("writeln")->once()->with("ok", OutputInterface::OUTPUT_NORMAL);
        $this->output->writeln("ok");
        $this->assertTrue(true);
    }


    public function testWriteln2(): void
    {
        $this->console->shouldReceive("writeln")->once()->with("ok", OutputInterface::OUTPUT_PLAIN);
        $this->output->writeln("ok", OutputInterface::OUTPUT_PLAIN);
        $this->assertTrue(true);
    }


    public function testSetVerbosity(): void
    {
        $this->console->shouldReceive("setVerbosity")->once()->with(32);
        $this->output->setVerbosity(32);
        $this->assertTrue(true);
    }


    public function testGetVerbosity(): void
    {
        $this->console->shouldReceive("getVerbosity")->once()->with()->andReturn(8);
        $result = $this->output->getVerbosity();
        $this->assertSame(8, $result);
    }


    public function testSetFormatter(): void
    {
        $formatter = Mockery::mock(OutputFormatterInterface::class);

        $this->console->shouldReceive("setFormatter")->once()->with($formatter);
        $this->output->setFormatter($formatter);
        $this->assertTrue(true);
    }


    public function testGetFormatter(): void
    {
        $formatter = Mockery::mock(OutputFormatterInterface::class);
        $this->console->shouldReceive("getFormatter")->once()->with()->andReturn($formatter);
        $result = $this->output->getFormatter();
        $this->assertSame($formatter, $result);
    }


    public function testIsQuiet1(): void
    {
        $this->console->shouldReceive("isQuiet")->once()->with()->andReturn(false);
        $result = $this->output->isQuiet();
        $this->assertSame(false, $result);
    }


    public function testIsQuiet2(): void
    {
        $this->console->shouldReceive("isQuiet")->once()->with()->andReturn(true);
        $result = $this->output->isQuiet();
        $this->assertSame(true, $result);
    }


    public function testIsVerbose1(): void
    {
        $this->console->shouldReceive("isVerbose")->once()->with()->andReturn(false);
        $result = $this->output->isVerbose();
        $this->assertSame(false, $result);
    }


    public function testIsVerbose2(): void
    {
        $this->console->shouldReceive("isVerbose")->once()->with()->andReturn(true);
        $result = $this->output->isVerbose();
        $this->assertSame(true, $result);
    }


    public function testIsVeryVerbose1(): void
    {
        $this->console->shouldReceive("isVeryVerbose")->once()->with()->andReturn(false);
        $result = $this->output->isVeryVerbose();
        $this->assertSame(false, $result);
    }


    public function testIsVeryVerbose2(): void
    {
        $this->console->shouldReceive("isVeryVerbose")->once()->with()->andReturn(true);
        $result = $this->output->isVeryVerbose();
        $this->assertSame(true, $result);
    }


    public function testIsDebug1(): void
    {
        $this->console->shouldReceive("isDebug")->once()->with()->andReturn(true);
        $result = $this->output->isDebug();
        $this->assertSame(true, $result);
    }


    public function testIsDebug2(): void
    {
        $this->console->shouldReceive("isDebug")->once()->with()->andReturn(false);
        $result = $this->output->isDebug();
        $this->assertSame(false, $result);
    }


    public function testSetDecorated1(): void
    {
        $this->console->shouldReceive("setDecorated")->once()->with(true);
        $this->output->setDecorated(true);
        $this->assertTrue(true);
    }


    public function testSetDecorated2(): void
    {
        $this->console->shouldReceive("setDecorated")->once()->with(false);
        $this->output->setDecorated(false);
        $this->assertTrue(true);
    }


    public function testIsDecorated1(): void
    {
        $this->console->shouldReceive("isDecorated")->once()->with()->andReturn(true);
        $result = $this->output->isDecorated();
        $this->assertSame(true, $result);
    }


    public function testIsDecorated2(): void
    {
        $this->console->shouldReceive("isDecorated")->once()->with()->andReturn(false);
        $result = $this->output->isDecorated();
        $this->assertSame(false, $result);
    }
}
