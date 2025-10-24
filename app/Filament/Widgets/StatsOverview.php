<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\RekomRequests;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPermohonan = RekomRequests::count();
        $menungguOperator = RekomRequests::where('status', 'menunggu_operator')->count();
        $menungguKepala = RekomRequests::where('status', 'menunggu_kepala')->count();
        $dipublikasikan = RekomRequests::where('status', 'dipublikasikan')->count();
        $ditolak = RekomRequests::whereIn('status', ['ditolak_operator', 'ditolak_kepala'])->count();

        return [
            Stat::make('Total Permohonan', $totalPermohonan)
                ->description('Total semua permohonan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart([7, 12, 15, 18, 22, 25, $totalPermohonan]),

            Stat::make('Menunggu Verifikasi', $menungguOperator)
                ->description('Perlu perhatian operator')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning')
                ->chart([2, 3, 4, 5, 6, 7, $menungguOperator]),

            Stat::make('Menunggu Approval', $menungguKepala)
                ->description('Menunggu persetujuan kepala')
                ->descriptionIcon('heroicon-m-eye')
                ->color('info')
                ->chart([1, 2, 3, 4, 5, 6, $menungguKepala]),

            Stat::make('Dipublikasikan', $dipublikasikan)
                ->description('Surat rekomendasi telah diterbitkan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([3, 5, 8, 12, 15, 18, $dipublikasikan]),

            Stat::make('Ditolak', $ditolak)
                ->description('Permohonan yang ditolak')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger')
                ->chart([1, 2, 2, 3, 4, 5, $ditolak]),
        ];
    }
}
