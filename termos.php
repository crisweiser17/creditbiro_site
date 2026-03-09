<?php
$page_title = 'Termos de Uso';
include 'includes/header.php';
?>

<div class="bg-slate-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-4">Termos de Uso</h1>
        <p class="text-slate-300">Regras e condições para utilização da plataforma CreditBiro</p>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="prose prose-slate max-w-none text-slate-700">
            <p class="mb-6">
                Bem-vindo à <strong>CreditBiro</strong>. Ao acessar ou utilizar nossa plataforma, você concorda expressamente com estes Termos de Uso. Caso não concorde com qualquer disposição, pedimos que não utilize nossos serviços.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">1. Objeto dos Serviços</h2>
            <p class="mb-6">
                A CreditBiro é uma plataforma que fornece serviços de consulta de informações cadastrais, análise de crédito e dados públicos agregados de fontes oficiais (como Receita Federal, Tribunais e Bureaus de Crédito), destinada exclusivamente a apoiar processos de decisão de crédito e prevenção à fraude.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">2. Uso Aceitável e Responsabilidades</h2>
            <p class="mb-4">O Usuário declara e garante que:</p>
            <ul class="list-disc pl-6 mb-6 space-y-2">
                <li>Utilizará as informações obtidas <strong>exclusivamente para fins lícitos</strong>, como análise de crédito, cadastro e gestão de risco.</li>
                <li>Não utilizará os dados para práticas discriminatórias, assédio, marketing não solicitado (SPAM) ou qualquer atividade ilegal.</li>
                <li>Manterá o sigilo absoluto de suas credenciais de acesso (login e senha), sendo o único responsável por todas as atividades realizadas em sua conta.</li>
            </ul>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">3. Planos, Pagamentos e Créditos</h2>
            <ul class="list-disc pl-6 mb-6 space-y-2">
                <li><strong>Modalidade Pré-paga:</strong> Os serviços funcionam mediante a aquisição de créditos. O consumo ocorre conforme a tabela de preços vigente no momento da consulta.</li>
                <li><strong>Validade dos Créditos:</strong> Créditos promocionais (como o plano Trial) possuem validade de 30 dias. Créditos comprados não expiram enquanto a conta estiver ativa.</li>
                <li><strong>Cancelamento:</strong> Planos mensais podem ser cancelados a qualquer momento, sem multa, encerrando-se a renovação automática para o ciclo seguinte.</li>
            </ul>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">4. Limitação de Responsabilidade</h2>
            <p class="mb-6">
                A CreditBiro atua como facilitadora no acesso a dados de fontes terceiras. <strong>Não garantimos a exatidão, integridade ou atualização em tempo real</strong> de todos os dados, pois estes dependem da disponibilidade dos órgãos oficiais e fontes públicas. Não nos responsabilizamos por decisões de negócios tomadas com base nessas informações.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">5. Propriedade Intelectual</h2>
            <p class="mb-6">
                Todo o conteúdo da plataforma, incluindo logotipos, software, bancos de dados e layouts, é de propriedade exclusiva da CreditBiro ou de seus licenciadores, sendo protegido pela legislação de direitos autorais.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">6. Disposições Gerais</h2>
            <p class="mb-6">
                Estes termos são regidos pelas leis da República Federativa do Brasil. Fica eleito o Foro da Comarca de São Paulo/SP para dirimir quaisquer dúvidas oriundas deste contrato.
            </p>

            <hr class="border-slate-200 my-8">
            <p class="text-sm text-slate-500">Última atualização: <?php echo date('d/m/Y'); ?></p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
