<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Jobs\RefreshStock;

class TesteRefreshDataBaseSpot extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function execute()
    {
        RefreshStock::dispatch();
    }
}
