<?php

class Trait_Model_Relation_UserFollowQuestion__init_with_user_ID_and_question_ID__Test extends PHPUnit\Framework\TestCase
{
    public function test__BaseParams()
    {
        $rel = UserFollowQuestion_Relation_Model::init_with_user_ID_and_question_ID(3, 9);

        $this->assertEquals(null, $rel->id);
        $this->assertEquals(3, $rel->userID);
        $this->assertEquals(9, $rel->questionID);
        $this->assertEquals(null, $rel->createdAt);
    }
}