<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class RevenueChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'revenueChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Revenue per month';

    /**
     * Sort
     *
     * @var integer|null
     */
    protected static ?int $sort = 2;

    /**
     * Widget content height
     *
     * @var integer|null
     */
    protected static ?int $contentHeight = 275;

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'bar',
                'height' => 260,
                'parentHeightOffset' => 2,
                'stacked' => true,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Earning',
                    'data' => [270, 210, 180, 200, 250, 280, 250, 270, 150, 210, 180, 200]
                ],
                [
                    'name' => 'Expense',
                    'data' => [-140, -160, -180, -150, -100, -60, -80, -100, -180, -160, -180, -150]
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'horizontal' => false,
                    'columnWidth' => '50%',
                ],
            ],
            'dataLabels' => [
                'enabled' => false
            ],
            'legend' => [
                'show' => true,
                'horizontalAlign' => 'right',
                'position' => 'top',
                'fontFamily' => 'inherit',
                'markers' => [
                    'height' => 12,
                    'width' => 12,
                    'radius' => 12,
                    'offsetX' => -3,
                    'offsetY' => 2
                ],
                'itemMargin' => [
                    'horizontal' => 5
                ]
            ],
            'grid' => [
                'show' => false,

            ],
            'xaxis' => [
                'categories' => [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit'
                    ]
                ],
                'axisTicks' => [
                    'show' => false
                ],
                'axisBorder' => [
                    'show' => false
                ]
            ],
            'yaxis' => [
                'offsetX' => -16,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit'
                    ]
                ],
                'min' => -200,
                'max' => 300,
                'tickAmount' => 5,
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'vertical',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#d97706', '#c2410c'],
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'stroke' => [
                'curve' => 'smooth',
                'width' => 1,
                'lineCap' => 'round'
            ],
            'colors' => ['#f59e0b', '#ea580c'],
        ];
    }
}
