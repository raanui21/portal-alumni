<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Redis;
use Predis\Command\Argument\Geospatial\ByRadius;
use Predis\Command\Argument\Geospatial\FromLonLat;
use Tests\TestCase;

class RedisTest extends TestCase
{
    public function testPing()
    {
        $response = Redis::command('ping');
        self::assertEquals('PONG', $response);
        $response = Redis::ping();
        self::assertEquals('PONG', $response);
    }

    public function testString()
    {
        Redis::setex('name', 2, 'komar');
        $response = Redis::get('name');
        self::assertEquals('komar', $response);

        sleep(5);

        $response = Redis::get('name');
        self::assertNull($response);
    }

    public function testList()
    {
        Redis::del('names');

        Redis::rpush('names', 'komar');
        Redis::rpush('names', 'olatunji');

        $response = Redis::lrange('names', 0, -1);
        self::assertEquals(['komar', 'olatunji'], $response);

        self::assertEquals('komar', Redis::lpop('names'));
        self::assertEquals('olatunji', Redis::lpop('names'));
    }

    public function testSet()
    {
        // no duplicate
        Redis::del('names');

        Redis::sadd('names', 'komar');
        Redis::sadd('names', 'komar');
        Redis::sadd('names', 'olatunji');
        Redis::sadd('names', 'olatunji');

        $response = Redis::smembers('names');
        sort($response); // Sort the actual response

        $expected = ['komar', 'olatunji'];
        sort($expected); // Sort the expected array

        self::assertEquals($expected, $response);
    }

    public function testSortedSet()
    {
        Redis::del('names');

        Redis::zadd('names', 100, 'komar');
        Redis::zadd('names', 85, 'kalolo');
        Redis::zadd('names', 95, 'olatunji');

        $response = Redis::zrange('names', 0, -1);
        self::assertEquals(['kalolo', 'olatunji', 'komar'], $response);
    }

    public function testHash()
    {
        Redis::del('user:1');

        Redis::hset('user:1', 'name', 'komar');
        Redis::hset('user:1', 'email', 'komar@test.com');
        Redis::hset('user:1', 'age', 100);

        $response = Redis::hgetall('user:1');
        self::assertEquals(
            [
                'name' => 'komar',
                'email' => 'komar@test.com',
                'age' => 100,
            ],
            $response,
        );
    }

    public function testGeoPoint()
    {
        Redis::del('sellers');

        Redis::geoadd('sellers', 110.376214, -7.770158, 'University A');
        Redis::geoadd('sellers', 110.373832, -7.770356, 'University B');

        $result = Redis::geodist('sellers', 'University A', 'University B', 'km');

        self::assertEquals(0.2634, $result);

        // $result = Redis::geosearch('sellers',new FromLonLat(110.375066,-7.770217),new ByRadius(5,'km'));
        // self::assertEquals(["University A", "University A"],$result);

        // Use GEORADIUS instead of GEOSEARCH
        $result = Redis::georadius('sellers', 110.375066, -7.770217, 5, 'km');

        // GEORADIUS might return elements in different order or duplicates, sort and unique them for comparison
        sort($result);
        $result = array_unique($result);

        self::assertEquals(['University A', 'University B'], $result);
    }

    public function testHyperLogLog()
    {
        // counter for unique value

        Redis::pfadd('visitors', 'komar', 'olatunji', 'setiawan', 'alip');
        Redis::pfadd('visitors', 'komar', 'asep', 'marcus', 'setiawan');
        Redis::pfadd('visitors', 'alip', 'olatunji', 'setiawan');

        $result = Redis::pfcount('visitors');
        self::assertEquals(6, $result);
    }

    public function testPipeLine()
    {
        Redis::pipeline(function ($pipeline) {
            $pipeline->setex('name', 2, 'marcus');
            $pipeline->setex('address', 2, 'rome');
        });

        $response = Redis::get('name');
        self::assertEquals('marcus', $response);

        $response = Redis::get('address');
        self::assertEquals('rome', $response);
    }

    public funvtion
}
