<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use Illuminate\Http\Request;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\MultipleActions;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\MultipleActionsNested;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\MultipleSnakeCaseActions;
use nxtlvlsoftware\githubwebhooks\payload\ArrayPayload;
use nxtlvlsoftware\githubwebhooks\TestCase;

class MultipleActionTraitTest extends TestCase
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
     * Make sure only the specified action is called for a multiple action handler.
     */
    public function test_detects_multiple_action_methods(): void
    {
        $handler = new MultipleActions();

        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"action": "created"}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleActions::$created);
        $this->assertFalse(MultipleActions::$updated);
        $this->assertFalse(MultipleActions::$deleted);

        $this->setUp();
        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"action": "updated"}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleActions::$created);
        $this->assertTrue(MultipleActions::$updated);
        $this->assertFalse(MultipleActions::$deleted);

        $this->setUp();
        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"action": "deleted"}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleActions::$created);
        $this->assertTrue(MultipleActions::$updated);
        $this->assertTrue(MultipleActions::$deleted);
    }

    /**
     * Make sure only the specified action is called for a snake case multiple action handler.
     */
    public function test_detect_multiple_snake_case_method(): void
    {
        $handler = new MultipleSnakeCaseActions;

        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"action": "created_snake_case"}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleSnakeCaseActions::$created);
        $this->assertFalse(MultipleSnakeCaseActions::$updated);
        $this->assertFalse(MultipleSnakeCaseActions::$deleted);

        $this->setUp();
        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"action": "updated_snake_case"}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleSnakeCaseActions::$created);
        $this->assertTrue(MultipleSnakeCaseActions::$updated);
        $this->assertFalse(MultipleSnakeCaseActions::$deleted);

        $this->setUp();
        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"action": "deleted_snake_case"}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleSnakeCaseActions::$created);
        $this->assertTrue(MultipleSnakeCaseActions::$updated);
        $this->assertTrue(MultipleSnakeCaseActions::$deleted);
    }

    public function test_nested_multiple_action_key(): void
    {
        $handler = new MultipleActionsNested;

        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"this":{"is":{"a":{"nested":"action"}}}}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleActionsNested::$action);
        $this->assertFalse(MultipleActionsNested::$anAction);

        $this->setUp();
        $this->request->expects($this->any())
            ->method('getContent')
            ->willReturn('{"this":{"is":{"a":{"nested":"anAction"}}}}');
        $handler->handle(new ArrayPayload($this->request));

        $this->assertTrue(MultipleActionsNested::$action);
        $this->assertTrue(MultipleActionsNested::$anAction);
    }
}