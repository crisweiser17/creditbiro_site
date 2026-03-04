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
          Soluções completas para análise de crédito e triagem cadastral. Dados precisos para decisões seguras.
        </p>
      </div>
      
      <div>
        <h4 class="text-white font-bold mb-4">Soluções</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="/#solucoes" class="hover:text-white">Consulta CPF</a></li>
          <li><a href="/#solucoes" class="hover:text-white">Consulta CNPJ</a></li>
          <li><a href="/#solucoes" class="hover:text-white">Protestos</a></li>
          <li><a href="/#solucoes" class="hover:text-white">Localização</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-bold mb-4">Empresa</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="/precos.php" class="hover:text-white">Planos e Preços</a></li>
          <li><a href="/contato.php" class="hover:text-white">Fale Conosco</a></li>
          <li><a href="#" class="hover:text-white">Termos de Uso</a></li>
          <li><a href="#" class="hover:text-white">Privacidade</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-bold mb-4">Contato</h4>
        <ul class="space-y-2 text-sm">
          <li>suporte@creditbiro.com.br</li>
          <li>São Paulo, SP</li>
        </ul>
      </div>
    </div>
    
    <div class="border-t border-slate-800 pt-8 text-center text-sm">
      <p>&copy; <?php echo $currentYear; ?> CreditBiro. Todos os direitos reservados.</p>
    </div>
  </div>
</footer>

<!-- Initialize Lucide Icons -->
<script>
    lucide.createIcons();
</script>
</body>
</html>
