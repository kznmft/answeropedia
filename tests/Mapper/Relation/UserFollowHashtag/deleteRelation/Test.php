<?php

class UserFollowCategory_Relation_Mapper__deleteRelation__Test extends Abstract_DB_TestCase
{
    protected $setUpDB = ['ru' => ['er_users_follow_categories']];

    public function test__FullParams__OK()
    {
        // Relation must be in DB
        $relation = new UserFollowCategory_Relation_Model();
        $relation->id = 6;
        $relation->userID = 2;
        $relation->categoryID = 16;
        $relation->createdAt = '2014-12-16 11:28:56';

        $deleted = (new UserFollowCategory_Relation_Mapper('ru'))->deleteRelation($relation);

        $this->assertEquals(true, $deleted);
    }

    public function test__RelationNotExists()
    {
        // Not exists relation
        $relation = new UserFollowCategory_Relation_Model();
        $relation->id = 6;
        $relation->userID = 22;
        $relation->categoryID = 61;
        $relation->createdAt = '2014-12-16 11:28:56';

        $this->expectExceptionMessage('UserFollowCategory relation not deleted');
        $deleted = (new UserFollowCategory_Relation_Mapper('ru'))->deleteRelation($relation);
    }
}
