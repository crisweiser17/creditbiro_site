<?php
$currentYear = date('Y');
?>
</main>

<footer class="bg-slate-900 text-slate-300 py-12">
  <div class="container mx-auto px-4">
    <div class="grid md:grid-cols-4 gap-8 mb-8">
      <div>
        <h3 class="text-white text-xl font-bold mb-4">CreditBiro</h3>
        <p class="text-sm">
          Economize na análise de crédito com uma jornada inteligente em 2 etapas
        </p>
      </div>
      
      <div>
        <h4 class="text-white font-bold mb-4">Soluções</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="/#solucoes" class="hover:text-white">Consulta CPF</a></li>
          <li><a href="/#solucoes" class="hover:text-white">Consulta CNPJ</a></li>
          <li><a href="/#solucoes" class="hover:text-white">Triagem e Completa</a></li>
          <li><a href="/#calculadora-home" class="hover:text-white">Calculadora de Economia</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-bold mb-4">Empresa</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="/#calculadora-home" class="hover:text-white">Calcule seu ROI</a></li>
          <li><a href="/contato" class="hover:text-white">Fale Conosco</a></li>
          <li><a href="/termos" class="hover:text-white">Termos de Uso</a></li>
          <li><a href="/privacidade" class="hover:text-white">Privacidade</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-bold mb-4">Contato</h4>
        <ul class="space-y-2 text-sm">
          <li>contato@creditbiro.com.br</li>
          <li>11 91492-4000</li>
          <li>R. Gustavo Maciel, 2240 - Sala 19<br>Bauru - SP, 17012-110</li>
        </ul>
      </div>
    </div>
    
    <div class="border-t border-slate-800 pt-8 text-center text-sm">
      <p class="mb-1">&copy; <?php echo $currentYear; ?> CreditBiro. Todos os direitos reservados.</p>
      <p class="text-xs text-slate-500">TB TECH SPE LTDA &middot; CNPJ 64.089.707.0001-07</p>
    </div>
  </div>
</footer>

<!-- Floating WhatsApp Button -->
<?php
// Only show on specific pages
$current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$allowed_pages = ['/', '/index.php', '/contato.php', '/contato', '/mentorados.php', '/mentorados'];

if (in_array($current_path, $allowed_pages) || $current_path === '') {
?>
<a href="https://wa.me/5511914924000?text=Ol%C3%A1!%20Gostaria%20de%20saber%20mais%20sobre%20a%20CreditBiro." 
   target="_blank" 
   rel="noopener noreferrer"
   class="fixed bottom-6 right-6 z-[999] flex items-center gap-2 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-xl hover:bg-[#1ebd5a] hover:-translate-y-1 transition-all duration-300 group">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-6 h-6 fill-current">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
    <span class="font-semibold hidden md:block transition-all">Fale Conosco</span>
</a>
<?php } ?>

<!-- Initialize Lucide Icons -->
<script>
    lucide.createIcons();
</script>
</body>
</html>
