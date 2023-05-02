<?php

namespace App\Console\Commands;

use App\Http\Controllers\UniteRankingController;
use Illuminate\Console\Command;

class ActualizarPuntosSemanalesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'puntos:actualizar-semanales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar los puntos semanales de los usuarios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new UniteRankingController();
        $controller->actualizarPuntosSemanales();
    }
}
