<?php
$current_page = basename($_SERVER['PHP_SELF']);
$links = [
    '/' => 'Home',
    '/#solucoes' => 'Soluções',
    '/precos.php' => 'Preços',
    '/contato.php' => 'Contato',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CreditBiro - Triagem de Crédito e Consultas CPF/CNPJ">
    <title><?php echo isset($page_title) ? $page_title . ' - CreditBiro' : 'CreditBiro'; ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F172A',
                        secondary: '#3B82F6',
                        accent: '#10B981',
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <!-- Icons (Lucide via unpkg - simpler than react-lucide for PHP) -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased flex flex-col min-h-screen">

<header class="bg-white border-b border-slate-200 sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
        <a href="/" class="text-2xl font-bold text-blue-600 flex items-center gap-2">
            <!-- Simple SVG Logo Placeholder -->
            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/></svg>
            CreditBiro
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-8">
            <?php foreach ($links as $href => $label): ?>
                <a href="<?php echo $href; ?>" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">
                    <?php echo $label; ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="hidden md:flex items-center gap-4">
            <a href="https://app.creditbiro.com.br/login" class="text-slate-600 hover:text-blue-600 font-medium">
                Login
            </a>
            <a href="/precos.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                Começar Grátis
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-slate-600 hover:text-blue-600">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         @click.away="mobileMenuOpen = false"
         x-transition
         class="md:hidden bg-white border-t border-slate-200 absolute w-full left-0 top-16 shadow-lg py-4 px-4 flex flex-col gap-4">
        <?php foreach ($links as $href => $label): ?>
            <a href="<?php echo $href; ?>" class="text-slate-600 hover:text-blue-600 font-medium block">
                <?php echo $label; ?>
            </a>
        <?php endforeach; ?>
        <hr class="border-slate-100">
        <a href="https://app.creditbiro.com.br/login" class="text-slate-600 hover:text-blue-600 font-medium block">
            Login
        </a>
        <a href="/precos.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium text-center block">
            Começar Grátis
        </a>
    </div>
</header>
<main class="flex-grow">
