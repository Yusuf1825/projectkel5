<?php

namespace App\Filament\Pages;

use App\Models\Jadwal;
use App\Models\Pesan;
use Filament\Pages\Page;

class Home extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.home';

    protected static ?string $title = 'Beranda';

    public $totalPesanan;
    public $totalRute;

    public function mount(): void
    {
        $this->totalPesanan = Pesan::count();
        $this->totalRute = Jadwal::count();
    }
}
