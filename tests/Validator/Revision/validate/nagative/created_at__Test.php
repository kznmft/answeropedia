<?php

class Validator_Revision__validate__negative__created_atTest extends PHPUnit\Framework\TestCase
{
    public function test__Wrong_type()
    {
        $revision = new Revision_Model();
        $revision->answerID = 11;
        $revision->opcodes = 'xyz';
        $revision->baseText = 'Ответ на вопрос про птиц.';
        $revision->userID = 14;
        $revision->createdAt = 1234;

        $this->expectExceptionMessage('Revision createdAt param 1234 must be a string');

        Revision_Validator::validate($revision);
    }
}