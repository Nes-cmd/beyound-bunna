<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User as ModelsUser;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
class User extends LineChartWidget
{
    protected static ?string $heading = 'Customers';
    protected function getData(): array
    {
        $orderTrend = Trend::model(ModelsUser::class)
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
