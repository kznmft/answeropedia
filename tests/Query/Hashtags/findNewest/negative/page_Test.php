<?php

use PHPUnit\Framework\TestCase;

class Categories_Query__findNewest_page_Test extends TestCase
{
    public function testPageEqualZero()
    {
        $this->expectExceptionMessage('List "page" param 0 must be greater than or equal to 1');
        $categories = (new Categories_Query('ru'))->findNewest(0);
    }

    public function testPageBelowZero()
    {
        $this->expectExceptionMessage('List "page" param -1 must be greater than or equal to 1');
        $categories = (new Categories_Query('ru'))->findNewest(-1);
    }

    public function testPageGreaterThan9999()
    {
        $this->expectExceptionMessage('List "page" param 10000 must be less than or equal to 9999');
        $categories = (new Categories_Query('ru'))->findNewest(10000);
    }
}
