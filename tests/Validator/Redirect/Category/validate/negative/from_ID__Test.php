<?php

class Validator_Redirect_Category__validate__negative__from_IDTest extends PHPUnit\Framework\TestCase
{
    public function test__FromID_equal_zero()
    {
        $redirect = new Category_Redirect_Model();
        $redirect->from_ID = 0;
        $redirect->to_title = 'iPhone 8';

        $this->expectExceptionMessage('Category_Redirect_Model property "fromID" 0 must be greater than or equal to 1');
        Category_Redirect_Validator::validate($redirect);
    }

    public function test__FromID_below_zero()
    {
        $redirect = new Category_Redirect_Model();
        $redirect->from_ID = -1;
        $redirect->to_title = 'iPhone 8';

        $this->expectExceptionMessage('Category_Redirect_Model property "fromID" -1 must be greater than or equal to 1');
        Category_Redirect_Validator::validate($redirect);
    }
}