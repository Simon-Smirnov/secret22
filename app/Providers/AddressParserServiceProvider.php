<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Dadata\DadataClient;
use App\Services\AddressParser\DadataParser;
use App\Services\AddressParser\FakeParser;
use App\Services\AddressParser\ParserInterface;

class AddressParserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // $this->app->singleton(ParserInterface::class, function () {
        //     return new DadataParser( new DadataClient(config('dadata.token'), config('dadata.secret')));
        // });

        $this->app->singleton(ParserInterface::class, function () {
            return new FakeParser();
        });
    }

    public function boot(): void
    {
        //
    }
}
