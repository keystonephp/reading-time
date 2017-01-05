<?php

namespace Keystone\ReadingTime;

class Calculator
{
    public function calculate($text)
    {
        $wordsPerMinute = 275;
        $maxImageSeconds = 12;
        $minImageSeconds = 3;

        // Count the number of words exluding tags
        $wordCount = str_word_count(strip_tags($text));
        $seconds = (int) ($wordCount / ($wordsPerMinute / 60));

        // Count the image tags
        $imageCount = substr_count($text, '<img ');
        for ($i = 0; $i < $imageCount; ++$i) {
            // Decrease the amount of time counted for each image
            $imageSeconds = $maxImageSeconds - $i;
            if ($imageSeconds < $minImageSeconds) {
                $imageSeconds = $minImageSeconds;
            }

            $seconds += $imageSeconds;
        }

        return new ReadingTime($seconds, $wordCount, $imageCount);
    }
}
