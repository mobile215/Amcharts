<?php
/**
 * AmChartsPHP
 * 
 * @link      http://github.com/mobile215/AmChartsPHP
 * @copyright Copyright (c) 2012 Nicolas Eeckeloo
 */
namespace AmCharts\Chart\DataProvider\Reader;

interface ReaderInterface
{   
    public function fromFile($filename);
    
    public function fromString($string);
}