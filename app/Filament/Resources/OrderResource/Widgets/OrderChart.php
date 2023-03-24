<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\LineChartWidget;
use App\Models\Order;
use DB;
use Flowframe\Trend\Trend;
class OrderChart extends LineChartWidget
{
    protected static ?string $heading = 'Orders';

    protected function getData(): array
    {
        $orderTrend = Trend::model(Order::class)
                            ->between(
                                start: now()->startOfYear(),
                                end  : now()->endOfYear()
                            )
                            ->perMonth()
                            ->count();
        // dd($orderTrend);=====
        return [
            'datasets' => [
                [
                    'label' => 'Order from customer',
                    'data' => $orderTrend->map(fn($value) => $value->aggregate),
                ],
            ],
            'labels' => $orderTrend->map(fn($value) => $value->date),
            // 'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
