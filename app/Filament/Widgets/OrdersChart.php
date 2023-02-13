<?php

namespace App\Filament\Widgets;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class OrdersChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'ordersChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Orders per month';

    /**
     * Sort
     *
     * @var integer|null
     */
    protected static ?int $sort = 3;

    /**
     * Widget content height
     *
     * @var integer|null
     */
    protected static ?int $contentHeight = 280;

    /**
     * Filter Form
     *
     * @return array
     */
    protected function getFormSchema(): array
    {
        return [

            Radio::make('ordersChartType')
                ->default('bar')
                ->options([
                    'line' => 'Line',
                    'bar' => 'Col',
                    'area' => 'Area'
                ])
                ->inline(true)
                ->label('Type'),

            Grid::make()
                ->schema([
                    Toggle::make('ordersChartMarkers')
                        ->default(false)
                        ->label('Markers'),

                    Toggle::make('ordersChartGrid')
                        ->default(false)
                        ->label('Grid'),
                ]),

            TextInput::make('ordersChartAnnotations')
                ->required()
                ->numeric()
                ->default(7500)
                ->label('Annotations'),
        ];
    }

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $filters = $this->filterFormData;

        return [
            'chart' => [
                'type' => $filters['ordersChartType'],
                'height' => 270,
                'toolbar' => [
                    'show' => false
                ]
            ],
            'series' => [
                [
                    'name' => 'Orders per month',
                    'data' => [2433, 3454, 4566, 2342, 5545, 5765, 6787, 8767, 7565, 8576, 9686, 8996],
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 2,
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit'
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit'
                    ],
                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'vertical',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#fbbf24'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],

            'dataLabels' => [
                'enabled' => false,
            ],
            'grid' => [
                'show' => $filters['ordersChartGrid']
            ],
            'markers' => [
                'size' => $filters['ordersChartMarkers'] ? 3 : 0
            ],
            'tooltip' => [
                'enabled' => true
            ],
            'stroke' => [
                'width' => $filters['ordersChartType'] === 'line' ? 4 : 0
            ],
            'colors' => ['#f59e0b'],
            'annotations' => [
                'yaxis' => [
                    [
                        'y' => $filters['ordersChartAnnotations'],
                        'borderColor' => '#ef4444',
                        'borderWidth' => 1,
                        'label' => [
                            'borderColor' => '#ef4444',
                            'style' => [
                                'color' => '#fffbeb',
                                'background' => '#ef4444',
                            ],
                            'text' => 'Annotation: ' . $filters['ordersChartAnnotations'],
                        ],
                    ],
                ],
            ],
        ];
    }
}
