<?php

class Model_User_id_Test extends PHPUnit\Framework\TestCase
{
    public function testFullParams()
    {
        $user = new User_Model();
        $user->id = 13;

        $this->assertEquals(13, $user->id);
    }
}
