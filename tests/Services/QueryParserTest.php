<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Services\QueryParser;

class QueryParserTest extends TestCase
{
    protected $parser;

    public function setUp()
    {
        parent::setUp();
        $this->parser = new QueryParser;
    }

    /**
     * Test parsing of the URL query string
     * @return void
     */
    public function testConvertToEloquent()
    {
        //let's try parsing a string like this one
        $queryString = 'from[gt]2014-03-05&to[lte]2014-06-01&amount[gte]50&object=charge&description[like]this';
        $expected = [
            [
                'created',
                '>',
                '1393977600',
            ],
            [
                'created',
                '<=',
                '1401580800',
            ],
            [
                'amount',
                '>=',
                '50',
            ],
            [
                'object',
                '=',
                'charge',
            ],
            [
                'description',
                'like',
                '%this%',
            ],
        ];

        $eloquentConditions = $this->parser->parse($queryString)->convertToEloquent();
        $this->assertEquals($expected, $eloquentConditions);
    }
}
