<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    public function tagsProvider(): array
    {
        return [
            [['personal'], 'personal'],
            [['personal', 'money', 'family'], 'personal, money, family'],
            [['personal', 'money', 'family'], 'personal | money | family'],
            [['personal', 'money', 'family'], 'personal,money,family'],
            [['personal', 'money', 'family'], 'personal ,money ,family'],
            [['personal', 'money', 'family'], 'personal, money ,family'],
            [['personal', 'money', 'family'], 'personal ! money ! family'],
        ];
    }

    /**
     * @test
     * @dataProvider tagsProvider
     */
    public function it_parses_tags($expected, $input)
    {
        $parser = new TagParser();

        $result = $parser->parse($input);

        $this->assertSame($expected, $result);
    }

//    protected TagParser $parser;
//
//    protected function setUp(): void
//    {
//        $this->parser = new TagParser();
//    }

//    /** @test */
//    public function it_parses_a_single_tag()
//    {
//        $result = $this->parser->parse('personal');
//        $expected = ['personal'];
//
//        $this->assertSame($expected, $result);
//    }

//    /** @test */
//    public function it_parses_a_comma_separated_list_of_tags()
//    {
//        $result = $this->parser->parse('personal, money, family');
//        $expected = ['personal', 'money', 'family'];
//
//        $this->assertSame($expected, $result);
//    }

//    /** @test */
//    public function it_parses_a_pipe_separated_list_of_tags()
//    {
//        $result = $this->parser->parse('personal | money | family');
//        $expected = ['personal', 'money', 'family'];
//
//        $this->assertSame($expected, $result);
//    }

//    /** @test */
//    public function spaces_are_optional()
//    {
//        $result = $this->parser->parse('personal,money,family');
//        $expected = ['personal', 'money', 'family'];
//
//        $this->assertSame($expected, $result);
//
//        $result = $this->parser->parse('personal ,money ,family');
//        $expected = ['personal', 'money', 'family'];
//
//        $this->assertSame($expected, $result);
//
//        $result = $this->parser->parse('personal, money ,family');
//        $expected = ['personal', 'money', 'family'];
//
//        $this->assertSame($expected, $result);
//    }
}