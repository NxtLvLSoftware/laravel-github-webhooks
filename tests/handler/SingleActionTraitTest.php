<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use Illuminate\Http\Request;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\SingleAction;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\SingleSnakeCaseAction;
use nxtlvlsoftware\githubwebhooks\payload\ArrayPayload;
use nxtlvlsoftware\githubwebhooks\TestCase;

class SingleActionTraitTest extends TestCase
{
    /** @var \Illuminate\Http\Request|\PHPUnit\Framework\MockObject\MockObject */
    protected $request;

    public function setUp(): void
    {
        $this->request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->setMethods(['getContentType', 'getContent'])
            ->getMock();

        $this->request->expects($this->any())
            ->method('getContentType')
            ->willReturn('application/json');
    }

    /**
     * Make sure a single action method is detected.
     */
    public function test_detects_single_action_method(): void
    {
        (new SingleAction)->handle(new ArrayPayload($this->request));

        $this->assertTrue(SingleAction::$called);
    }

    /**
     * Make sure a single action method defined in snake_case is detected.
     */
    public function test_detects_single_snake_case_action_method(): void
    {
        (new SingleSnakeCaseAction)->handle(new ArrayPayload($this->request));

        $this->assertTrue(SingleSnakeCaseAction::$called);
    }
}