<?php
$page_title = 'Calculadora de Comissões (Start & Growth)';
// Impede a indexação da página por motores de busca
$extra_head = '
<meta name="robots" content="noindex, nofollow">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
';
include 'includes/header.php';
?>

<div class="bg-slate-900 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-2">Simulador de Comissões e Lucratividade</h1>
        <p class="text-slate-300">Projeção de comissionamento híbrido para Vendedores e % MRR para Gerência.</p>
    </div>
</div>

<section class="py-12 bg-slate-50 min-h-screen" x-data="commissionCalc()">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <!-- Header Controls -->
        <div class="flex flex-col sm:flex-row items-center justify-end gap-4 mb-6 bg-white p-4 rounded-xl shadow-sm border border-slate-200">
            <button @click="resetDefaults()" class="bg-slate-200 text-slate-700 hover:bg-slate-300 px-4 py-2 rounded-lg text-sm font-semibold transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                Resetar Padrão
            </button>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">
            <!-- Inputs -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Clientes e Planos -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Volume de Clientes</h2>
                    
                    <div class="space-y-5">
                        <!-- Start -->
                        <div class="border border-slate-100 p-4 rounded-xl bg-slate-50">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <label class="block text-sm font-bold text-slate-800">Plano Start</label>
                                    <span class="text-xs text-slate-500">R$ <span x-text="planStartPrice"></span>/mês (API Est: R$ <span x-text="costApiStart.toFixed(2).replace('.', ',')"></span>)</span>
                                </div>
                                <div class="w-24">
                                    <input type="number" x-model.number="clientsStart" min="0" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all text-right font-mono font-bold text-lg">
                                </div>
                            </div>
                            <input type="range" x-model.number="clientsStart" min="0" max="500" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                        </div>

                        <!-- Growth -->
                        <div class="border border-slate-100 p-4 rounded-xl bg-slate-50">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <label class="block text-sm font-bold text-slate-800">Plano Growth</label>
                                    <span class="text-xs text-slate-500">R$ <span x-text="planGrowthPrice"></span>/mês (API Est: R$ <span x-text="costApiGrowth.toFixed(2).replace('.', ',')"></span>)</span>
                                </div>
                                <div class="w-24">
                                    <input type="number" x-model.number="clientsGrowth" min="0" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all text-right font-mono font-bold text-lg">
                                </div>
                            </div>
                            <input type="range" x-model.number="clientsGrowth" min="0" max="500" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                        </div>
                    </div>
                </div>

                <!-- Parâmetros de Comissão -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Parâmetros de Comissão</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Vendedor: Bônus de Fechamento (%)</label>
                            <p class="text-xs text-slate-500 mb-2">Pago apenas na 1ª mensalidade (Upfront).</p>
                            <div class="relative">
                                <input type="number" x-model.number="upfrontPct" step="1" max="100" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all pr-8">
                                <span class="absolute right-3 top-2.5 text-slate-400 font-bold">%</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Vendedor: Comissão Recorrente (%)</label>
                            <p class="text-xs text-slate-500 mb-2">Pago a partir da 2ª mensalidade.</p>
                            <div class="relative">
                                <input type="number" x-model.number="recRepPct" step="0.1" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all pr-8">
                                <span class="absolute right-3 top-2.5 text-slate-400 font-bold">%</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Gerente: Comissão sobre Faturamento (%)</label>
                            <p class="text-xs text-slate-500 mb-2">Sobre todo o MRR da equipe.</p>
                            <div class="relative">
                                <input type="number" x-model.number="recMgrPct" step="0.1" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all pr-8">
                                <span class="absolute right-3 top-2.5 text-slate-400 font-bold">%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resultados -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 lg:sticky lg:top-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Projeção Mensal Recorrente (MRR)</h2>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-blue-600 mb-1">Faturamento (MRR)</div>
                            <div class="text-2xl font-bold text-slate-900 font-mono" x-text="formatMoney(mrr)"></div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-xl border border-green-200 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-green-700 mb-1">Lucro Líquido Projetado</div>
                            <div class="text-2xl font-bold text-green-700 font-mono" x-text="formatMoney(netProfit)"></div>
                        </div>
                        <div class="bg-red-50 p-4 rounded-xl border border-red-100 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-red-600 mb-1">Custo API + Comissões</div>
                            <div class="text-xl font-bold text-slate-900 font-mono" x-text="formatMoney(totalRecCosts)"></div>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-xl border border-purple-100 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-purple-600 mb-1">Margem de Lucro (%)</div>
                            <div class="text-xl font-bold text-slate-900 font-mono" x-text="formatPct(margin)"></div>
                        </div>
                    </div>

                    <h3 class="font-bold text-slate-900 mb-4 border-b pb-2">Detalhamento da Operação Recorrente</h3>
                    <div class="space-y-3 text-sm mb-8">
                        <div class="flex justify-between border-b border-slate-100 pb-2">
                            <span class="text-slate-600">Total de Clientes Ativos:</span>
                            <span class="font-bold text-slate-900" x-text="totalClients"></span>
                        </div>
                        <div class="flex justify-between text-red-600 border-b border-slate-100 pb-2">
                            <span>Custos Estimados de API (100% de Uso):</span>
                            <span class="font-bold font-mono" x-text="'- ' + formatMoney(totalApiCost)"></span>
                        </div>
                        <div class="flex justify-between text-red-600 border-b border-slate-100 pb-2">
                            <span>Comissão Vendedor (Recorrente):</span>
                            <span class="font-bold font-mono" x-text="'- ' + formatMoney(recCommissionRep)"></span>
                        </div>
                        <div class="flex justify-between text-red-600 border-b border-slate-100 pb-2">
                            <span>Comissão Gerente (Recorrente):</span>
                            <span class="font-bold font-mono" x-text="'- ' + formatMoney(recCommissionMgr)"></span>
                        </div>
                    </div>

                    <h3 class="font-bold text-slate-900 mb-4 border-b pb-2">Aquisição de Novos Clientes (1º Mês)</h3>
                    <div class="bg-orange-50 p-4 rounded-xl border border-orange-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-orange-800 font-medium text-sm">Custo de Aquisição (CAC) por novo contrato:</span>
                            <span class="font-bold text-orange-700 font-mono text-lg" x-text="formatMoney(cacPerClient)"></span>
                        </div>
                        <p class="text-xs text-orange-600">
                            Baseado no bônus upfront de <strong x-text="upfrontPct + '%'"></strong>. Este valor substitui a comissão recorrente no primeiro mês e serve para recompensar a entrada do cliente. O lucro do primeiro mês cai proporcionalmente a este bônus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function commissionCalc() {
    return {
        // Inputs de Clientes
        clientsStart: 50,
        clientsGrowth: 50,
        
        // Preços Fixos
        planStartPrice: 399,
        planGrowthPrice: 799,
        
        // Custos Estimados de API
        costApiStart: 65.30,
        costApiGrowth: 137.60,

        // Parâmetros de Comissão
        upfrontPct: 40,
        recRepPct: 5,
        recMgrPct: 2,

        // Formatadores
        formatMoney(value) {
            return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(value);
        },
        formatPct(value) {
            return value.toFixed(2).replace('.', ',') + '%';
        },

        // Getters (Computeds)
        get totalClients() {
            return this.clientsStart + this.clientsGrowth;
        },
        get mrr() {
            return (this.clientsStart * this.planStartPrice) + (this.clientsGrowth * this.planGrowthPrice);
        },
        get totalApiCost() {
            return (this.clientsStart * this.costApiStart) + (this.clientsGrowth * this.costApiGrowth);
        },
        get recCommissionRep() {
            return this.mrr * (this.recRepPct / 100);
        },
        get recCommissionMgr() {
            return this.mrr * (this.recMgrPct / 100);
        },
        get totalRecCosts() {
            return this.totalApiCost + this.recCommissionRep + this.recCommissionMgr;
        },
        get netProfit() {
            return this.mrr - this.totalRecCosts;
        },
        get margin() {
            return this.mrr > 0 ? (this.netProfit / this.mrr) * 100 : 0;
        },
        get totalUpfront() {
            return this.mrr * (this.upfrontPct / 100);
        },
        get cacPerClient() {
            return this.totalClients > 0 ? this.totalUpfront / this.totalClients : 0;
        },

        // Actions
        resetDefaults() {
            this.clientsStart = 50;
            this.clientsGrowth = 50;
            this.upfrontPct = 40;
            this.recRepPct = 5;
            this.recMgrPct = 2;
        }
    }
}
</script>

<?php include 'includes/footer.php'; ?>