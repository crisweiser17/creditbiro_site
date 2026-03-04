<!-- Deploy: PHP Stack Migration Complete -->
<?php
$page_title = 'Triagem de Crédito Inteligente';
include 'includes/header.php';

$features = [
    [
        'title' => "Consulta CNPJ (Receita Federal)",
        'description' => "Acesse todos os dados cadastrais do CNPJ diretamente na base da Receita Federal. Verifique situação cadastral, atividade econômica (CNAE), quadro societário e capital social.",
        'icon' => "shield"
    ],
    [
        'title' => "Situação Cadastral CPF",
        'description' => "Valide a situação cadastral do CPF na Receita Federal em tempo real. Essencial para prevenção de fraudes e validação de identidade.",
        'icon' => "search"
    ],
    [
        'title' => "Cheques sem Fundo (CCF)",
        'description' => "Consulte o cadastro de emitentes de cheques sem fundo do Banco Central. Identifique histórico de inadimplência bancária.",
        'icon' => "file-text"
    ],
    [
        'title' => "Protestos em Cartórios (CENPROT)",
        'description' => "Varredura nacional em cartórios de protesto. Identifique títulos protestados em todo o Brasil, com detalhes do cartório e valor.",
        'icon' => "alert-triangle"
    ],
    [
        'title' => "SEFAZ / SINTEGRA",
        'description' => "Verifique se o CNPJ está habilitado para emitir Notas Fiscais. Consulta essencial para cadastro de fornecedores e clientes PJ.",
        'icon' => "check-circle"
    ],
    [
        'title' => "Processos Judiciais (Judit)",
        'description' => "Busca abrangente de processos judiciais contra CPF ou CNPJ em diversos tribunais. Análise de risco jurídico completa.",
        'icon' => "gavel"
    ],
    [
        'title' => "Localização e Endereço",
        'description' => "Enriqueça dados com busca de endereço via CEP, visualização no Google Maps e até foto da fachada do imóvel para confirmação visual.",
        'icon' => "map-pin"
    ],
    [
        'title' => "Domínios .com.br",
        'description' => "Descubra a titularidade de domínios nacionais. Veja data de criação e responsável (proprietário do site/email), útil para investigações digitais.",
        'icon' => "globe"
    ]
];

$plans = [
    [
        'title' => "Starter",
        'price' => "R$ 297",
        'credits' => "100",
        'features' => ["Consultas CPF/CNPJ", "Cheques sem fundo", "Protestos", "Suporte por email"],
        'highlighted' => false
    ],
    [
        'title' => "Growth",
        'price' => "R$ 597",
        'credits' => "250",
        'features' => ["Tudo do Starter", "Localização Avançada", "Judit (Processos)", "Suporte Prioritário"],
        'highlighted' => true
    ],
    [
        'title' => "Business",
        'price' => "R$ 1.297",
        'credits' => "600",
        'features' => ["Tudo do Growth", "API de Integração", "Múltiplos Usuários", "Gerente de Conta"],
        'highlighted' => false
    ]
];
?>

<!-- Hero Section -->
<section class="bg-slate-900 text-white py-20 lg:py-32 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight mb-6">
            Triagem de Crédito <span class="text-blue-500">Rápida e Segura</span>
        </h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto mb-10">
            Potencialize sua análise de risco com dados precisos de CPF, CNPJ, Protestos e Processos Judiciais.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/precos.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all shadow-lg hover:shadow-blue-500/30">
                Ver Planos e Preços
            </a>
            <a href="/contato.php" class="bg-slate-800 hover:bg-slate-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all border border-slate-700">
                Falar com Consultor
            </a>
        </div>
        <p class="mt-6 text-sm text-slate-400">
            Experimente grátis: 20 créditos iniciais sem compromisso.
        </p>
    </div>
</section>

<!-- Features Highlights -->
<section id="solucoes" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Tudo para sua Análise de Crédito</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Centralizamos as principais fontes de dados do mercado em uma única plataforma.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($features as $feature): ?>
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 mb-4">
                        <i data-lucide="<?php echo $feature['icon']; ?>" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2"><?php echo $feature['title']; ?></h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        <?php echo $feature['description']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing Teaser -->
<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Planos que Crescem com Você</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Escolha o pacote de créditos ideal para o volume da sua operação.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto mb-12">
            <?php foreach ($plans as $plan): ?>
                <div class="rounded-2xl p-8 flex flex-col h-full border <?php echo $plan['highlighted'] ? 'border-blue-500 bg-white shadow-xl ring-2 ring-blue-500/20' : 'border-slate-200 bg-white shadow-sm hover:shadow-md transition-shadow'; ?>">
                    <?php if ($plan['highlighted']): ?>
                        <div class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-2">Recomendado</div>
                    <?php endif; ?>
                    <h3 class="text-xl font-bold text-slate-900 mb-2"><?php echo $plan['title']; ?></h3>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-slate-900"><?php echo $plan['price']; ?></span>
                        <span class="text-slate-500 text-sm">/mês</span>
                    </div>
                    
                    <div class="mb-6">
                        <p class="font-semibold text-slate-700 mb-1">Créditos inclusos:</p>
                        <p class="text-2xl font-bold text-blue-600"><?php echo $plan['credits']; ?></p>
                    </div>

                    <ul class="space-y-3 mb-8 flex-1">
                        <?php foreach ($plan['features'] as $feat): ?>
                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                <i data-lucide="check" class="w-5 h-5 text-green-500 shrink-0"></i>
                                <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="/contato.php" class="block w-full text-center py-3 px-4 rounded-lg font-bold transition-colors <?php echo $plan['highlighted'] ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-slate-100 text-slate-900 hover:bg-slate-200'; ?>">
                        Começar Agora
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Trial CTA -->
        <div class="bg-blue-600 rounded-2xl p-8 md:p-12 text-center max-w-4xl mx-auto text-white shadow-xl">
            <h3 class="text-2xl font-bold mb-4">Comece com 20 Créditos Gratuitos</h3>
            <p class="mb-8 text-blue-100">
                Faça um teste prático da nossa plataforma. Sem cartão de crédito, sem compromisso.
                O plano Trial é válido por 30 dias.
            </p>
            <a href="https://app.creditbiro.com.br/register" class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-blue-50 transition-colors">
                Criar Conta Grátis
            </a>
        </div>
        
        <div class="text-center mt-8">
            <a href="/precos.php" class="text-slate-600 hover:text-blue-600 text-sm font-medium">
                Ver tabela completa de planos (Enterprise, Light, etc) &rarr;
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
