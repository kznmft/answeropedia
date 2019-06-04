<?php

class Query_Search_searchCategories_base_Test extends Abstract_DB_TestCase
{
    protected $setUpDB = ['ru' => ['categories']];

    public function test_SearchWithTwoResults_Ok()
    {
        $categories = (new Search_Query('ru'))->searchCategories('фото');

        $this->assertEquals(2, count($categories));

        $this->assertEquals(16, $categories[0]->id);
        $this->assertEquals('фотография', $categories[0]->title);

        $this->assertEquals(17, $categories[1]->id);
        $this->assertEquals('фотосинтез', $categories[1]->title);
    }

    public function test_One_letter_search()
    {
        $categories = (new Search_Query('ru'))->searchCategories('а');

        $this->assertEquals(10, count($categories));

        $this->assertEquals(1, $categories[0]->id);
        $this->assertEquals('Русская литература', $categories[0]->title);
    }
}
