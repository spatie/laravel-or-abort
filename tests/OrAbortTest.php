<?php

namespace Spatie\OrAbort\Test;

include __DIR__ . '/abort.php';

class OrAbortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestClass
     */
    protected $testClass;

    public function setUp()
    {
        $this->testClass = new TestClass();
    }

    /**
     * @test
     */
    public function it_will_return_the_value_if_the_original_method_returns_a_value()
    {
        $this->assertEquals('string', $this->testClass->returnStringOrAbort());
        $this->assertEquals('first', $this->testClass->singleParameterOrAbort('first'));
        $this->assertEquals('firstsecond', $this->testClass->multipleParametersOrAbort('first', 'second'));
    }

    /**
     * @test
     */
    public function it_will_abort_if_the_original_method_returns_null()
    {
        $this->assertEquals('aborted-404', $this->testClass->returnNullOrAbort());
        $this->assertEquals('aborted-404', $this->testClass->singleParameterReturnsNullOrAbort('firstParameter'));
        $this->assertEquals('aborted-404', $this->testClass->multipleParametersReturnsNullOrAbort('first', 'second'));
    }

    /**
     * @test
     */
    public function it_will_abort_with_the_given_code_if_the_original_method_returns_null()
    {
        $this->assertEquals('aborted-500', $this->testClass->returnNullOrAbort(500));
        $this->assertEquals('aborted-500', $this->testClass->singleParameterReturnsNullOrAbort('firstParameter', 500));
        $this->assertEquals('aborted-500', $this->testClass->multipleParametersReturnsNullOrAbort('first', 'second', 500));
    }





}
