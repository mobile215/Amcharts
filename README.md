AmChartsPHP
===========

AmChartsPHP is a library of PHP classes to generate AmCharts HTML5 charts.

AmChartsPHP provide an API to create easily different charts in your application from your data.

AmCharts web site : [http://www.amcharts.com](http://www.amcharts.com)
AmCharts examples : [http://www.amcharts.com/javascript-charts](http://www.amcharts.com/javascript-charts)

Requirements
------------

AmChartsPHP works with PHP 5.3 or later.

Installation via Composer
-----------------------

    composer require mobile215/amcharts

Usage
-----

### Setup AmCharts library

```php
<?php
$manager = \AmCharts\Manager::getInstance();
$manager->setAmChartsPath('./amcharts.js');
$manager->setJsIncluded(true);
$manager->setLoadJQuery(true);
```

### Create basic pie chart

```php
<?php
$pie = new Chart\Pie();
$pie->setDataProvider(array(
    array(
        'name' => 'Foo',
        'value' => 1
    ),
    array(
        'name' => 'Bar',
        'value' => 3
    ),
    array(
        'name' => 'Baz',
        'value' => 2
    )
));
$pie->setTitleField('name')
    ->setValueField('value');

echo $pie->render();
```

Running tests
-------------

The tests use PHPUnit

AmCharts original documentation
-------------------------------

[http://docs.amcharts.com/javascriptcharts](http://docs.amcharts.com/javascriptcharts)


 [1]: http://getcomposer.org/composer.phar
