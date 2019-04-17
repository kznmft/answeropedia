<?php

class Validator_User__negative_signature__Test extends PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        $this->user = new User_Model();
        $this->user->setID(13);
        $this->user->setUsername('boris');
        $this->user->setName('Boris Bro');
        $this->user->email = 'steve@aw.org';
        $this->user->setPasswordHash('$2a$10$3f6bd68f206c46e04c8ecOVlP228zJXYjSbuVRiEMhoIWxjWkzcvy');
        $this->user->setAPIKey('4447243e3e1766375d23b06bf6dd1271');
    }

    protected function tearDown()
    {
        $this->user = null;
    }

    public function test_SignatureTooShort()
    {
        $this->user->setSignature('B');

        $this->expectExceptionMessage('User "signature" property "B" must have a length between 3 and 255');
        $this->assertEquals(true, User_Validator::validateExists($this->user));
    }

    public function test_SignatureTooLong()
    {
        $this->user->setSignature('My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name.');

        $this->expectExceptionMessage('User "signature" property "My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name. My Name." must have a length between 3 and 255');
        $this->assertEquals(true, User_Validator::validateExists($this->user));
    }
}
