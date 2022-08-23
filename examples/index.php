<?php

/**
 * AmChartsPHP
 * 
 * @link      http://github.com/neeckeloo/AmChartsPHP
 * @copyright Copyright (c) 2012 Nicolas Eeckeloo
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

use AmCharts\Chart,
    AmCharts\Graph,
    AmCharts\Manager;
use AmCharts\Graph\Bullet;

$manager = Manager::getInstance();
$manager->setJsIncluded(true);
$manager->setLoadJQuery(true);
$dataProvider = Chart\DataProvider\Factory::fromFile(__DIR__ . '/data.xml');

$serial = new Chart\Serial();
$serial->setDataProvider($dataProvider);

$serial->setCategoryField('country')
    ->setStartDuration(1);

$serial->categoryAxis()
    ->setGridPosition('start')
    ->setLabelRotation(45)
    ->setGridAlpha(0)
    ->setFillAlpha(100);

$serial->valueAxis()
    ->setDashLength(5)
    ->setAxisAlpha(0)
    ->title()->setValue('Visitors from country');

$serialGraph = new Graph\Column();
$serialGraph
    ->fields()
    ->setValueField('visits')
    ->setXField('x')
    ->setYField('y')
    ->setColorField('color');
$serialGraph
    ->setFillAlphas(100)
    ->setLineAlpha(0)
    ->setBalloonText('[[country]]: [[visits]]');
$serial->addGraph($serialGraph);

// -------------------------------------------------------------------------------------------------------
$radar = new Chart\Radar();
$radar->setDataProvider($dataProvider);

$radar->setCategoryField('country')
    ->setSequencedAnimation(true)
    ->setStartDuration(2);


$raderGraph = new Graph\Column();
$raderGraph
    ->fields()
    ->setValueField('visits')
    ->setXField('x')
    ->setYField('y')
    ->setColorField('color');
$raderGraph
    ->setFillAlphas(100)
    ->setLineAlpha(100)
    ->setBalloonText('[[country]]: [[visits]]');

$radar->addGraph($raderGraph);

// -------------------------------------------------------------------------------------------------------

$pie = new Chart\Pie();
$pie->setDataProvider($dataProvider);

$pie->setTitleField('country')
    ->setValueField('visits')
    ->setSequencedAnimation(true)
    ->setStartDuration(2)
    ->setInnerRadius(30)
    ->setLabelRadius(15)
    ->set3D(15, 10);

// -------------------------------------------------------------------------------------------------------

$bubble = new Chart\XY();
$bubble->setDataProvider($dataProvider);

$bubbleGraph = new Graph\Column();
$bubbleGraph
    ->fields()
    ->setValueField('visits')
    ->setXField('x')
    ->setYField('y')
    ->setColorField('color');
$bubbleGraph->setFillAlphas(0)
    ->setLineAlpha(0)
    ->setBalloonText('[[country]]: [[visits]]');

$bubbleGraph->bullet()->setType(Bullet::ROUND);

$bubble
    ->setCategoryField('country')
    ->setSequencedAnimation(true)
    ->setStartDuration(2);

$bubble->addGraph($bubbleGraph);
// -------------------------------------------------------------------------------------------------------

echo "
    <style>
    .item {
        width:100%;
        float:left;
    }
    </style>
    <div class='item'>
        <h1>Bar</h1>
        {$serial->render()}
    </div>
    <div class='item'>
        <h1>Pie</h1>
        {$pie->render()}
    </div>
    <div class='item'>
        <h1>Radar</h1>
        {$radar->render()}
    </div>
    <div class='item'>
        <h1>Bubble</h1>
        {$bubble->render()}
    </div>
";
