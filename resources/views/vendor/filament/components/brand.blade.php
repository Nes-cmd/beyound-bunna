@if (filled($brand = config('filament.brand')))
    <div @class([
        'text-xl font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        
    </div>
    <img src="{{ asset('customer/images/logo.svg')}}" alt="">
@endif
