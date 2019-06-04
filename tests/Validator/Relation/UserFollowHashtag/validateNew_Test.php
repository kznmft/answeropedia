<?php

class UserFollowCategory_Relation_Validator__validateNew__Test extends PHPUnit\Framework\TestCase
{
    public function test__FullParams__OK()
    {
        $relation = new UserFollowCategory_Relation_Model();
        $relation->userID = 3;
        $relation->categoryID = 9;
        $relation->createdAt = '2015-11-29 09:28:34';

        $this->assertEquals(true, UserFollowCategory_Relation_Validator::validateNew($relation));
    }

    public function test__MinParams__OK()
    {
        $relation = new UserFollowCategory_Relation_Model();
        $relation->userID = 3;
        $relation->categoryID = 9;

        $this->assertEquals(true, UserFollowCategory_Relation_Validator::validateNew($relation));
    }
}
