<?php

namespace Keystone\ReadingTime;

class ReadingTime
{
    private $seconds;
    private $wordCount;
    private $imageCount;

    public function __construct($seconds, $wordCount, $imageCount)
    {
        $this->seconds = $seconds;
        $this->wordCount = $wordCount;
        $this->imageCount = $imageCount;
    }

    public function getSeconds()
    {
        return $this->seconds;
    }

    public function getMinutes()
    {
        return (int) ceil($this->seconds / 60);
    }

    public function getWordCount()
    {
        return $this->wordCount;
    }

    public function getImageCount()
    {
        return $this->imageCount;
    }
}
