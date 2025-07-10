<?php

namespace App\Filament\Widgets;

use App\Models\Pesan;
use Filament\Widgets\ChartWidget;

class PesanChart extends ChartWidget
{
    protected static ?string $heading = 'Pesanan Bulan Ini';

    protected function getData(): array
    {
        $data = Pesan::selectRaw('DAY(tanggal) as day, COUNT(*) as total')
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $labels = [];
        $values = [];

        foreach ($data as $item) {
            $labels[] = 'Tanggal ' . $item->day;
            $values[] = $item->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pesanan',
                    'data' => $values,
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
