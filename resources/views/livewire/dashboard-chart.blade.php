<div class="bg-white p-6 rounded-xl shadow-lg">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Métricas Gerais</h2>
        <div>
            <select wire:model.live="period" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="7d">Últimos 7 dias</option>
                <option value="30d">Últimos 30 dias</option>
                <option value="12m">Últimos 12 meses</option>
            </select>
        </div>
    </div>

    <div id="chart" wire:ignore></div>

    <div></div>
    @script
    <script>
        // Importa a biblioteca de gráficos
        import ApexCharts from 'apexcharts';

        // Opções de configuração iniciais do gráfico
        const options = {
            chart: {
                type: 'line', // Tipo de gráfico (linha)
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Vendas (R$)',
                data: [] // Dados iniciais vazios
            }, {
                name: 'Novos Usuários',
                data: [] // Dados iniciais vazios
            }],
            xaxis: {
                categories: [] // Categorias do eixo X (datas)
            },
            stroke: {
                curve: 'smooth' // Linhas suavizadas
            },
            // ... outras opções de estilo
        };

        // Cria a instância do gráfico
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // Ouve o evento do Livewire para atualizar o gráfico
        document.addEventListener('livewire:initialized', () => {
            @this.on('chartDataUpdated', (event) => {
                // Atualiza os dados e categorias do gráfico com os novos valores
                chart.updateSeries([{
                    name: 'Vendas (R$)',
                    data: event[0].sales
                }, {
                    name: 'Novos Usuários',
                    data: event[0].users
                }]);

                chart.updateOptions({
                    xaxis: {
                        categories: event[0].categories
                    }
                });
            });
        });
    </script>
    @endscript
</div>
