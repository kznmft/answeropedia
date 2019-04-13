<?php

class Hashtag_URL_Trait__getURL__Test extends PHPUnit\Framework\TestCase
{
    public function test_en()
    {
        $topic = new Hashtag_Model;
        $topic->setTitle('foo');
        $topic->setID(12);

        $this->assertEquals('https://answeropedia.org/en/topic/12/foo', $topic->getURL('en'));
    }

    public function test_ru()
    {
        $topic = new Hashtag_Model;
        $topic->setTitle('дождь');
        $topic->setID(34);

        $this->assertEquals('https://answeropedia.org/ru/topic/34/dozhd', $topic->getURL('ru'));
    }

    public function test_ru_WithUnderline()
    {
        $topic = new Hashtag_Model;
        $topic->setTitle('проливной_дождь');
        $topic->setID(56);

        $this->assertEquals('https://answeropedia.org/ru/topic/56/prolivnoi-dozhd', $topic->getURL('ru'));
    }
}
