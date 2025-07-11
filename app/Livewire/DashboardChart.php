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
    public function updateChartData()
    {
        // Lógica de exemplo para buscar dados do banco
        // Você precisará adaptar as tabelas e colunas para o seu banco de dados
        $salesData = DB::table('vendas')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(valor_total) as total'))
            ->where('created_at', '>=', $this->getStartDate())
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $usersData = DB::table('users')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
            ->where('created_at', '>=', $this->getStartDate())
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Prepara os dados no formato que o ApexCharts espera
        $this->chartData = [
            'sales' => $salesData->pluck('total')->toArray(),
            'users' => $usersData->pluck('total')->toArray(),
            'categories' => $salesData->pluck('date')->toArray(),
        ];

        // Dispara um evento para o JavaScript atualizar o gráfico com os novos dados
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