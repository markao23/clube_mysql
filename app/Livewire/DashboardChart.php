<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB; // Para interagir com o banco

class DashboardChart extends Component
{
    // Propriedade para guardar o período do filtro selecionado (ex: '7d', '30d', '12m')
    public $period = '7d';

    // Propriedade para guardar os dados que serão enviados para o gráfico
    public $chartData;

    // O método 'mount' é como um construtor. Ele roda quando o componente é carregado.
    public function mount()
    {
        $this->updateChartData();
    }

    // Este método é chamado sempre que a propriedade 'period' muda (graças ao Livewire!)
    public function updatedPeriod()
    {
        $this->updateChartData();
    }

    // Função principal que busca os dados e prepara para o gráfico
    // Em app/Livewire/DashboardChart.php

public function updateChartData()
{
    $startDate = $this->getStartDate();
    // Define o formato da data para agrupar (dia ou mês)
    $dateFormat = $this->period === '12m' ? "%Y-%m" : "%Y-%m-%d";

    $salesData = DB::table('vendas')
        ->select(
            DB::raw("DATE_FORMAT(created_at, '$dateFormat') as date"),
            DB::raw('SUM(valor_total) as total')
        )
        ->where('created_at', '>=', $startDate)
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get()
        ->keyBy('date'); // keyBy('date') facilita a junção dos dados

    $usersData = DB::table('users')
        ->select(
            DB::raw("DATE_FORMAT(created_at, '$dateFormat') as date"),
            DB::raw('COUNT(*) as total')
        )
        ->where('created_at', '>=', $startDate)
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get()
        ->keyBy('date');

    // Gera um array com todas as datas/meses no período para evitar buracos no gráfico
    $periodDates = collect();
    $currentDate = $startDate->copy();
    while ($currentDate <= now()) {
        $periodDates->push($currentDate->format($this->period === '12m' ? 'Y-m' : 'Y-m-d'));
        if ($this->period === '12m') {
            $currentDate->addMonth();
        } else {
            $currentDate->addDay();
        }
    }

    // Preenche os dados, colocando 0 onde não houve registro
    $sales = $periodDates->map(fn($date) => $salesData->get($date)->total ?? 0);
    $users = $periodDates->map(fn($date) => $usersData->get($date)->total ?? 0);

    $this->chartData = [
        'sales' => $sales->values()->toArray(),
        'users' => $users->values()->toArray(),
        'categories' => $periodDates->toArray(),
    ];

    $this->dispatch('chartDataUpdated', $this->chartData);
}

    // Função auxiliar para calcular a data de início baseada no período
    private function getStartDate()
    {
        return match ($this->period) {
            '7d' => now()->subDays(7),
            '30d' => now()->subDays(30),
            '12m' => now()->subMonths(12),
            default => now()->subDays(7),
        };
    }

    public function render()
    {
        return view('livewire.dashboard-chart');
    }
}