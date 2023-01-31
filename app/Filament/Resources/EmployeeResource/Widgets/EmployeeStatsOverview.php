<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeStatsOverview extends BaseWidget
{    
    protected function getCards(): array
    {
    $ks = Country::where('country_code', 'KS')->withCount('employees')->first();
    $us = Country::where('country_code', 'US')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('KS Employees', $ks ? $ks->employees_count : 0),
            Card::make('US Employees', $us ? $us->employees_count : 0),
        ];
    }
}
