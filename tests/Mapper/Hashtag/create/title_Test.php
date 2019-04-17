<?php

class Mapper_Hashtag_create_title_Test extends Abstract_DB_TestCase
{
    protected $setUpDB = ['ru' => ['hashtags']];

    public function test_CreateWithEmptyTitle_throwException()
    {
        $hashtag = new Hashtag_Model();
        $hashtag->title = '';

        $this->expectExceptionMessage('Hashtag title param "" must have a length between 2 and 127');
        $hashtag = (new Hashtag_Mapper('ru'))->create($hashtag);
    }

    public function test_CreateWithTooShortTitle_throwException()
    {
        $hashtag = new Hashtag_Model();
        $hashtag->title = 'x';

        $this->expectExceptionMessage('Hashtag title param "x" must have a length between 2 and 127');
        $hashtag = (new Hashtag_Mapper('ru'))->create($hashtag);
    }

    public function test_CreateWithTooLongTitle_throwException()
    {
        $hashtag = new Hashtag_Model();
        $hashtag->title = 'title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title';

        $this->expectExceptionMessage('Hashtag title param "title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title_42_title" must have a length between 2 and 127');
        $hashtag = (new Hashtag_Mapper('ru'))->create($hashtag);
    }
}
