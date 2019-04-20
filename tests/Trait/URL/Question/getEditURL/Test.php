<?php

class Question_URL_Trait__getEditURL__Test extends PHPUnit\Framework\TestCase
{
    public function test_en()
    {
        $question = new Question_Model();
        $question->id = 12;

        $this->assertEquals('https://answeropedia.org/en/answer/12/edit', $question->getEditURL('en'));
    }

    public function test_ru()
    {
        $question = new Question_Model();
        $question->id = 7;

        $this->assertEquals('https://answeropedia.org/ru/answer/7/edit', $question->getEditURL('ru'));
    }
}
