<?php
$page_title = 'Fale Conosco';
include 'includes/header.php';
?>

<div class="bg-slate-900 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Entre em Contato</h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">
            Dúvidas sobre planos, integrações ou suporte? Nossa equipe está pronta para ajudar.
        </p>
    </div>
</div>

<section class="py-20">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Canais de Atendimento</h2>
                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 shrink-0">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Email</h3>
                            <p class="text-slate-600 mb-2">Para suporte geral e comercial</p>
                            <a href="mailto:contato@creditbiro.com.br" class="text-blue-600 font-bold hover:underline">contato@creditbiro.com.br</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 shrink-0">
                            <i data-lucide="phone" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Telefone / WhatsApp</h3>
                            <p class="text-slate-600 mb-2">Horário comercial (9h às 18h)</p>
                            <a href="tel:+5511914924000" class="text-blue-600 font-bold hover:underline">11 91492-4000</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 shrink-0">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">Escritório</h3>
                            <p class="text-slate-600">
                                R. Gustavo Maciel, 2240 - Jardim Nasralla<br />
                                Sala 19 - Bauru - SP, 17012-110
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-slate-50 p-8 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Envie uma mensagem</h2>
                
                <form class="space-y-4" method="POST" action="send_contact" id="contactForm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nome Completo</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="Seu nome" />
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Corporativo</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="seu@empresa.com.br" />
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-slate-700 mb-1">Assunto</label>
                        <input type="text" id="subject" name="subject" required class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="Assunto da mensagem" />
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Mensagem</label>
                        <textarea id="message" name="message" rows="4" required class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="Como podemos ajudar?"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors shadow-lg hover:shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="btnText">Enviar Mensagem</span>
                        <span id="btnLoading" class="hidden">Enviando...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: message || 'Sua mensagem foi enviada com sucesso.',
            confirmButtonColor: '#2563EB'
        }).then(() => {
            // Optional: Clean URL
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    } else if (status === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: message || 'Ocorreu um erro ao enviar sua mensagem.',
            confirmButtonColor: '#2563EB'
        }).then(() => {
             // Optional: Clean URL
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }

    // Add loading state to form submission
    const form = document.getElementById('contactForm');
    if (form) {
        form.addEventListener('submit', function() {
            const btn = form.querySelector('button[type="submit"]');
            const btnText = document.getElementById('btnText');
            const btnLoading = document.getElementById('btnLoading');
            
            if(btn && btnText && btnLoading) {
                btn.disabled = true;
                btnText.classList.add('hidden');
                btnLoading.classList.remove('hidden');
            }
        });
    }
});
</script>
