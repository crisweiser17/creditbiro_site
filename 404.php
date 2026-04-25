<?php
http_response_code(404);
$page_title = 'Página não encontrada';
include 'includes/header.php';
?>

<div class="bg-slate-900 text-white py-20 lg:py-32 relative overflow-hidden flex-grow flex items-center">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-6xl lg:text-8xl font-extrabold tracking-tight mb-6 text-blue-500">404</h1>
        <h2 class="text-3xl lg:text-4xl font-bold mb-6">Página não encontrada</h2>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto mb-10">
            Ops! A página que você está procurando não existe, foi movida ou o endereço foi digitado incorretamente.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="bg-slate-800 hover:bg-slate-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all border border-slate-700">
                Voltar para o Início
            </a>
            <a href="https://app.creditbiro.com.br/login" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all shadow-lg hover:shadow-blue-500/30">
                Acessar Minha Conta
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
