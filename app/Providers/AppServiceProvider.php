<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \Illuminate\Support\Facades\DB::beforeExecuting(function($query, $params) {
        //     Log::info('DB:' . $query . 'with params' . json_encode($params));
        //     //var_dump($query);
        //     //var_dump($params);
        // });

        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

        // function replaceCallback($matches) {
        //     $path_file = base_path('node_modules/' . $matches[0] . 'svg');

        //     if (file_exists($filePath)) {
        //         $fileContents = file_get_contents($filePath);
        //         return $fileContents;
        //     }

        //     return '';
        // }

        $blade->extend(function($value) {
            $value = preg_replace_callback('/<icon.*?name="(.*?)">/', function ($matches) {
                $path_file = base_path('node_modules/' . $matches[1] . '.svg');
    
                if (file_exists($path_file)) {
                    $fileContents = file_get_contents($path_file);
                    return $fileContents;
                }
    
                return '';
            }, $value);
            return $value;
        });
        
    }
}
