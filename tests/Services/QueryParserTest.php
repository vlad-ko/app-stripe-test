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
        $queryString = 'from[gt]2014-03-05&to[lte]2014-06-01&amount[gte]50&object=charge&description[like]this&but[not_like]that&value[ne]666';
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
            [
                'but',
                'not like',
                '%that%',
            ],
            [
                'value',
                '!=',
                '666',
            ],
        ];

        list($eloquentConditions, $aggregates) = $this->parser->parse($queryString)->convertToEloquent();
        $this->assertEquals($expected, $eloquentConditions);
        $this->assertEmpty($aggregates);
    }

    public function testConvertToEloquentWithAggregates()
    {
        //include aggregate values in query string
        $queryString = 'sum=amount';
        list($eloquentConditions, $aggregates) = $this->parser->parse($queryString)->convertToEloquent();
        $expected = [
            'function' => 'sum',
            'field' => 'amount'
        ];
        $this->assertEquals($expected, $aggregates);
    }
}
