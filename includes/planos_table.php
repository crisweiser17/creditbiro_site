<style> 
    .planos-root {
      --bg: #f8fafc; 
      --card: #ffffff; 
      --text: #0f172a; 
      --muted: #64748b; 
      --line: #e2e8f0; 
      --blue: #2563eb; 
      --blue-dark: #1d4ed8; 
      --blue-soft: #eff6ff; 
      --green: #16a34a; 
      --shadow: 0 10px 30px rgba(15, 23, 42, 0.08); 
      --radius: 24px; 
    } 

    .planos-root .section { 
      max-width: 1400px; 
      margin: 0 auto; 
    } 

    .planos-root .header { 
      text-align: center; 
      margin-bottom: 32px; 
    } 

    .planos-root .eyebrow { 
      display: inline-block; 
      font-size: 13px; 
      font-weight: 700; 
      letter-spacing: 0.08em; 
      text-transform: uppercase; 
      color: var(--blue-dark); 
      background: var(--blue-soft); 
      padding: 10px 14px; 
      border-radius: 999px; 
      margin-bottom: 18px; 
    } 

    .planos-root h2 { 
      margin: 0; 
      font-size: clamp(34px, 4vw, 48px); 
      line-height: 1.1; 
      letter-spacing: -0.03em;
      font-weight: 800;
      color: var(--text);
    } 

    .planos-root .sub { 
      max-width: 900px; 
      margin: 18px auto 0; 
      font-size: 18px; 
      line-height: 1.6; 
      color: var(--muted); 
    } 

    .planos-root .billing-switch-wrap { 
      display: flex; 
      flex-direction: column; 
      align-items: center; 
      gap: 12px; 
      margin-bottom: 38px; 
    } 

    .planos-root .billing-switch { 
      display: inline-flex; 
      padding: 8px; 
      border: 1px solid var(--line); 
      border-radius: 999px; 
      background: #fff; 
      box-shadow: var(--shadow); 
      gap: 6px; 
      flex-wrap: wrap; 
      justify-content: center; 
    } 

    .planos-root .billing-btn { 
      border: 0; 
      background: transparent; 
      color: var(--muted); 
      font-size: 15px; 
      font-weight: 700; 
      padding: 12px 18px; 
      border-radius: 999px; 
      cursor: pointer; 
      transition: .2s ease; 
    } 

    .planos-root .billing-btn.active { 
      background: var(--blue); 
      color: #fff; 
      box-shadow: 0 10px 20px rgba(37, 99, 235, 0.24); 
    } 

    .planos-root .switch-note { 
      font-size: 14px; 
      color: var(--muted); 
      text-align: center; 
    } 

    .planos-root .switch-note strong { 
      color: var(--green); 
    } 

    .planos-root .grid { 
      display: grid; 
      grid-template-columns: repeat(4, minmax(0, 1fr)); 
      gap: 28px; 
      align-items: stretch; 
    } 

    .planos-root .card { 
      position: relative; 
      background: var(--card); 
      border: 1px solid var(--line); 
      border-radius: var(--radius); 
      box-shadow: var(--shadow); 
      padding: 28px; 
      display: flex; 
      flex-direction: column; 
      min-height: 100%; 
    } 

    .planos-root .card.featured { 
      border: 2px solid var(--blue); 
      background: linear-gradient(180deg, #f8faff 0%, #ffffff 100%); 
      transform: translateY(-2px); 
    } 

    .planos-root .badge { 
      position: absolute; 
      top: -16px; 
      left: 50%; 
      transform: translateX(-50%); 
      background: var(--blue); 
      color: #fff; 
      font-size: 13px; 
      font-weight: 800; 
      letter-spacing: 0.08em; 
      text-transform: uppercase; 
      padding: 10px 18px; 
      border-radius: 999px; 
      box-shadow: 0 10px 20px rgba(37, 99, 235, 0.24); 
      white-space: nowrap; 
    } 

    .planos-root .plan { 
      font-size: 18px; 
      font-weight: 800; 
      margin-bottom: 16px; 
      color: var(--text);
    } 

    .planos-root .price-wrap { 
      margin-bottom: 18px; 
    } 

    .planos-root .price-line { 
      display: flex; 
      align-items: baseline; 
      gap: 6px; 
      flex-wrap: nowrap; 
      white-space: nowrap;
    } 

    .planos-root .price { 
      font-size: clamp(24px, 2.1vw, 36px); 
      font-weight: 900; 
      letter-spacing: -0.03em; 
      line-height: 1; 
      color: var(--text);
    } 

    .planos-root .per { 
      color: var(--muted); 
      font-size: 13px; 
      font-weight: 500; 
      white-space: nowrap;
    } 

    .planos-root .billing-caption { 
      margin-top: 8px; 
      font-size: 13px; 
      color: var(--muted); 
      min-height: 34px; 
      line-height: 1.4; 
    } 

    .planos-root .economy { 
      border: 1px solid #bfdbfe; 
      border-radius: 18px; 
      padding: 18px; 
      background: var(--blue-soft); 
      margin-bottom: 24px; 
    } 

    .planos-root .box-label { 
      font-size: 15px; 
      color: #334155; 
      margin-bottom: 6px; 
    } 

    .planos-root .economy .main { 
      font-size: 16px; 
      line-height: 1.8; 
      color: var(--blue-dark); 
    } 

    .planos-root .btn { 
      margin-top: auto; 
      display: inline-flex; 
      align-items: center; 
      justify-content: center; 
      width: 100%; 
      min-height: 54px; 
      padding: 14px 18px; 
      border-radius: 16px; 
      border: 1px solid #93c5fd; 
      background: #dbeafe; 
      color: var(--blue-dark); 
      text-decoration: none; 
      font-size: 18px; 
      font-weight: 800; 
      transition: 0.2s ease; 
    } 

    .planos-root .featured .btn { 
      background: var(--blue); 
      color: #fff; 
      border-color: var(--blue); 
      box-shadow: 0 10px 20px rgba(37, 99, 235, 0.22); 
    } 

    .planos-root .btn:hover { 
      transform: translateY(-1px); 
    } 

    .planos-root .footnote { 
      margin-top: 26px; 
      text-align: center; 
      font-size: 14px; 
      line-height: 1.7; 
      color: var(--muted); 
      max-width: 960px; 
      margin-left: auto; 
      margin-right: auto; 
    } 

    @media (max-width: 1180px) { 
      .planos-root .grid { 
        grid-template-columns: repeat(2, minmax(0, 1fr)); 
      } 
    } 

    @media (max-width: 720px) { 
      .planos-root .grid { 
        grid-template-columns: 1fr; 
      } 
      .planos-root .card.featured { 
        transform: none; 
      } 
      .planos-root .billing-btn { 
        width: 100%; 
      } 
    } 
</style> 

<div class="planos-root">
  <section class="section"> 
    <div class="header"> 
      <?php if (strpos($_SERVER['REQUEST_URI'], 'mentorado') !== false): ?>
      <div class="inline-flex flex-col items-center gap-1 mb-6">
          <div class="inline-flex items-center gap-2 py-2 px-6 rounded-full bg-orange-100 text-orange-700 text-lg md:text-xl font-bold shadow-md border border-orange-300">
            🔥 10% de Desconto Adicional para Mentorados Tigre Branco
          </div>
          <span class="text-slate-500 text-sm font-medium">*Os valores abaixo já estão com o desconto aplicado</span>
      </div>
      <?php else: ?>
      <div class="eyebrow">Planos para escalar sua análise</div> 
      <?php endif; ?>
      <h2>Planos que crescem com sua operação</h2> 
    </div> 

    <div class="billing-switch-wrap"> 
      <div class="billing-switch"> 
        <button class="billing-btn" data-billing="monthly">Mensal</button> 
        <button class="billing-btn" data-billing="semiannual">Semestral</button> 
        <button class="billing-btn active" data-billing="annual">Anual</button> 
      </div> 
    </div> 

    <div class="grid"> 
      <article class="card" data-plan="starter"> 
        <div class="plan">Starter</div> 
        <div class="price-wrap"> 
          <div class="price-line"> 
            <span class="price" data-price>R$ 399,00</span><span class="per">/ Franquia</span> 
          </div> 
          <div class="billing-caption" data-caption>Cobrança mensal com fidelidade de 12 meses</div> 
        </div> 

        <div class="economy"> 
          <div class="box-label">Custo por lead analisado</div> 
          <div class="main"> 
            Apenas Triagem: <strong data-triage>R$ 3,99</strong><br /> 
            Triagem + Completa: <strong data-complete>R$ 9,90</strong> 
          </div> 
        </div> 

        <a href="https://app.creditbiro.com.br/register" class="btn">Começar Agora</a> 
      </article> 

      <article class="card featured" data-plan="growth"> 
        <div class="badge">Mais escolhido</div> 
        <div class="plan">Growth</div> 
        <div class="price-wrap"> 
          <div class="price-line"> 
            <span class="price" data-price>R$ 799,00</span><span class="per">/ Franquia</span> 
          </div> 
          <div class="billing-caption" data-caption>Cobrança mensal com fidelidade de 12 meses</div> 
        </div> 

        <div class="economy"> 
          <div class="box-label">Custo por lead analisado</div> 
          <div class="main"> 
            Apenas Triagem: <strong data-triage>R$ 3,79</strong><br /> 
            Triagem + Completa: <strong data-complete>R$ 9,41</strong> 
          </div> 
        </div> 

        <a href="https://app.creditbiro.com.br/register" class="btn">Começar Agora</a> 
      </article> 

      <article class="card" data-plan="business"> 
        <div class="plan">Business</div> 
        <div class="price-wrap"> 
          <div class="price-line"> 
            <span class="price" data-price>R$ 1.299,00</span><span class="per">/ Franquia</span> 
          </div> 
          <div class="billing-caption" data-caption>Cobrança mensal com fidelidade de 12 meses</div> 
        </div> 

        <div class="economy"> 
          <div class="box-label">Custo por lead analisado</div> 
          <div class="main"> 
            Apenas Triagem: <strong data-triage>R$ 3,59</strong><br /> 
            Triagem + Completa: <strong data-complete>R$ 8,91</strong> 
          </div> 
        </div> 

        <a href="https://app.creditbiro.com.br/register" class="btn">Começar Agora</a> 
      </article> 

      <article class="card" data-plan="enterprise"> 
        <div class="plan">Enterprise</div> 
        <div class="price-wrap"> 
          <div class="price-line"> 
            <span class="price" data-price>R$ 2.499,00</span><span class="per">/ Franquia</span> 
          </div> 
          <div class="billing-caption" data-caption>Cobrança mensal com fidelidade de 12 meses</div> 
        </div> 

        <div class="economy"> 
          <div class="box-label">Custo por lead analisado</div> 
          <div class="main"> 
            Apenas Triagem: <strong data-triage>R$ 3,39</strong><br /> 
            Triagem + Completa: <strong data-complete>R$ 8,42</strong> 
          </div> 
        </div> 

        <a href="https://app.creditbiro.com.br/register" class="btn">Começar Agora</a> 
      </article> 
    </div> 

    <p class="footnote"> 
      O valor da franquia é revertido integralmente em saldo para suas consultas. Caso o saldo acabe, você continua consultando normalmente pelo mesmo valor unitário mediante a compra de saldo adicional.
    </p> 
  </section> 
</div>

<script> 
   const isMentorados = window.location.pathname.includes('mentorado');
   
   // Função para aplicar desconto de 10% se estiver na página de mentorados (Apenas nos custos, não na franquia/monthlyFee)
   const applyDiscount = (val) => isMentorados ? val * 0.9 : val;
 
   const pricing = { 
     monthly: { 
       starter: { monthlyFee: 399, triage: applyDiscount(3.99), complete: applyDiscount(9.90), caption: 'Cobrança mensal' }, 
       growth: { monthlyFee: 799, triage: applyDiscount(3.79), complete: applyDiscount(9.41), caption: 'Cobrança mensal' }, 
       business: { monthlyFee: 1299, triage: applyDiscount(3.59), complete: applyDiscount(8.91), caption: 'Cobrança mensal' }, 
       enterprise: { monthlyFee: 2499, triage: applyDiscount(3.39), complete: applyDiscount(8.42), caption: 'Cobrança mensal' } 
     }, 
     semiannual: { 
       starter: { monthlyFee: 399, triage: applyDiscount(3.59), complete: applyDiscount(8.91), caption: 'Cobrança mensal com fidelidade de 6 meses' }, 
       growth: { monthlyFee: 799, triage: applyDiscount(3.41), complete: applyDiscount(8.46), caption: 'Cobrança mensal com fidelidade de 6 meses' }, 
       business: { monthlyFee: 1299, triage: applyDiscount(3.23), complete: applyDiscount(8.02), caption: 'Cobrança mensal com fidelidade de 6 meses' }, 
       enterprise: { monthlyFee: 2499, triage: applyDiscount(3.05), complete: applyDiscount(7.57), caption: 'Cobrança mensal com fidelidade de 6 meses' } 
     }, 
     annual: { 
       starter: { monthlyFee: 399, triage: applyDiscount(3.19), complete: applyDiscount(7.92), caption: 'Cobrança mensal com fidelidade de 12 meses' }, 
       growth: { monthlyFee: 799, triage: applyDiscount(3.03), complete: applyDiscount(7.52), caption: 'Cobrança mensal com fidelidade de 12 meses' }, 
       business: { monthlyFee: 1299, triage: applyDiscount(2.87), complete: applyDiscount(7.13), caption: 'Cobrança mensal com fidelidade de 12 meses' }, 
       enterprise: { monthlyFee: 2499, triage: applyDiscount(2.71), complete: applyDiscount(6.73), caption: 'Cobrança mensal com fidelidade de 12 meses' } 
     } 
   }; 

  const formatBRL = (value) => new Intl.NumberFormat('pt-BR', { 
    style: 'currency', 
    currency: 'BRL', 
    minimumFractionDigits: 2 
  }).format(value); 

  const buttons = document.querySelectorAll('.billing-btn'); 
  const cards = document.querySelectorAll('[data-plan]'); 

  function updatePricing(mode) { 
    buttons.forEach((button) => { 
      button.classList.toggle('active', button.dataset.billing === mode); 
    }); 

    cards.forEach((card) => { 
      const plan = card.dataset.plan; 
      const data = pricing[mode][plan]; 
      card.querySelector('[data-price]').textContent = formatBRL(data.monthlyFee); 
      card.querySelector('[data-caption]').textContent = data.caption; 
      card.querySelector('[data-triage]').textContent = formatBRL(data.triage); 
      card.querySelector('[data-complete]').textContent = formatBRL(data.complete); 
    }); 
  } 

  buttons.forEach((button) => { 
    button.addEventListener('click', () => updatePricing(button.dataset.billing)); 
  }); 

  updatePricing('annual'); 
</script>