<?php
$page_title = 'Planos e Preços';
include 'includes/header.php';

// Raw data for plans to allow calculations
$raw_plans = [
    ["name" => "Trial", "price" => 0, "credits" => 20, "highlight" => false, "custom" => true],
    ["name" => "Light", "price" => 147, "credits" => 40, "highlight" => false],
    ["name" => "Starter", "price" => 297, "credits" => 100, "highlight" => true],
    ["name" => "Growth", "price" => 597, "credits" => 250, "highlight" => true],
    ["name" => "Business", "price" => 1297, "credits" => 600, "highlight" => true],
    ["name" => "Professional", "price" => 2497, "credits" => 1400, "highlight" => false],
    ["name" => "Enterprise", "price" => 4997, "credits" => 3250, "highlight" => false],
];

// Helper to format currency
function formatMoney($val) {
    return 'R$ ' . number_format($val, 2, ',', '.');
}

// Calculate derived fields
$plans = array_map(function($plan) {
    // Default values
    $plan['display_price'] = formatMoney($plan['price']);
    $plan['display_credits'] = number_format($plan['credits'], 0, ',', '.');
    $plan['cost_per_credit'] = '-';
    $plan['additional_credit_cost'] = '-';

    // Logic for standard monthly plans
    if (!isset($plan['custom'])) {
        $cost = $plan['price'] / $plan['credits'];
        $plan['cost_per_credit'] = formatMoney($cost);
        $plan['additional_credit_cost'] = formatMoney($cost * 1.60); // +60%
    }
    
    // Specific overrides
    if ($plan['name'] === 'Trial') {
        $plan['display_credits'] = "20 (único)";
        $plan['cost_per_credit'] = "Grátis";
        $plan['additional_credit_cost'] = "-";
    }

    return $plan;
}, $raw_plans);

// Common features for all plans
$plan_features = [
    "Consultas Básicas e Completas de CPF/CNPJ",
    "Cheques sem fundo",
    "Protestos",
    "Titularidade de domínios/emails",
    "Busca endereço, Ref. Comerciais",
    "Buscas de processos judiciais"
];
?>

<div class="bg-slate-900 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Escolha o Plano Ideal</h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">
            Flexibilidade total: pague apenas pelo que usar ou escolha um pacote mensal com desconto progressivo.
        </p>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
      
        <!-- Features Included Section -->
        <div class="mb-16 text-center">
            <h2 class="text-2xl font-bold text-slate-900 mb-8">O que está incluso em todos os planos?</h2>
            <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto text-left">
                <?php foreach ($plan_features as $feature): ?>
                    <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow-sm border border-slate-100">
                        <div class="bg-green-100 text-green-600 p-2 rounded-full shrink-0">
                            <i data-lucide="check" class="w-4 h-4"></i>
                        </div>
                        <span class="text-slate-700 font-medium"><?php echo $feature; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="mt-6 text-slate-500 text-sm">
                * Todos os planos consomem créditos. A diferença está no preço do crédito e volume mensal.
            </p>
        </div>

        <!-- Call out for Trial -->
        <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 mb-12 text-center max-w-3xl mx-auto">
            <h3 class="text-xl font-bold text-blue-800 mb-2">Novo na CreditBiro?</h3>
            <p class="text-blue-600 mb-4">
                Comece com o plano <strong>Trial</strong> e ganhe <strong>20 créditos gratuitos</strong> válidos por 30 dias para testar todas as nossas consultas.
            </p>
            <a href="https://app.creditbiro.com.br/register" class="inline-block bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                Ativar Trial Grátis
            </a>
        </div>

        <div class="overflow-x-auto rounded-xl shadow-lg border border-slate-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm uppercase tracking-wide">
                        <th class="p-4 font-bold">Plano</th>
                        <th class="p-4 font-bold">Investimento Mensal</th>
                        <th class="p-4 font-bold">Créditos/Mês</th>
                        <th class="p-4 font-bold text-right">Custo por Crédito</th>
                        <th class="p-4 font-bold text-right">Crédito Adicional (+60%)</th>
                        <th class="p-4 font-bold text-center">Ação</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($plans as $plan): ?>
                        <tr class="hover:bg-slate-50 transition-colors <?php echo $plan['highlight'] ? 'bg-blue-50/30' : ''; ?>">
                            <td class="p-4">
                                <span class="font-bold <?php echo $plan['highlight'] ? 'text-blue-700 text-lg' : 'text-slate-900'; ?>">
                                    <?php echo $plan['name']; ?>
                                </span>
                                <?php if ($plan['name'] === 'Trial'): ?>
                                    <span class="ml-2 text-xs bg-green-100 text-green-700 py-1 px-2 rounded-full font-bold">Grátis</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-slate-700 font-medium"><?php echo $plan['display_price']; ?></td>
                            <td class="p-4 text-slate-700"><?php echo $plan['display_credits']; ?></td>
                            <td class="p-4 text-right font-mono text-slate-600 font-bold"><?php echo $plan['cost_per_credit']; ?></td>
                            <td class="p-4 text-right font-mono text-slate-500"><?php echo $plan['additional_credit_cost']; ?></td>
                            <td class="p-4 text-center">
                                <a href="<?php echo ($plan['name'] === 'Enterprise') ? '/contato.php' : 'https://app.creditbiro.com.br/register'; ?>" class="text-sm font-bold py-2 px-4 rounded-lg transition-colors inline-block <?php echo $plan['highlight'] ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-slate-200 text-slate-700 hover:bg-slate-300'; ?>">
                                    <?php echo ($plan['name'] === 'Enterprise') ? 'Falar com Consultor' : 'Assinar'; ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-sm text-slate-500 text-center">
            <p>* O plano Trial é limitado a um uso por CNPJ/CPF. Os créditos expiram em 30 dias.</p>
            <p>** Planos mensais possuem renovação automática. Cancele a qualquer momento.</p>
            <p>*** O valor do crédito adicional é aplicado para consultas excedentes ao pacote contratado.</p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
