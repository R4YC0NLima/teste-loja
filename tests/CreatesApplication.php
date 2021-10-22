<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Hash;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $createApp = function() {
            $app = require __DIR__.'/../bootstrap/app.php';
            $app->make(Kernel::class)->bootstrap();
            Hash::driver('bcrypt')->setRounds(4);
            return $app;
        };

        $createApp();

        $this->clearCache();

        return $createApp();
    }

    protected function clearCache()
    {
        $commands = ['clear-compiled', 'cache:clear', 'view:clear', 'config:clear', 'route:clear'];
        foreach ($commands as $command) {
            \Illuminate\Support\Facades\Artisan::call($command);
        }
    }
}
