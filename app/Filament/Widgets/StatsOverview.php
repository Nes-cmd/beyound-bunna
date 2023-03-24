<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Helper\DashboardDataFecher;

class StatsOverview extends BaseWidget
{

    protected function getCards(): array
    {
        $dashboardDataFecher = new DashboardDataFecher();
        $customerTrend = $dashboardDataFecher->totalCustomerTrend();
        $customers = Card::make('Total Customers', $customerTrend['total_customers'])
            ->description($customerTrend['new_customers'] . ' increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($customerTrend['monthly_data'])
            ->color('success');
        ///////////////////////  Orders trend   /////////////////////////////////////////////////////////////////////
        $orderTrend = $dashboardDataFecher->totalOrderTrend();
        $orders = Card::make('Total orders', $orderTrend['total_orders'])
            ->description($orderTrend['new_orders'] . ' increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($orderTrend['monthly_data'])
            ->color('danger');
        ///////////////////////  Transactions trend   /////////////////////////////////////////////////////////////////////
        $transactionsTrend = $dashboardDataFecher->totalTransactionTrend();
        $transactions = Card::make('Transaction', $transactionsTrend['total_txn'])
            ->chart($transactionsTrend['monthly_data'])
            ->color('primary');
        ///////////////////////  Products trend   /////////////////////////////////////////////////////////////////////
        $productTrend = $dashboardDataFecher->totatProductTrend();
        $products = Card::make('Total products', $productTrend['total_products'])
            ->chart($productTrend['monthly_data'])
            ->color('primary');
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        return [
            $customers,
            $orders,
            $transactions,
            $products
        ];
    }
}
