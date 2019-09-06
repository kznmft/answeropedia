<?php

class Sandbox_URL_Helper__get_without_answers_URL__Test extends PHPUnit\Framework\TestCase
{
    public function test_withoutPage()
    {
        $url = Sandbox_URL_Helper::get_without_answers_URL('ru');
        $this->assertEquals('https://answeropedia.org/ru/sandbox/without-answers', $url);
    }

    public function test_ru_1()
    {
        $url = Sandbox_URL_Helper::get_without_answers_URL('ru', 1);
        $this->assertEquals('https://answeropedia.org/ru/sandbox/without-answers', $url);
    }

    public function test_en_1()
    {
        $url = Sandbox_URL_Helper::get_without_answers_URL('en', 1);
        $this->assertEquals('https://answeropedia.org/en/sandbox/without-answers', $url);
    }

    public function test_13()
    {
        $url = Sandbox_URL_Helper::get_without_answers_URL('en', 13);
        $this->assertEquals('https://answeropedia.org/en/sandbox/without-answers?page=13', $url);
    }
}