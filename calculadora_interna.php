<?php
$page_title = 'Calculadora Interna de Simulação';
// Impede a indexação da página por motores de busca
$extra_head = '<meta name="robots" content="noindex, nofollow">';
include 'includes/header.php';

// O array principal foi removido daqui porque toda a lógica de preços dinâmicos (ciclos e desconto)
// será gerenciada inteiramente pelo JavaScript na inicialização da página.
?>

<div class="bg-slate-900 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-2">Simulador Interno de Lucratividade</h1>
        <p class="text-slate-300">Ferramenta restrita para projeção de cenários baseada em franquias.</p>
    </div>
</div>

<section class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6 bg-white p-4 rounded-xl shadow-sm border border-slate-200">
            <div class="flex items-center bg-slate-100 p-1 rounded-lg">
                <button class="billing-btn px-4 py-2 text-sm font-semibold rounded-md bg-white text-blue-600 shadow-sm" data-billing="monthly">Mensal</button>
                <button class="billing-btn px-4 py-2 text-sm font-semibold rounded-md text-slate-600 hover:text-slate-900 transition-colors" data-billing="semiannual">Semestral</button>
                <button class="billing-btn px-4 py-2 text-sm font-semibold rounded-md text-slate-600 hover:text-slate-900 transition-colors" data-billing="annual">Anual</button>
            </div>
            
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="is_mentorado" class="sr-only peer calc-input-checkbox" onchange="updatePricingInputs()">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </div>
                    <span class="text-sm font-bold text-orange-600">Desconto Mentorado (10%)</span>
                </label>

                <button id="clearFieldsBtn" class="bg-slate-200 text-slate-700 hover:bg-slate-300 px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                    <i data-lucide="rotate-ccw" class="w-4 h-4 inline-block mr-1"></i> Resetar Padrão
                </button>
            </div>
        </div>
        <div class="grid lg:grid-cols-12 gap-8">
            <!-- Inputs -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Variáveis Globais -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Variáveis Globais</h2>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Custo API Triagem (R$)</label>
                            <input type="number" id="cost_api_triagem" value="0.50" step="0.01" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all calc-input text-right font-mono">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Custo API Completa (R$)</label>
                            <input type="number" id="cost_api_completa" value="2.00" step="0.01" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all calc-input text-right font-mono">
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Mix de Consumo (% em Triagem)</label>
                            <p class="text-xs text-slate-500 mb-2">Ex: 50% significa que metade do valor da franquia é gasto com Triagens e a outra metade com Completas.</p>
                            <input type="number" id="mix_triagem" value="50" step="1" max="100" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all calc-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Comissão de Vendas (%)</label>
                            <input type="number" id="commission_rate" value="5" step="0.1" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all calc-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Taxa de Consumo da Franquia (%)</label>
                            <p class="text-xs text-slate-500 mb-2">Uso médio. Se > 100%, gera receita excedente cobrada à parte.</p>
                            <input type="number" id="usage_rate" value="100" step="1" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all calc-input">
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <input type="checkbox" id="rollover_franchise" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500 calc-input-checkbox">
                            <label for="rollover_franchise" class="text-sm font-medium text-slate-700">Rolar Franquia Não Utilizada</label>
                        </div>
                        <p class="text-xs text-slate-500 italic mt-1">Se marcado, o saldo não usado acumula. A empresa pagará pela API equivalente a 100% da franquia vendida (mesmo se o uso no mês for menor).</p>
                    </div>
                </div>

                <!-- Usuários por Plano -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">Clientes e Planos</h2>
                    <div class="space-y-4">
                        <?php 
                        $plan_ids = ["starter" => "Starter", "growth" => "Growth", "business" => "Business", "enterprise" => "Enterprise"];
                        foreach ($plan_ids as $id => $name): 
                        ?>
                        <div class="border border-slate-100 p-4 rounded-xl bg-slate-50">
                            <div class="flex items-center justify-between mb-3">
                                <label class="block text-sm font-bold text-slate-800"><?php echo $name; ?></label>
                                <div class="w-24">
                                    <label class="block text-[10px] font-medium text-slate-500 mb-0.5">Nº Clientes</label>
                                    <input type="number" id="users_<?php echo $id; ?>" value="0" min="0" class="w-full px-2 py-1 border border-slate-300 rounded focus:ring-1 focus:ring-blue-500 outline-none transition-all calc-input text-right font-mono">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <label class="block text-[10px] font-medium text-slate-600 mb-1">Franquia (R$)</label>
                                    <input type="number" id="franquia_<?php echo $id; ?>" value="0" step="0.01" class="w-full px-2 py-1 border border-slate-300 rounded focus:ring-1 focus:ring-blue-500 outline-none calc-input text-right font-mono text-xs">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-medium text-slate-600 mb-1">Triagem (R$)</label>
                                    <input type="number" id="triagem_<?php echo $id; ?>" value="0" step="0.01" class="w-full px-2 py-1 border border-slate-300 rounded focus:ring-1 focus:ring-blue-500 outline-none calc-input text-right font-mono text-xs">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-medium text-slate-600 mb-1">Completa (R$)</label>
                                    <input type="number" id="completa_<?php echo $id; ?>" value="0" step="0.01" class="w-full px-2 py-1 border border-slate-300 rounded focus:ring-1 focus:ring-blue-500 outline-none calc-input text-right font-mono text-xs">
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Resultados -->
            <div class="lg:col-span-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 lg:sticky lg:top-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Projeção de Resultados</h2>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-blue-600 mb-1">Receita Bruta Mensal</div>
                            <div class="text-2xl font-bold text-slate-900 font-mono" id="res_revenue">R$ 0,00</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-xl border border-green-200 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-green-700 mb-1">Lucro Líquido Projetado</div>
                            <div class="text-2xl font-bold text-green-700 font-mono" id="res_profit">R$ 0,00</div>
                        </div>
                        <div class="bg-red-50 p-4 rounded-xl border border-red-100 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-red-600 mb-1">Custo Total</div>
                            <div class="text-xl font-bold text-slate-900 font-mono" id="res_costs">R$ 0,00</div>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-xl border border-purple-100 col-span-2 sm:col-span-1">
                            <div class="text-sm font-semibold text-purple-600 mb-1">Margem de Lucro (%)</div>
                            <div class="text-xl font-bold text-slate-900 font-mono" id="res_margin">0,00%</div>
                        </div>
                    </div>

                    <h3 class="font-bold text-slate-900 mb-4 border-b pb-2">Detalhamento Financeiro</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between border-b border-slate-100 pb-2">
                            <span class="text-slate-600">Total de Clientes Ativos:</span>
                            <span class="font-bold text-slate-900" id="det_clients">0</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-2">
                            <span class="text-slate-600">Receita de Franquias Vendidas:</span>
                            <span class="font-bold text-slate-900 font-mono" id="det_franquias">R$ 0,00</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-2">
                            <span class="text-slate-600">Receita de Consultas Excedentes:</span>
                            <span class="font-bold text-green-600 font-mono" id="det_excedente">+ R$ 0,00</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-2">
                            <span class="text-slate-600">Total de Triagens (Estimado):</span>
                            <span class="font-bold text-slate-900" id="det_triagens">0</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-2">
                            <span class="text-slate-600">Total de Completas (Estimado):</span>
                            <span class="font-bold text-slate-900" id="det_completas">0</span>
                        </div>
                        <div class="flex justify-between text-red-600 border-b border-slate-100 pb-2 items-start">
                            <span id="label_cost_api">Custo com API:</span>
                            <span class="font-bold font-mono mt-0.5" id="det_cost_api">- R$ 0,00</span>
                        </div>
                        <div class="flex justify-between text-red-600">
                            <span>Custo com Comissões de Vendas:</span>
                            <span class="font-bold font-mono" id="det_cost_comm">- R$ 0,00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Função para aplicar desconto de 10%
    const applyDiscount = (val, isMentorado) => isMentorado ? val * 0.9 : val;

    const pricingMatrix = { 
        monthly: { 
            starter: { monthlyFee: 399, triage: 3.99, complete: 9.90 }, 
            growth: { monthlyFee: 799, triage: 3.79, complete: 9.41 }, 
            business: { monthlyFee: 1299, triage: 3.59, complete: 8.91 }, 
            enterprise: { monthlyFee: 2499, triage: 3.39, complete: 8.42 } 
        }, 
        semiannual: { 
            starter: { monthlyFee: 399, triage: 3.59, complete: 8.91 }, 
            growth: { monthlyFee: 799, triage: 3.41, complete: 8.46 }, 
            business: { monthlyFee: 1299, triage: 3.23, complete: 8.02 }, 
            enterprise: { monthlyFee: 2499, triage: 3.05, complete: 7.57 } 
        }, 
        annual: { 
            starter: { monthlyFee: 399, triage: 3.19, complete: 7.92 }, 
            growth: { monthlyFee: 799, triage: 3.03, complete: 7.52 }, 
            business: { monthlyFee: 1299, triage: 2.87, complete: 7.13 }, 
            enterprise: { monthlyFee: 2499, triage: 2.71, complete: 6.73 } 
        } 
    };

    let currentBillingCycle = 'monthly';

    function updatePricingInputs() {
        const isMentorado = document.getElementById('is_mentorado').checked;
        const plans = pricingMatrix[currentBillingCycle];

        for (const [id, data] of Object.entries(plans)) {
            document.getElementById(`franquia_${id}`).value = data.monthlyFee;
            document.getElementById(`triagem_${id}`).value = applyDiscount(data.triage, isMentorado).toFixed(2);
            document.getElementById(`completa_${id}`).value = applyDiscount(data.complete, isMentorado).toFixed(2);
        }
        calculate();
    }

    document.querySelectorAll('.billing-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            document.querySelectorAll('.billing-btn').forEach(b => {
                b.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
                b.classList.add('text-slate-600');
            });
            e.target.classList.remove('text-slate-600');
            e.target.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
            
            currentBillingCycle = e.target.dataset.billing;
            updatePricingInputs();
        });
    });

    const inputs = document.querySelectorAll('.calc-input');
    const checkboxes = document.querySelectorAll('.calc-input-checkbox');
    const clearBtn = document.getElementById('clearFieldsBtn');
    
    // Valores padrão
    const defaultValues = {
        'cost_api_triagem': '0.50',
        'cost_api_completa': '2.00',
        'mix_triagem': '50',
        'commission_rate': '5',
        'usage_rate': '100',
        'rollover_franchise': false,
        'users_starter': '0',
        'users_growth': '0',
        'users_business': '0',
        'users_enterprise': '0'
    };

    const formatMoney = (value) => new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(value);
    const formatNumber = (value) => new Intl.NumberFormat('pt-BR').format(value);

    const calculate = () => {
        const costApiTriagem = parseFloat(document.getElementById('cost_api_triagem').value) || 0;
        const costApiCompleta = parseFloat(document.getElementById('cost_api_completa').value) || 0;
        const mixTriagem = parseFloat(document.getElementById('mix_triagem').value) || 0;
        const commissionRate = parseFloat(document.getElementById('commission_rate').value) || 0;
        const usageRate = parseFloat(document.getElementById('usage_rate').value) || 0;
        const rollover = document.getElementById('rollover_franchise').checked;
        
        let totalRevenue = 0;
        let totalClients = 0;
        let totalFranquias = 0;
        let totalExcedente = 0;
        let totalTriagens = 0;
        let totalCompletas = 0;

        const planIds = ['starter', 'growth', 'business', 'enterprise'];
        
        planIds.forEach(id => {
            const users = parseInt(document.getElementById(`users_${id}`).value) || 0;
            const franquia = parseFloat(document.getElementById(`franquia_${id}`).value) || 0;
            const priceTriagem = parseFloat(document.getElementById(`triagem_${id}`).value) || 1;
            const priceCompleta = parseFloat(document.getElementById(`completa_${id}`).value) || 1;
            
            const planRevenueFranquia = users * franquia;
            const planConsumedValue = planRevenueFranquia * (usageRate / 100);
            const planExcedente = Math.max(0, planConsumedValue - planRevenueFranquia);
            
            totalClients += users;
            totalFranquias += planRevenueFranquia;
            totalExcedente += planExcedente;
            totalRevenue += planRevenueFranquia + planExcedente;

            // Salvar no localStorage
            localStorage.setItem(`calc_users_${id}`, users);
            localStorage.setItem(`calc_franquia_${id}`, franquia);
            localStorage.setItem(`calc_triagem_${id}`, priceTriagem);
            localStorage.setItem(`calc_completa_${id}`, priceCompleta);

            // Calcular consultas consumidas para API
            const billableValue = rollover ? Math.max(planRevenueFranquia, planConsumedValue) : planConsumedValue;
            if (users > 0) {
                const valueTriagem = billableValue * (mixTriagem / 100);
                const valueCompleta = billableValue * ((100 - mixTriagem) / 100);
                
                totalTriagens += valueTriagem / priceTriagem;
                totalCompletas += valueCompleta / priceCompleta;
            }
        });

        localStorage.setItem('calc_cost_api_triagem', document.getElementById('cost_api_triagem').value);
        localStorage.setItem('calc_cost_api_completa', document.getElementById('cost_api_completa').value);
        localStorage.setItem('calc_mix_triagem', document.getElementById('mix_triagem').value);
        localStorage.setItem('calc_commission_rate', document.getElementById('commission_rate').value);
        localStorage.setItem('calc_usage_rate', document.getElementById('usage_rate').value);
        localStorage.setItem('calc_rollover_franchise', rollover);

        const apiCost = (totalTriagens * costApiTriagem) + (totalCompletas * costApiCompleta);
        const commissionCost = totalRevenue * (commissionRate / 100);
        
        const totalCost = apiCost + commissionCost;
        const profit = totalRevenue - totalCost;
        const margin = totalRevenue > 0 ? (profit / totalRevenue) * 100 : 0;

        document.getElementById('res_revenue').textContent = formatMoney(totalRevenue);
        document.getElementById('res_profit').textContent = formatMoney(profit);
        
        const profitEl = document.getElementById('res_profit');
        if (profit < 0) {
            profitEl.className = 'text-2xl font-bold font-mono text-red-600';
        } else if (profit > 0) {
            profitEl.className = 'text-2xl font-bold font-mono text-green-700';
        } else {
            profitEl.className = 'text-2xl font-bold font-mono text-slate-900';
        }

        document.getElementById('res_costs').textContent = formatMoney(totalCost);
        document.getElementById('res_margin').textContent = margin.toFixed(2).replace('.', ',') + '%';

        document.getElementById('det_clients').textContent = formatNumber(totalClients);
        document.getElementById('det_franquias').textContent = formatMoney(totalFranquias);
        document.getElementById('det_excedente').textContent = '+ ' + formatMoney(totalExcedente);
        document.getElementById('det_triagens').textContent = formatNumber(Math.round(totalTriagens));
        document.getElementById('det_completas').textContent = formatNumber(Math.round(totalCompletas));
        
        const apiCostLabel = document.getElementById('label_cost_api');
        if (rollover) {
            apiCostLabel.innerHTML = 'Custo com API (Rolagem Ativa): <span class="block text-xs font-normal text-slate-500">Considera custo de 100% da franquia vendida</span>';
        } else {
            apiCostLabel.innerHTML = 'Custo com API: <span class="block text-xs font-normal text-slate-500">Considera apenas o saldo consumido</span>';
        }
        
        document.getElementById('det_cost_api').textContent = '- ' + formatMoney(apiCost);
        document.getElementById('det_cost_comm').textContent = '- ' + formatMoney(commissionCost);
    };

    const loadData = () => {
        inputs.forEach(input => {
            const saved = localStorage.getItem(`calc_${input.id}`);
            if (saved !== null) {
                input.value = saved;
            } else if (defaultValues[input.id] !== undefined) {
                input.value = defaultValues[input.id];
            }
        });

        checkboxes.forEach(checkbox => {
            const saved = localStorage.getItem(`calc_${checkbox.id}`);
            if (saved !== null) {
                checkbox.checked = saved === 'true';
            } else if (defaultValues[checkbox.id] !== undefined) {
                checkbox.checked = defaultValues[checkbox.id];
            }
        });
        
        // Se houver planos salvos mas não no defaultValues, carrega. Senão, updatePricingInputs() fará o trabalho inicial.
        updatePricingInputs();
    };

    clearBtn.addEventListener('click', () => {
        if(confirm('Tem certeza que deseja resetar a simulação para os valores padrão?')) {
            inputs.forEach(input => {
                input.value = defaultValues[input.id] !== undefined ? defaultValues[input.id] : '0';
                localStorage.removeItem(`calc_${input.id}`);
            });
            checkboxes.forEach(checkbox => {
                checkbox.checked = defaultValues[checkbox.id] !== undefined ? defaultValues[checkbox.id] : false;
                localStorage.removeItem(`calc_${checkbox.id}`);
            });
            
            // Reseta o ciclo e toggle
            document.getElementById('is_mentorado').checked = false;
            document.querySelector('[data-billing="monthly"]').click();
            
            calculate();
        }
    });

    inputs.forEach(input => input.addEventListener('input', calculate));
    checkboxes.forEach(checkbox => checkbox.addEventListener('change', calculate));

    loadData();
});
</script>

<?php include 'includes/footer.php'; ?>