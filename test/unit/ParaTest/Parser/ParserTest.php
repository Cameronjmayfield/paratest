<?php namespace ParaTest\Parser;

class ParserTest extends \TestBase
{
    /**
     * @expectedException   \InvalidArgumentException
     */
    public function testConstructorThrowsExceptionIfFileNotFound()
    {
        $parser = new Parser('/path/to/nowhere');
    }

    public function testPrefersClassByFileName()
    {
        $filename = FIXTURES . DS . 'special-classes' . DS . 'ParserTestClass.php';
        $parser = new Parser($filename);
        $this->assertEquals("ParserTestClass", $parser->getClass()->getName());
    }

    public function testClassFallsBackOnExisting()
    {
        $filename = FIXTURES . DS . 'special-classes' . DS . 'NameDoesNotMatch.php';
        $parser = new Parser($filename);
        $this->assertEquals("ParserTestClassFallsBack", $parser->getClass()->getName());
    }

}