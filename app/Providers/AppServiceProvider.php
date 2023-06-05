<?php

namespace App\Providers;

use App\Models\TrainingCategory;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                     ->label('Products')
                     ->icon('heroicon-s-shopping-cart'),
                NavigationGroup::make()
                    ->label('Orders')
                    ->icon('heroicon-s-trending-up')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Travel & Trainings')
                    ->icon('heroicon-s-switch-horizontal'),
                NavigationGroup::make()
                    ->label('Slider & Deal of day')
                    ->icon('heroicon-s-pencil'),
                NavigationGroup::make()
                    ->label('User & Roles')
                    ->icon('heroicon-s-user-group'),
                NavigationGroup::make()
                    ->label('Extras')
                    ->icon('heroicon-s-cog')
                    ->collapsed(),
            ]);
        });

        // $trainingCategories = TrainingCategory::with('trainings')->get();
        // $menus = \App\Models\MainCategory::with('subCategory')->get();
        // View::share(['menus' => $menus, 'trainingCategories' => $trainingCategories]);

    }
}
