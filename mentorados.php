<!-- Deploy: PHP Stack Migration Complete -->
<?php
$page_title = 'Triagem de Crédito Inteligente';
include 'includes/header.php';

function formatMoney($val) {
    return 'R$ ' . number_format($val, 2, ',', '.');
}

$feature_groups = [
    [
        'title' => 'Consulta CNPJ',
        'stage' => 'Triagem',
        'icon' => 'building-2',
        'accent' => 'blue',
        'items' => [
            [
                'name' => 'Dados cadastrais',
                'description' => 'Valida CNPJ, razão social, situação cadastral na Receita, data de abertura, porte, natureza jurídica e endereço fiscal.'
            ],
            [
                'name' => 'Cheque sem fundo',
                'description' => 'Verifica registros de cheques devolvidos (CCF) vinculados à empresa no Banco Central.'
            ],
            [
                'name' => 'Secretária da Fazenda - Sintegra / Protestos Nacionais',
                'description' => 'Consulta inscrições estaduais na SEFAZ e títulos protestados em cartório — aponta inadimplência fiscal e comercial formalizada.'
            ],
            [
                'name' => 'Google Maps com localizacao da empresa',
                'description' => 'Visualização rápida do endereço no Google Maps para validação geográfica.'
            ],
            [
                'name' => 'Foto da fachada da empresa para confirmação de lastro',
                'description' => 'Imagens da fachada do estabelecimento para confirmar a existência física e o porte operacional.'
            ],
            [
                'name' => 'Vizinhos comerciais para conferencia',
                'description' => 'Identificação de estabelecimentos próximos para checagem e confirmação de endereço.'
            ],
            [
                'name' => 'Titular de Site e Email (dominios.com.br)',
                'description' => 'Verificação de registros de domínios na internet associados aos contatos.'
            ],
        ],
    ],
    [
        'title' => 'Consulta CNPJ',
        'stage' => 'Completa',
        'icon' => 'briefcase-business',
        'accent' => 'blue',
        'items' => [
            [
                'name' => 'Todos Items da Triagem',
                'description' => 'Inclui todos os items da etapa 1 de triagem e mais os items aqui mencionados.'
            ],
            [
                'name' => 'Processos judiciais',
                'description' => 'Busca ações cíveis, trabalhistas, tributárias e de recuperação judicial/falência vinculadas ao CNPJ.'
            ],
            [
                'name' => 'Indicadores financeiros',
                'description' => 'Faturamento estimado, endividamento, score empresarial e indicadores de saúde financeira da operação.'
            ],
            [
                'name' => 'Devedores do governo',
                'description' => 'Consulta CADIN, dívida ativa da União e certidões negativas de débito federais vinculadas ao CNPJ.'
            ],
            [
                'name' => 'SCR Bacen',
                'description' => 'Consulta ao Sistema de Informações de Créditos do Banco Central, revelando o nível de endividamento, histórico de pagamentos e risco de crédito consolidado.'
            ],
            [
                'name' => 'KYC e compliance da empresa e dos sócios',
                'description' => 'Análise de quadro societário, vínculos entre sócios, PEP, e checagem de integridade dos responsáveis legais.'
            ],
            [
                'name' => 'Restrições, sanções e listas internacionais',
                'description' => 'Mostra sinais reputacionais e regulatórios, incluindo apontamentos em listas internacionais.'
            ],
            [
                'name' => 'CEAF (Cadastro de Expulsões)',
                'description' => 'Lista da CGU de servidores federais demitidos, destituídos ou com aposentadoria cassada por infrações graves.'
            ],
            [
                'name' => 'BACEN',
                'description' => 'Cadastros mantidos pelo Banco Central, incluindo pessoas/instituições punidas e impedidos de operar no sistema financeiro.'
            ],
            [
                'name' => 'Acordo de Leniência',
                'description' => 'Acordos com CGU, CADE ou MPF onde a empresa admite envolvimento em irregularidades e colabora com investigações.'
            ],
            [
                'name' => 'CVM',
                'description' => 'Lista de pessoas e empresas que sofreram processos sancionadores ou inabilitações no mercado de capitais.'
            ],
            [
                'name' => 'CEPIM',
                'description' => 'Cadastro de entidades sem fins lucrativos (ONGs, OSCIPs) impedidas de celebrar convênios com o governo.'
            ],
            [
                'name' => 'CNEP (Empresas Punidas)',
                'description' => 'Reúne empresas sancionadas por atos de corrupção contra a administração pública nacional ou estrangeira.'
            ],
            [
                'name' => 'CEIS (Empresas Inidôneas)',
                'description' => 'Lista de empresas e pessoas restritas de participar de licitações ou celebrar contratos com a administração pública.'
            ],
            [
                'name' => 'TCU',
                'description' => 'Base de pessoas e empresas com contas julgadas irregulares ou inabilitadas para licitar com a administração federal.'
            ],
            [
                'name' => 'MTE (Trabalho e Emprego)',
                'description' => 'Cadastros de autuações trabalhistas, débitos e irregularidades fiscalizatórias mantidos pelo ministério.'
            ],
            [
                'name' => 'Trabalho Escravo ("Lista Suja")',
                'description' => 'Cadastro de Empregadores flagrados submetendo trabalhadores a condições análogas à escravidão.'
            ],
            [
                'name' => 'Certidão Negativa Ambiental',
                'description' => 'Áreas, propriedades e empresas embargadas por crimes ou infrações ambientais, impedindo atividade econômica.'
            ],
            [
                'name' => 'PEP (Pessoa Exposta Politicamente)',
                'description' => 'Identifica indivíduos em cargos públicos relevantes (últimos 5 anos) e familiares para due diligence reforçada.'
            ],
            [
                'name' => 'Processos com Assuntos Sensíveis',
                'description' => 'Busca processos de alto risco reputacional: corrupção, lavagem de dinheiro, crimes ambientais, tráfico, etc.'
            ],
        ],
    ],
    [
        'title' => 'Consulta CPF',
        'stage' => 'Triagem',
        'icon' => 'search',
        'accent' => 'blue',
        'items' => [
            [
                'name' => 'Dados cadastrais',
                'description' => 'Valida CPF, nome completo, data de nascimento, situação na Receita Federal e endereço vinculado.'
            ],
            [
                'name' => 'Restrições, sanções e listas internacionais',
                'description' => 'Consulta listas restritivas (PEP, OFAC, CSNU) e sanções internacionais — filtra riscos graves logo na primeira camada.'
            ],
            [
                'name' => 'Cheque sem fundo',
                'description' => 'Verifica registros de cheques devolvidos (CCF) no Banco Central, indicando histórico de inadimplência bancária.'
            ],
            [
                'name' => 'Google Maps com localização do endereço',
                'description' => 'Visualização rápida do endereço vinculado ao CPF no Google Maps para validação geográfica.'
            ],
            [
                'name' => 'Foto da fachada para confirmação de lastro',
                'description' => 'Imagens da fachada do endereço registrado para confirmar a existência física e o contexto habitacional.'
            ],
            [
                'name' => 'Vizinhos para conferência',
                'description' => 'Identificação de endereços próximos para checagem e confirmação de localidade.'
            ],
            [
                'name' => 'Titular de Site e Email (dominios.com.br)',
                'description' => 'Verificação de registros de domínios na internet associados aos contatos do CPF.'
            ],
        ],
    ],
    [
        'title' => 'Consulta CPF',
        'stage' => 'Completa',
        'icon' => 'shield-check',
        'accent' => 'blue',
        'items' => [
            [
                'name' => 'Todos Items da Triagem',
                'description' => 'Inclui todos os items da etapa 1 de triagem e mais os items aqui mencionados.'
            ],
            [
                'name' => 'Protestos Nacionais',
                'description' => 'Consulta o Centrais de Protesto de todo o país — identifica títulos protestados em cartório por falta de pagamento.'
            ],
            [
                'name' => 'Processos judiciais',
                'description' => 'Busca ações cíveis, trabalhistas e criminais em tribunais estaduais e federais vinculadas ao CPF.'
            ],
            [
                'name' => 'Indicadores financeiros',
                'description' => 'Estimativa de renda, capacidade de pagamento e score comportamental para apoiar a decisão de crédito.'
            ],
            [
                'name' => 'Devedores do governo',
                'description' => 'Consulta o CADIN e dívida ativa da União — identifica pendências com órgãos públicos federais.'
            ],
            [
                'name' => 'SCR Bacen',
                'description' => 'Consulta ao Sistema de Informações de Créditos do Banco Central, revelando o nível de endividamento, histórico de pagamentos e risco de crédito consolidado.'
            ],
            [
                'name' => 'KYC e compliance',
                'description' => 'Verificação de integridade cadastral, vínculos societários e aderência a normas de prevenção à lavagem de dinheiro (PLD/FT).'
            ],
            [
                'name' => 'PEP (Pessoa Exposta Politicamente)',
                'description' => 'Identifica indivíduos em cargos públicos relevantes (últimos 5 anos) e familiares para due diligence reforçada.'
            ],
        ],
    ],
];

$feature_groups_by_document = [];
foreach ($feature_groups as $group) {
    $document = $group['title'];
    if (!isset($feature_groups_by_document[$document])) {
        $feature_groups_by_document[$document] = [];
    }
    $feature_groups_by_document[$document][] = $group;
}

$plan_features = [
    'Consulta CPF: Dados Cadastrais',
    'Consulta CPF: Restrições e Sanções',
    'Consulta CPF: Cheque sem fundo',
    'Consulta CPF: Processos judiciais',
    'Consulta CPF: Indicadores financeiros',
    'Consulta CPF: Devedores do governo',
    'Consulta CNPJ: Dados Cadastrais e Societários',
    'Consulta CNPJ: Secretária da Fazenda - Sintegra e Certidão Negativa Fiscal',
    'Consulta CNPJ: Protestos Nacionais',
    'Consulta CNPJ: Processos judiciais e Mídias',
    'Integração via API REST',
    'Acesso ao Dashboard e Painel de Controle',
];

$raw_plans = [
    [
        'title' => 'Starter',
        'price' => 397,
        'credits' => 100,
        'highlighted' => false
    ],
    [
        'title' => 'Growth',
        'price' => 897,
        'credits' => 250,
        'highlighted' => true
    ],
    [
        'title' => 'Business',
        'price' => 1497,
        'credits' => 450,
        'highlighted' => false
    ],
    [
        'title' => 'Enterprise',
        'price' => 2997,
        'credits' => 1000,
        'highlighted' => false
    ]
];

// Aplica 10% de desconto para Mentorados Tigre Branco APENAS nos custos das consultas (Triagem e Completa) - Franquia (price) e Créditos se mantém
$raw_plans = array_map(function($plan) {
    // Retiramos o desconto do price ($plan['price'] = $plan['price'] * 0.90) para manter a franquia original.
    // O desconto dos custos já é tratado no select da calculadora e no arquivo JS da tabela de planos
    return $plan;
}, $raw_plans);

$plans = array_map(function($plan) {
    $plan['display_price'] = formatMoney($plan['price']);
    $plan['display_credits'] = number_format($plan['credits'], 0, ',', '.');
    $plan['cost_per_credit'] = formatMoney($plan['price'] / $plan['credits']);
    return $plan;
}, $raw_plans);

$example_leads = 500;
$example_rejection_rate = 0.70;
$example_market_cost = 15;
$triage_cost = 2.73;
$full_total_cost = 6.77;
$additional_cost = $full_total_cost - $triage_cost;
$example_approved = $example_leads * (1 - $example_rejection_rate);
$example_current_cost = $example_leads * $example_market_cost;
$example_creditbiro_cost = ($example_leads * $triage_cost) + ($example_approved * $additional_cost);
$example_savings = $example_current_cost - $example_creditbiro_cost;
$example_final_cost_per_approved = $full_total_cost;
?>

<style>
  @keyframes fadeDown { 
    from { opacity: 0; transform: translateY(-12px); } 
    to   { opacity: 1; transform: translateY(0); } 
  } 
  @keyframes fadeUp { 
    from { opacity: 0; transform: translateY(16px); } 
    to   { opacity: 1; transform: translateY(0); } 
  } 
  .animate-fadeDown { animation: fadeDown 0.6s ease-out both; }
  .animate-fadeUp { animation: fadeUp 0.7s ease-out both; }
</style>

<section class="relative overflow-hidden bg-[#0a0e1a] text-[#f1f5f9] min-h-screen flex flex-col items-center justify-center py-20 px-4">
    <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[900px] h-[900px] rounded-full pointer-events-none" style="background: radial-gradient(circle, rgba(59,130,246,0.08) 0%, transparent 70%);"></div>
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <div class="relative z-10 max-w-[900px] w-full text-center flex flex-col items-center gap-8">
        
        <!-- Badge --> 
        <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-blue-500/15 border border-blue-500/25 text-sm font-semibold text-blue-400 tracking-wide animate-fadeDown"> 
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 shrink-0"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> 
            Economize até 80% vs. birôs tradicionais 
        </div> 

        <!-- Discount Badge -->
        <div class="inline-flex flex-col items-center gap-1 mt-2 mb-4 animate-fadeDown [animation-delay:50ms]">
            <div class="inline-flex items-center gap-2 py-2 px-6 rounded-full bg-orange-500/20 border border-orange-500/40 text-lg md:text-xl font-extrabold text-orange-400 tracking-wide shadow-[0_0_20px_rgba(249,115,22,0.3)]"> 
                🔥 Mentorados Tigre Branco têm 10% de desconto adicional!
            </div> 
            <span class="text-slate-400/80 text-sm font-medium">*Os valores simulados abaixo já estão com o desconto aplicado</span>
        </div>

        <!-- Headline --> 
        <h1 class="text-[clamp(2.2rem,5.5vw,3.6rem)] font-extrabold leading-[1.12] tracking-tight animate-fadeUp [animation-delay:100ms]">
            Economize na análise de crédito com uma <span class="bg-gradient-to-br from-blue-500 to-indigo-400 bg-clip-text text-transparent">jornada inteligente em 2 etapas</span>
        </h1> 

        <!-- Subheadline --> 
        <p class="text-[clamp(1rem,2.2vw,1.18rem)] leading-[1.7] text-slate-400 max-w-[640px] animate-fadeUp [animation-delay:250ms]"> 
            Birôs tradicionais <strong class="text-slate-100 font-semibold">cobram o mesmo por toda consulta — aprovada ou não.</strong> 
            Com o CreditBiro, sua operação começa com uma triagem rápida e barata para pessoa física e jurídica, e só avança para a consulta completa nos casos com maior potencial. 
        </p> 

        <!-- CTAs --> 
        <div class="flex items-center justify-center gap-4 flex-wrap animate-fadeUp [animation-delay:400ms]"> 
            <a href="#calculadora-home" class="inline-flex items-center gap-2 py-3 px-7 rounded-xl bg-blue-600 text-white text-base font-bold transition-all shadow-[0_0_24px_rgba(59,130,246,0.3)] hover:bg-blue-700 hover:-translate-y-px hover:shadow-[0_0_32px_rgba(59,130,246,0.45)]"> 
                Simule quanto você gasta hoje 
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg> 
            </a> 
            <a href="#solucoes" class="inline-flex items-center gap-2 py-3 px-6 rounded-xl bg-transparent text-slate-400 text-[0.95rem] font-semibold border border-white/10 transition-all hover:text-slate-100 hover:border-white/20 hover:bg-white/5">Como funciona</a> 
        </div> 

        <!-- Os 3 Cards da versão anterior -->
        <div class="grid sm:grid-cols-3 gap-4 w-full text-left relative mt-6 animate-fadeUp [animation-delay:700ms]">
            <!-- Setas indicativas de processo visíveis apenas no Desktop -->
            <div class="hidden sm:block absolute top-1/2 left-[31.5%] -translate-y-1/2 z-20">
                <div class="bg-slate-800 w-8 h-8 rounded-full flex items-center justify-center shadow-sm border border-slate-700">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-blue-400"></i>
                </div>
            </div>
            <div class="hidden sm:block absolute top-1/2 left-[64.8%] -translate-y-1/2 z-20">
                <div class="bg-slate-800 w-8 h-8 rounded-full flex items-center justify-center shadow-sm border border-slate-700">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-blue-400"></i>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-5 relative z-10 backdrop-blur-sm transition-all hover:bg-white/10">
                <div class="text-blue-400 text-sm font-semibold mb-1">Etapa 1</div>
                <div class="font-bold text-lg text-slate-100">Triagem inicial por até R$ 2,73</div>
                <p class="text-slate-400 text-sm mt-2">Faça uma análise objetiva e filtre rapidamente os casos com menor potencial antes de avançar.</p>
            </div>
            <div class="bg-white/5 border border-white/10 rounded-xl p-5 relative z-10 backdrop-blur-sm transition-all hover:bg-white/10">
                <div class="text-blue-400 text-sm font-semibold mb-1">Etapa 2</div>
                <div class="font-bold text-lg text-slate-100">Consulta completa por até + R$ 4,04</div>
                <p class="text-slate-400 text-sm mt-2">Aprofunde a avaliação apenas dos leads que passaram na primeira etapa.</p>
            </div>
            <div class="bg-white/5 border border-white/10 rounded-xl p-5 relative z-10 backdrop-blur-sm transition-all hover:bg-white/10">
                <div class="text-blue-400 text-sm font-semibold mb-1">Resultado</div>
                <div class="font-bold text-lg text-slate-100">Mais eficiência com menor custo por aprovação</div>
                <p class="text-slate-400 text-sm mt-2">Sua operação concentra investimento nos casos que realmente merecem, custando no máximo <strong class="text-slate-200">R$ 6,77</strong>.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white" id="solucoes">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Conheça nosso processo</h2>
            <p class="text-slate-600 max-w-3xl mx-auto">
                Estruture sua operação em 2 etapas inteligentes. A triagem traz informações básicas e se o lead não tiver problemas você roda imediatamente a segunda etapa que traz informações completas. Dessa maneira você pode diminuir seu custo de reprovacao significativamente.
            </p>
        </div>

        <div class="flex flex-col max-w-6xl mx-auto">
            
            <!-- Abas (Tabs) -->
            <div class="flex justify-center mb-10">
                <div class="inline-flex bg-slate-100 p-2 rounded-2xl shadow-inner w-full max-w-md">
                    <button onclick="switchTab('CNPJ')" id="tab-btn-CNPJ" class="w-1/2 flex items-center justify-center gap-2 px-8 py-4 text-base font-bold rounded-xl transition-all bg-white text-blue-600 shadow-md ring-1 ring-slate-900/5 transform scale-100 z-10 relative">
                        <i data-lucide="building-2" class="w-5 h-5"></i>
                        Consulta CNPJ
                    </button>
                    <button onclick="switchTab('CPF')" id="tab-btn-CPF" class="w-1/2 flex items-center justify-center gap-2 px-8 py-4 text-base font-bold rounded-xl transition-all text-slate-500 hover:text-slate-700 hover:bg-slate-200/50">
                        <i data-lucide="user" class="w-5 h-5"></i>
                        Consulta CPF
                    </button>
                </div>
            </div>

            <!-- Conteúdo das Abas -->
            <div class="relative">
                <?php foreach ($feature_groups_by_document as $document => $stages): ?>
                    <?php 
                        $docType = strpos($document, 'CNPJ') !== false ? 'CNPJ' : 'CPF';
                        $isActive = $docType === 'CNPJ'; 
                    ?>
                    <div id="tab-content-<?php echo $docType; ?>" class="transition-opacity duration-300 <?php echo $isActive ? 'block opacity-100' : 'hidden opacity-0'; ?>">
                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
                            <div class="p-6 border-b border-slate-100 bg-slate-50 text-center">
                                <h3 class="text-2xl font-bold text-slate-900"><?php echo $document; ?></h3>
                                <p class="text-slate-600 text-sm mt-2">
                                    Compare lado a lado o que entra na triagem inicial e o que é acrescentado na análise completa.
                                </p>
                            </div>
                            <div class="p-6 grid <?php echo $docType === 'CNPJ' ? 'lg:grid-cols-[1fr_auto_2.5fr]' : 'md:grid-cols-[1fr_auto_1fr]'; ?> gap-4 items-stretch relative">
                                <?php $stageCount = 1; ?>
                                <?php foreach ($stages as $group): ?>
                                    <?php if ($stageCount === 2): ?>
                                        <!-- Seta para desktop -->
                                        <div class="hidden md:flex flex-col justify-center items-center">
                                            <div class="bg-blue-50 w-12 h-12 rounded-full flex items-center justify-center shadow-sm border border-blue-200 text-blue-600">
                                                <i data-lucide="arrow-right" class="w-6 h-6"></i>
                                            </div>
                                        </div>
                                        <!-- Seta para mobile -->
                                        <div class="flex md:hidden justify-center items-center py-2 w-full">
                                            <div class="bg-blue-50 w-10 h-10 rounded-full flex items-center justify-center shadow-sm border border-blue-200 text-blue-600">
                                                <i data-lucide="arrow-down" class="w-5 h-5"></i>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="rounded-2xl border <?php echo $stageCount === 1 ? 'border-blue-200 shadow-md ring-1 ring-blue-100' : 'border-blue-800 shadow-lg ring-1 ring-blue-900'; ?> bg-white overflow-hidden flex flex-col relative">
                                        <?php if ($stageCount === 1): ?>
                                            <!-- Destaque visual na Triagem -->
                                            <div class="absolute top-0 left-0 w-full h-1 bg-blue-400"></div>
                                        <?php else: ?>
                                            <!-- Destaque visual na Completa -->
                                            <div class="absolute top-0 left-0 w-full h-1 bg-blue-900"></div>
                                        <?php endif; ?>
                                        
                                        <div class="p-5 border-b <?php echo $stageCount === 1 ? 'border-blue-100 bg-blue-50' : 'border-blue-900 bg-blue-900'; ?>">
                                            <div class="flex items-start gap-4">
                                                <div class="w-12 h-12 rounded-xl <?php echo $stageCount === 1 ? 'bg-blue-500 text-white shadow-lg shadow-blue-500/30' : 'bg-blue-800 text-blue-100 shadow-lg shadow-blue-900/30'; ?> flex items-center justify-center shrink-0">
                                                    <i data-lucide="<?php echo $group['icon']; ?>" class="w-6 h-6"></i>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold <?php echo $stageCount === 1 ? 'text-blue-500' : 'text-blue-300'; ?> uppercase tracking-wider mb-1">
                                                        Etapa <?php echo $stageCount; ?> &bull; <?php echo $group['stage']; ?>
                                                    </div>
                                                    <h4 class="text-xl font-extrabold <?php echo $stageCount === 1 ? 'text-slate-900' : 'text-white'; ?> leading-tight"><?php echo $group['title']; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-5 flex-1 <?php echo $stageCount === 1 ? 'bg-blue-50/30' : 'bg-slate-50'; ?>">
                                            <div class="<?php echo ($docType === 'CNPJ' && $stageCount === 2) ? 'grid grid-cols-1 lg:grid-cols-2 gap-3' : 'space-y-3'; ?>">
                                                <?php foreach ($group['items'] as $item): ?>
                                                    <div class="rounded-xl border <?php echo $stageCount === 1 ? 'border-blue-100 bg-white' : 'border-blue-200/60 bg-white'; ?> p-4 shadow-sm hover:shadow transition-shadow h-full flex flex-col">
                                                        <div class="flex items-start gap-3">
                                                            <i data-lucide="<?php echo $stageCount === 1 ? 'check-circle-2' : 'plus-circle'; ?>" class="w-5 h-5 <?php echo $stageCount === 1 ? 'text-blue-500' : 'text-blue-800'; ?> shrink-0 mt-0.5"></i>
                                                            <div>
                                                                <h5 class="font-bold text-slate-900 mb-1 text-sm"><?php echo $item['name']; ?></h5>
                                                                <p class="text-sm text-slate-600 leading-relaxed"><?php echo $item['description']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $stageCount++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
        function switchTab(tabId) {
            // Esconde todos os conteúdos
            document.getElementById('tab-content-CNPJ').classList.remove('block', 'opacity-100');
            document.getElementById('tab-content-CNPJ').classList.add('hidden', 'opacity-0');
            
            document.getElementById('tab-content-CPF').classList.remove('block', 'opacity-100');
            document.getElementById('tab-content-CPF').classList.add('hidden', 'opacity-0');
            
            // Reseta estilo dos botões
            document.getElementById('tab-btn-CNPJ').className = 'w-1/2 flex items-center justify-center gap-2 px-8 py-4 text-base font-bold rounded-xl transition-all text-slate-500 hover:text-slate-700 hover:bg-slate-200/50 z-0';
            document.getElementById('tab-btn-CPF').className = 'w-1/2 flex items-center justify-center gap-2 px-8 py-4 text-base font-bold rounded-xl transition-all text-slate-500 hover:text-slate-700 hover:bg-slate-200/50 z-0';
            
            // Mostra o conteúdo ativo
            const activeContent = document.getElementById('tab-content-' + tabId);
            activeContent.classList.remove('hidden');
            // Pequeno delay para a transição de opacidade funcionar
            setTimeout(() => {
                activeContent.classList.remove('opacity-0');
                activeContent.classList.add('block', 'opacity-100');
            }, 10);
            
            // Ativa o botão correspondente
            const activeBtn = document.getElementById('tab-btn-' + tabId);
            activeBtn.className = 'w-1/2 flex items-center justify-center gap-2 px-8 py-4 text-base font-bold rounded-xl transition-all bg-white text-blue-600 shadow-md ring-1 ring-slate-900/5 transform scale-100 z-10 relative';
            
            // Re-renderiza ícones Lucide no botão clicado para garantir que continuem aparecendo se precisarem
            lucide.createIcons();
        }
        </script>
    </div>
</section>

<section class="py-20 bg-slate-50" id="planos">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Como a Economia Acontece na Prática</h2>
            <p class="text-slate-600 max-w-3xl mx-auto">
                Você deixa de pagar consulta completa para todo mundo e passa a investir pouco para filtrar cedo os casos problemáticos.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-10 relative">
            <!-- Setas indicativas de processo visíveis apenas no Desktop -->
            <div class="hidden md:block absolute top-1/2 left-[31.5%] -translate-y-1/2 z-20">
                <div class="bg-white w-14 h-14 rounded-full flex items-center justify-center shadow-md border border-slate-200">
                    <i data-lucide="arrow-right" class="w-7 h-7 text-blue-600"></i>
                </div>
            </div>
            <div class="hidden md:block absolute top-1/2 left-[64.8%] -translate-y-1/2 z-20">
                <div class="bg-white w-14 h-14 rounded-full flex items-center justify-center shadow-md border border-slate-200">
                    <i data-lucide="arrow-right" class="w-7 h-7 text-blue-600"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm relative z-10">
                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-black text-lg mb-4">1</div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Rode a Triagem</h3>
                <p class="text-slate-600">Analise CPF ou CNPJ por até <strong>R$ 2,73</strong> para identificar rapidamente quem deve sair da esteira.</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm relative z-10">
                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-black text-lg mb-4">2</div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Aprofunde Só os Aprovados</h3>
                <p class="text-slate-600">Para quem passou na etapa 1, adicione a consulta completa por <strong>mais R$ <?php echo number_format($additional_cost, 2, ',', '.'); ?></strong> e ganhe profundidade sem desperdiçar orçamento.</p>
            </div>
            <div class="bg-blue-600 rounded-2xl p-8 text-white shadow-xl relative z-10">
                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center font-black text-lg mb-4">3</div>
                <h3 class="text-xl font-bold mb-2">Resultado</h3>
                <div class="text-lg font-bold text-blue-200 mb-1">Mais eficiência com menor custo por aprovação</div>
                <p class="text-blue-100">Sua operação concentra investimento nos casos que realmente merecem análise aprofundada, com um custo total de no máximo <strong>R$ <?php echo number_format($full_total_cost, 2, ',', '.'); ?></strong> por lead analisado.</p>
            </div>
        </div>

        <div class="bg-slate-900 rounded-3xl p-8 md:p-12 text-white shadow-xl">
            <div class="grid lg:grid-cols-[1.5fr_1fr] gap-10 items-center">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4">Exemplo real de esteira com 70% de reprovação</h3>
                    <p class="text-slate-300 mb-6" id="ex_desc">
                        Em uma operação com <strong>500 leads</strong> por mês e consulta tradicional de R$ 15, a maior parte do dinheiro vai embora em clientes que você já rejeitaria logo na primeira checagem.
                        <span class="block mt-2 text-sm text-blue-300 font-medium">*(Simulação baseada nos valores do plano Growth)*</span>
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <button onclick="updateExample(300, this)" class="ex-btn px-4 py-2 rounded-lg bg-white/5 text-slate-300 hover:bg-white/10 font-semibold text-sm transition-colors border border-white/10">300 leads</button>
                        <button onclick="updateExample(500, this)" class="ex-btn px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold text-sm transition-colors border border-blue-500">500 leads</button>
                        <button onclick="updateExample(1000, this)" class="ex-btn px-4 py-2 rounded-lg bg-white/5 text-slate-300 hover:bg-white/10 font-semibold text-sm transition-colors border border-white/10">1.000 leads</button>
                    </div>

                    <div class="grid sm:grid-cols-3 gap-4">
                        <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                            <div class="text-slate-400 text-sm">Custo atual</div>
                            <div class="text-2xl font-bold" id="ex_current_cost"><?php echo formatMoney($example_current_cost); ?></div>
                        </div>
                        <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                            <div class="text-slate-400 text-sm">Com CreditBiro</div>
                            <div class="text-2xl font-bold" id="ex_creditbiro_cost"><?php echo formatMoney($example_creditbiro_cost); ?></div>
                        </div>
                        <div class="bg-green-500/10 border border-green-400/20 rounded-xl p-4">
                            <div class="text-green-300 text-sm">Economia mensal</div>
                            <div class="text-2xl font-bold text-green-300" id="ex_savings"><?php echo formatMoney($example_savings); ?></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white text-slate-900 rounded-2xl p-6 shadow-xl">
                    <div class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">Resumo do cenário</div>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500 mt-0.5 shrink-0"></i><span><strong id="ex_leads_text">500 leads</strong> analisados por mês</span></li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500 mt-0.5 shrink-0"></i><span><strong>70%</strong> reprovados logo na triagem</span></li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500 mt-0.5 shrink-0"></i><span><strong id="ex_approved_text"><?php echo $example_approved; ?> aprovados</strong> seguem para etapa completa</span></li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500 mt-0.5 shrink-0"></i><span>Custo final da análise completa só para quem passou: <strong id="ex_final_cost"><?php echo formatMoney($example_final_cost_per_approved); ?></strong></span></li>
                    </ul>
                    <a href="#calculadora-home" class="mt-6 inline-flex items-center justify-center w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                        Simular Meu Cenário
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white" id="calculadora-home">
    <div class="container mx-auto px-4">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Calcule sua economia</h2>
        </div>

        <div class="bg-slate-900 rounded-3xl p-6 md:p-8 lg:p-10 text-white shadow-2xl">
            <div class="grid xl:grid-cols-[0.95fr_1.05fr] gap-8 items-stretch">
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 md:p-8">
                    <div class="text-sm font-semibold uppercase tracking-wide text-blue-300 mb-2">Simulação rápida</div>
                    <h3 class="text-2xl font-bold mb-4">Veja o impacto no seu custo de análise</h3>
                    <p class="text-slate-300 mb-6">
                        A lógica é simples: triagem inicial para todos os leads e consulta completa só para os aprovados.
                    </p>

                    <div class="space-y-6">
                        <div>
                            <label for="homeConsultas" class="block text-sm font-semibold text-slate-200 mb-2">Leads analisados por mês</label>
                            <input type="number" id="homeConsultas" min="1" step="1" value="500" class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 border border-white/20 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-colors" oninput="calcularHome()">
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="homeReprovacaoRange" class="block text-sm font-semibold text-slate-200">% de reprovação na triagem</label>
                                <span id="homeReprovacaoValor" class="text-sm font-bold text-blue-300">70%</span>
                            </div>
                            <input type="range" id="homeReprovacaoRange" min="50" max="90" step="1" value="70" class="w-full accent-blue-400" oninput="sincronizarReprovacaoHome(this.value)">
                            <div class="flex justify-between text-xs text-slate-400 mt-2">
                                <span>50%</span>
                                <span>70%</span>
                                <span>90%</span>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="homeCustoAtual" class="block text-sm font-semibold text-slate-200 mb-2">Quanto você paga hoje por consulta?</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-3 text-slate-400 font-bold">R$</span>
                                    <input type="number" id="homeCustoAtual" min="1" max="100" step="0.01" value="15" class="w-full pl-12 pr-4 py-3 rounded-xl bg-white text-slate-900 border border-white/20 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-colors" oninput="calcularHome()">
                                </div>
                            </div>

                            <div>
                                <label for="homePrecoCreditBiro" class="block text-sm font-semibold text-slate-200 mb-2">Selecione o Plano (Anual)</label>
                                <select id="homePrecoCreditBiro" class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 border border-white/20 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-colors" onchange="atualizarPrecoExibicao(); calcularHome()">
                                    <option value='{"triagem":2.87, "completa":7.13, "franquia":399, "nome":"Starter"}'>Starter (Fidelidade 12 meses)</option>
                                    <option value='{"triagem":2.73, "completa":6.77, "franquia":799, "nome":"Growth"}' selected>Growth (Fidelidade 12 meses)</option>
                                    <option value='{"triagem":2.58, "completa":6.42, "franquia":1299, "nome":"Business"}'>Business (Fidelidade 12 meses)</option>
                                    <option value='{"triagem":2.44, "completa":6.06, "franquia":2499, "nome":"Enterprise"}'>Enterprise (Fidelidade 12 meses)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
                                <div class="text-xs uppercase tracking-wide text-slate-400 mb-1">Triagem</div>
                                <div id="displayPrecoTriagem" class="text-2xl font-bold">R$ 3,97</div>
                                <p class="text-xs text-slate-400 mt-1">Para todos os leads.</p>
                            </div>
                            <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
                                <div class="text-xs uppercase tracking-wide text-slate-400 mb-1">Completa</div>
                                <div id="displayPrecoCompleta" class="text-2xl font-bold">+ R$ 3,97</div>
                                <p class="text-xs text-slate-400 mt-1">Só para aprovados.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 md:p-8 text-slate-900 shadow-xl">
                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div>
                            <div class="text-sm font-semibold uppercase tracking-wide text-blue-600 mb-1">Resultado estimado</div>
                            <h3 class="text-2xl font-bold">Economia potencial da sua operação</h3>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4 mb-6">
                        <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4">
                            <div class="text-xs uppercase tracking-wide text-slate-500 mb-1">Custo atual mensal</div>
                            <div id="homeResCustoAtual" class="text-2xl font-bold text-slate-900">R$ 0,00</div>
                        </div>
                        <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4">
                            <div class="text-xs uppercase tracking-wide text-slate-500 mb-1">Custo com CreditBiro</div>
                            <div id="homeResCustoNovo" class="text-2xl font-bold text-blue-600">R$ 0,00</div>
                        </div>
                    </div>

                    <div class="bg-green-50 border border-green-200 rounded-2xl p-6 text-center mb-6">
                        <div class="text-sm font-semibold text-green-800 mb-1">Economia mensal estimada</div>
                        <div id="homeResEconomia" class="text-4xl font-black text-green-600 mb-2">R$ 0,00</div>
                        <div id="homeResEconomiaPercent" class="inline-flex bg-green-100 text-green-800 text-sm font-bold px-3 py-1 rounded-full">0% de redução</div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="rounded-xl border border-slate-200 p-3">
                            <div class="text-[10px] uppercase tracking-wider text-slate-500 mb-1 leading-tight">Reprovados cedo</div>
                            <div id="homeResReprovados" class="text-lg font-bold text-slate-900">0</div>
                        </div>
                        <div class="rounded-xl border border-slate-200 p-3">
                            <div class="text-[10px] uppercase tracking-wider text-slate-500 mb-1 leading-tight">Leads aprovados</div>
                            <div id="homeResAprovados" class="text-lg font-bold text-blue-600">0</div>
                        </div>
                        <div class="rounded-xl border border-slate-200 p-3">
                            <div class="text-[10px] uppercase tracking-wider text-slate-500 mb-1 leading-tight">Economia anual</div>
                            <div id="homeResEconomiaAnual" class="text-lg font-bold text-slate-900">R$ 0</div>
                        </div>
                        <div class="rounded-xl border border-slate-200 p-3">
                            <div class="text-[10px] uppercase tracking-wider text-slate-500 mb-1 leading-tight">Custo médio/lead</div>
                            <div id="homeResCustoAprovacaoNovo" class="text-lg font-bold text-slate-900">R$ 0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-50" id="planos">
    <div class="container mx-auto px-4">
        <?php include 'includes/planos_table.php'; ?>

        <div class="max-w-6xl mx-auto bg-white rounded-2xl border border-slate-200 p-8 shadow-sm mb-12 mt-12">
            <div class="text-center mb-10">
                <h3 class="text-2xl font-bold text-slate-900">Todos os planos incluem a esteira completa:</h3>
                <p class="text-slate-600 mt-2">Diferente de outros birôs, você tem acesso a 100% das fontes de dados desde o plano Starter.</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Coluna CPF -->
                <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <i data-lucide="user" class="w-5 h-5"></i>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Consultas de CPF</h4>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Dados Cadastrais</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Restrições e Sanções</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Cheque sem fundo</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Protestos Nacionais</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Processos judiciais</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Indicadores financeiros</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Devedores do governo</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">KYC e Compliance</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">SCR Bacen</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Google Maps com localizacao da empresa</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Foto da fachada da empresa para confirmação de lastro</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Vizinhos comerciais para conferencia</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Titular de Site e Email (dominios.com.br)</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Coluna CNPJ -->
                <div class="bg-indigo-50/50 rounded-2xl p-6 border border-indigo-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">
                            <i data-lucide="building-2" class="w-5 h-5"></i>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Consultas de CNPJ</h4>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Estrutura Societária e Dados</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Restrições e Sanções</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Cheque sem fundo</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Secretária da Fazenda - Sintegra e Certidão Negativa Fiscal</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Protestos Nacionais</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Processos judiciais</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Indicadores financeiros</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Devedores do governo</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">KYC e Compliance (Empresa e Sócios)</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">SCR Bacen</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Google Maps com localizacao da empresa</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Foto da fachada da empresa para confirmação de lastro</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Vizinhos comerciais para conferencia</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-green-100 text-green-600 rounded-full p-1 shrink-0 mt-0.5"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <div>
                                <span class="font-bold text-slate-800 block text-sm mb-0.5">Titular de Site e Email (dominios.com.br)</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap justify-center gap-6 text-sm text-slate-600">
                <div class="flex items-center gap-2"><i data-lucide="layout-dashboard" class="w-4 h-4 text-slate-400"></i> Painel de Controle</div>
                <div class="flex items-center gap-2"><i data-lucide="users" class="w-4 h-4 text-slate-400"></i> Múltiplos Usuários</div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="#calculadora-home" class="text-slate-600 hover:text-blue-600 text-sm font-medium">
                Simule a economia no seu cenário &rarr;
            </a>
        </div>
    </div>
</section>

<script>
function atualizarPrecoExibicao() {
    const select = document.getElementById('homePrecoCreditBiro');
    if (!select) return;
    const planData = JSON.parse(select.value);
    
    document.getElementById('displayPrecoTriagem').innerText = formatCurrencyHome(planData.triagem);
    document.getElementById('displayPrecoCompleta').innerText = '+ ' + formatCurrencyHome(planData.completa);
}

function formatCurrencyHome(value) {
    return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

function clampHome(value, min, max) {
    return Math.min(Math.max(value, min), max);
}

function sincronizarReprovacaoHome(value) {
    const normalized = clampHome(parseFloat(value) || 70, 50, 90);
    document.getElementById('homeReprovacaoRange').value = normalized;
    document.getElementById('homeReprovacaoValor').innerText = normalized + '%';
    calcularHome();
}

function calcularHome() {
    const consultas = Math.max(parseFloat(document.getElementById('homeConsultas').value) || 0, 0);
    const reprovacao = clampHome(parseFloat(document.getElementById('homeReprovacaoRange').value) || 70, 50, 90) / 100;
    const custoAtual = clampHome(parseFloat(document.getElementById('homeCustoAtual').value) || 12, 1, 100);
    
    const planData = JSON.parse(document.getElementById('homePrecoCreditBiro').value);
    const precoTriagem = planData.triagem;
    const precoCompleta = planData.completa;
    const franquia = planData.franquia;

    document.getElementById('homeReprovacaoValor').innerText = (reprovacao * 100).toFixed(0) + '%';
    
    // We calculate based on the actual input value or fallback to 20,
    // but we don't force overwrite the input field while the user is typing
    // to prevent cursor jumping or blocking input.
    const reprovados = consultas * reprovacao;
    const aprovados = consultas - reprovados;
    const custoAtualTotal = consultas * custoAtual;
    
    const custoConsumo = (consultas * precoTriagem) + (aprovados * (precoCompleta - precoTriagem));
    
    // O custo final é a franquia mais o excedente (se houver)
    const custoNovo = Math.max(franquia, custoConsumo);
    
    const economia = custoAtualTotal - custoNovo;
    const economiaAnual = economia * 12;
    const economiaPercentual = custoAtualTotal > 0 ? (economia / custoAtualTotal) * 100 : 0;
    const custoPorAprovacaoNovo = aprovados > 0 ? custoNovo / aprovados : 0;

    document.getElementById('homeResCustoAtual').innerText = formatCurrencyHome(custoAtualTotal);
    document.getElementById('homeResCustoNovo').innerText = formatCurrencyHome(custoNovo);
    document.getElementById('homeResEconomia').innerText = formatCurrencyHome(economia);
    document.getElementById('homeResEconomiaPercent').innerText = economiaPercentual.toFixed(1) + '% de redução';
    document.getElementById('homeResReprovados').innerText = Math.round(reprovados).toLocaleString('pt-BR');
    document.getElementById('homeResAprovados').innerText = Math.round(aprovados).toLocaleString('pt-BR');
    document.getElementById('homeResEconomiaAnual').innerText = formatCurrencyHome(economiaAnual);
    document.getElementById('homeResCustoAprovacaoNovo').innerText = formatCurrencyHome(custoPorAprovacaoNovo);
}

document.addEventListener('DOMContentLoaded', function() {
    atualizarPrecoExibicao();
    calcularHome();
});

function updateExample(leads, btnElement) {
    const rejectionRate = 0.70;
    const marketCost = 15;
    const triageCost = 2.73;
    const fullCost = 6.77;
    const additionalCost = fullCost - triageCost;
    
    const approved = Math.round(leads * (1 - rejectionRate));
    const currentCost = leads * marketCost;
    const creditbiroCost = (leads * triageCost) + (approved * additionalCost);
    const savings = currentCost - creditbiroCost;
    const finalCost = fullCost;
    
    document.getElementById('ex_current_cost').innerText = formatCurrencyHome(currentCost);
    document.getElementById('ex_creditbiro_cost').innerText = formatCurrencyHome(creditbiroCost);
    document.getElementById('ex_savings').innerText = formatCurrencyHome(savings);
    
    const leadsFormatted = leads >= 1000 ? "1.000" : leads;
    
    document.getElementById('ex_desc').innerHTML = `Em uma operação com <strong>${leadsFormatted} leads</strong> por mês e consulta tradicional de R$ 15, a maior parte do dinheiro vai embora em clientes que você já rejeitaria logo na primeira checagem.`;
    document.getElementById('ex_leads_text').innerText = `${leadsFormatted} leads`;
    document.getElementById('ex_approved_text').innerText = `${approved} aprovados`;
    document.getElementById('ex_final_cost').innerText = formatCurrencyHome(finalCost);
    
    // Atualizar visual dos botões
    document.querySelectorAll('.ex-btn').forEach(btn => {
        btn.className = 'ex-btn px-4 py-2 rounded-lg bg-white/5 text-slate-300 hover:bg-white/10 font-semibold text-sm transition-colors border border-white/10';
    });
    btnElement.className = 'ex-btn px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold text-sm transition-colors border border-blue-500';
}
</script>
<?php include 'includes/footer.php'; ?>
