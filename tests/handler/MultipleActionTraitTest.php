<?php

namespace nxtlvlsoftware\githubwebhooks\handler;

use nxtlvlsoftware\githubwebhooks\handler\fixtures\MultipleActions;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\MultipleActionsNested;
use nxtlvlsoftware\githubwebhooks\handler\fixtures\MultipleSnakeCaseActions;
use nxtlvlsoftware\githubwebhooks\payload\ArrayPayload;
use nxtlvlsoftware\githubwebhooks\TestCase;

class MultipleActionTraitTest extends TestCase
{
    /**
     * Make sure only the specified action is called for a multiple action handler.
     */
    public function test_detects_multiple_action_methods(): void
    {
        $handler = new MultipleActions();

        $handler->handle((new ArrayPayload())->setRawPayload('{"action": "created"}'));
        $this->assertTrue(MultipleActions::$created);
        $this->assertFalse(MultipleActions::$updated);
        $this->assertFalse(MultipleActions::$deleted);

        $handler->handle((new ArrayPayload())->setRawPayload('{"action": "updated"}'));
        $this->assertTrue(MultipleActions::$created);
        $this->assertTrue(MultipleActions::$updated);
        $this->assertFalse(MultipleActions::$deleted);

        $handler->handle((new ArrayPayload())->setRawPayload('{"action": "deleted"}'));
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

        $handler->handle((new ArrayPayload())->setRawPayload('{"action": "created_snake_case"}'));
        $this->assertTrue(MultipleSnakeCaseActions::$created);
        $this->assertFalse(MultipleSnakeCaseActions::$updated);
        $this->assertFalse(MultipleSnakeCaseActions::$deleted);

        $handler->handle((new ArrayPayload())->setRawPayload('{"action": "updated_snake_case"}'));
        $this->assertTrue(MultipleSnakeCaseActions::$created);
        $this->assertTrue(MultipleSnakeCaseActions::$updated);
        $this->assertFalse(MultipleSnakeCaseActions::$deleted);

        $handler->handle((new ArrayPayload())->setRawPayload('{"action": "deleted_snake_case"}'));
        $this->assertTrue(MultipleSnakeCaseActions::$created);
        $this->assertTrue(MultipleSnakeCaseActions::$updated);
        $this->assertTrue(MultipleSnakeCaseActions::$deleted);
    }

    public function test_nested_multiple_action_key(): void
    {
        $handler = new MultipleActionsNested;

        $handler->handle((new ArrayPayload())->setRawPayload('{"this":{"is":{"a":{"nested":"action"}}}}'));
        $this->assertTrue(MultipleActionsNested::$action);
        $this->assertFalse(MultipleActionsNested::$anAction);

        $handler->handle((new ArrayPayload())->setRawPayload('{"this":{"is":{"a":{"nested":"anAction"}}}}'));
        $this->assertTrue(MultipleActionsNested::$action);
        $this->assertTrue(MultipleActionsNested::$anAction);
    }
}