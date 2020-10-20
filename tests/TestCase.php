<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    //just for fun, don't blame please
    public function testPrint()
    {
        print_r("\nTESTING " . class_basename($this) . " NOW :  \n");
        $methods = get_class_methods($this);
        $methods[array_search('testPrint', $methods)] = 'uselessValueLOL';
        array_map(
            fn(string $method) => !Str::startsWith($method, 'test')
                ?: print_r("\n testing " . $method . "() ... \n")
            , $methods);
        print_r("\n TEST DONE. \n");
        print_r("==============================================");
    }
}
