<x-filament-panels::page>
    <div class="text-2xl mb-4">Selamat Datang <span class="font-semibold underline">{{ auth()->user()->name }}</span>
        di
        Dashboard</div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-filament::card>
            <div class="text-center">
                <div class="text-lg font-semibold">Total Pesanan</div>
                <div class="text-4xl font-bold text-blue-600">{{ $this->totalPesanan }}</div>
            </div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-center">
                <div class="text-lg font-semibold">Jumlah Rute</div>
                <div class="text-4xl font-bold text-green-600">{{ $this->totalRute }}</div>
            </div>
        </x-filament::card>
    </div>

    @livewire(\App\Filament\Widgets\PesanChart::class)
</x-filament-panels::page>
