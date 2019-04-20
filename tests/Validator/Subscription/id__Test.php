<?php

class Validator_Subscription__id__Test extends PHPUnit\Framework\TestCase
{
    public function test_IDEqualZero()
    {
        $s = new Subscription_Model();
        $s->id = 0;
        $s->questionID = 10;
        $s->email = 'loz@ba.com';

        $this->expectExceptionMessage('Subscription "id" property 0 must be greater than or equal to 1');
        Subscription_Validator::validateExists($s);
    }

    public function test__IDBelowZero()
    {
        $s = new Subscription_Model();
        $s->id = -1;
        $s->questionID = 19;
        $s->email = 'loz@ba.com';

        $this->expectExceptionMessage('Subscription "id" property -1 must be greater than or equal to 1');
        Subscription_Validator::validateExists($s);
    }
}
