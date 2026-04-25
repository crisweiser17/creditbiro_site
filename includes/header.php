<?php
$current_page = basename($_SERVER['PHP_SELF']);
$links = [
    '/' => 'Home',
    '/#solucoes' => 'Soluções',
    '/#calculadora-home' => 'Calculadora',
    '/#planos' => 'Preços',
    '/contato' => 'Contato',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'CreditBiro - Triagem de Crédito e Consultas CPF/CNPJ'; ?>">
    <title><?php echo isset($page_title) ? $page_title . ' - CreditBiro' : 'CreditBiro'; ?></title>
    
    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo 'https://' . ($_SERVER['HTTP_HOST'] ?? 'creditbiro.com.br') . ($_SERVER['REQUEST_URI'] ?? '/'); ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - CreditBiro' : 'CreditBiro'; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : 'CreditBiro - Triagem de Crédito e Consultas CPF/CNPJ'; ?>">
    <meta property="og:image" content="<?php echo isset($page_image) ? $page_image : 'https://' . ($_SERVER['HTTP_HOST'] ?? 'creditbiro.com.br') . '/assets/img/og-image.jpg'; ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo 'https://' . ($_SERVER['HTTP_HOST'] ?? 'creditbiro.com.br') . ($_SERVER['REQUEST_URI'] ?? '/'); ?>">
    <meta property="twitter:title" content="<?php echo isset($page_title) ? $page_title . ' - CreditBiro' : 'CreditBiro'; ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : 'CreditBiro - Triagem de Crédito e Consultas CPF/CNPJ'; ?>">
    <meta property="twitter:image" content="<?php echo isset($page_image) ? $page_image : 'https://' . ($_SERVER['HTTP_HOST'] ?? 'creditbiro.com.br') . '/assets/img/og-image.jpg'; ?>">
    
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
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased flex flex-col min-h-screen">

<header class="bg-white border-b border-slate-200 sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2">
            <img src="/assets/img/logo.png" alt="CreditBiro" class="h-10 w-auto">
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-8">
            <?php foreach ($links as $href => $label): ?>
                <?php
                    // Remove .php extension for display
                    $href = str_replace('.php', '', $href);
                    if ($href == '/index') $href = '/';
                ?>
                <a href="<?php echo $href; ?>" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">
                    <?php echo $label; ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="hidden md:flex items-center gap-4">
            <a href="https://app.creditbiro.com.br/login" class="text-slate-600 hover:text-blue-600 font-medium">
                Login
            </a>
            <a href="https://app.creditbiro.com.br/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                Começar Agora
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
            <?php
                // Remove .php extension for display
                $href = str_replace('.php', '', $href);
                if ($href == '/index') $href = '/';
            ?>
            <a href="<?php echo $href; ?>" class="text-slate-600 hover:text-blue-600 font-medium block">
                <?php echo $label; ?>
            </a>
        <?php endforeach; ?>
        <hr class="border-slate-100">
        <a href="https://app.creditbiro.com.br/login" class="text-slate-600 hover:text-blue-600 font-medium block">
            Login
        </a>
        <a href="https://app.creditbiro.com.br/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium text-center block">
            Começar Agora
        </a>
    </div>
</header>
<main class="flex-grow">
