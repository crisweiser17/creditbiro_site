<?php
$page_title = 'Política de Privacidade';
include 'includes/header.php';
?>

<div class="bg-slate-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-4">Política de Privacidade</h1>
        <p class="text-slate-300">Em conformidade com a Lei Geral de Proteção de Dados (LGPD - Lei nº 13.709/2018)</p>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="prose prose-slate max-w-none text-slate-700">
            <p class="mb-6">
                A <strong>CreditBiro</strong> ("nós", "nosso") está comprometida em proteger a sua privacidade e seus dados pessoais. Esta Política de Privacidade descreve como coletamos, usamos, armazenamos e compartilhamos suas informações quando você utiliza nosso site e nossos serviços de consulta e análise de crédito.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">1. Dados que Coletamos</h2>
            <p class="mb-4">Para a prestação de nossos serviços, podemos coletar os seguintes tipos de dados:</p>
            <ul class="list-disc pl-6 mb-6 space-y-2">
                <li><strong>Dados de Cadastro:</strong> Nome completo, CPF, CNPJ, endereço de e-mail, número de telefone e endereço comercial/residencial.</li>
                <li><strong>Dados de Acesso:</strong> Endereço IP, tipo de navegador, logs de acesso e páginas visitadas.</li>
                <li><strong>Dados para Consultas:</strong> Informações fornecidas por você (como CPF ou CNPJ de terceiros) para a realização das consultas contratadas.</li>
            </ul>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">2. Finalidade do Tratamento (Base Legal)</h2>
            <p class="mb-4">Tratamos seus dados pessoais com base nas hipóteses legais previstas na LGPD:</p>
            <ul class="list-disc pl-6 mb-6 space-y-2">
                <li><strong>Execução de Contrato:</strong> Para processar seu cadastro, liberar créditos e realizar as consultas solicitadas.</li>
                <li><strong>Proteção do Crédito:</strong> Para viabilizar a análise de risco e concessão de crédito, conforme autorizado pela LGPD (Art. 7º, X).</li>
                <li><strong>Cumprimento de Obrigação Legal:</strong> Para atender a exigências fiscais e regulatórias.</li>
                <li><strong>Legítimo Interesse:</strong> Para prevenção à fraude e melhoria de nossos serviços.</li>
            </ul>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">3. Compartilhamento de Dados</h2>
            <p class="mb-4">Não vendemos seus dados pessoais. Seus dados podem ser compartilhados apenas nas seguintes situações:</p>
            <ul class="list-disc pl-6 mb-6 space-y-2">
                <li>Com <strong>bureaus de crédito e fontes oficiais</strong> (como Receita Federal e Tribunais) estritamente para a execução das consultas solicitadas.</li>
                <li>Com processadores de pagamento para efetivar a compra de créditos.</li>
                <li>Quando exigido por ordem judicial ou autoridade competente.</li>
            </ul>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">4. Segurança dos Dados</h2>
            <p class="mb-6">
                Adotamos medidas técnicas e administrativas rigorosas para proteger seus dados contra acessos não autorizados, perdas ou vazamentos. Utilizamos criptografia (SSL/TLS) em todas as transações e controles de acesso restritos em nossos sistemas.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">5. Seus Direitos (Titular dos Dados)</h2>
            <p class="mb-4">Conforme a LGPD, você tem o direito de solicitar a qualquer momento:</p>
            <ul class="list-disc pl-6 mb-6 space-y-2">
                <li>A confirmação da existência de tratamento de seus dados.</li>
                <li>O acesso aos dados que possuímos sobre você.</li>
                <li>A correção de dados incompletos, inexatos ou desatualizados.</li>
                <li>A eliminação de dados desnecessários ou excessivos.</li>
            </ul>
            <p class="mb-6">Para exercer seus direitos, entre em contato através do e-mail: <a href="mailto:dpo@creditbiro.com.br" class="text-blue-600 font-bold hover:underline">dpo@creditbiro.com.br</a>.</p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">6. Cookies</h2>
            <p class="mb-6">
                Utilizamos cookies essenciais para o funcionamento do site (como manter você logado) e cookies analíticos para entender como nosso serviço é utilizado. Você pode gerenciar suas preferências de cookies nas configurações do seu navegador.
            </p>

            <h2 class="text-2xl font-bold text-slate-900 mt-8 mb-4">7. Alterações nesta Política</h2>
            <p class="mb-6">
                Podemos atualizar esta política periodicamente. A versão mais recente estará sempre disponível nesta página, com a data da última atualização.
            </p>

            <hr class="border-slate-200 my-8">
            <p class="text-sm text-slate-500">Última atualização: <?php echo date('d/m/Y'); ?></p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
