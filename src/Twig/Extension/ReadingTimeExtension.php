<?php

namespace Keystone\ReadingTime\Twig\Extension;

use Keystone\ReadingTime\Calculator;
use Twig_Extension;
use Twig_SimpleFilter;
use Twig_SimpleFunction;

class ReadingTimeExtension extends Twig_Extension
{
    /**
     * @var Calculator
     */
    private $calculator;

    /**
     * @param Calculator $calculator
     */
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('reading_time', [$this->calculator, 'calculate']),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('reading_time', [$this->calculator, 'calculate']),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'reading_time';
    }
}
