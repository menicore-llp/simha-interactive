<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Blogs - Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&family=DM+Sans:ital@0;1&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Bebas Neue', 'sans-serif'],
                        body: ['Outfit', 'sans-serif'],
                        accent: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        'brand-orange': '#FF5C1A',
                        'brand-dark': '#080808',
                        'brand-card': '#111111',
                        'brand-border': '#1f1f1f',
                        'brand-muted': '#5a5a5a',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #080808;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
        }

        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: color 0.3s ease;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: #ffffff;
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 0;
        }
        .btn-primary:hover::before { transform: translateX(0); }
        .btn-primary span { position: relative; z-index: 1; }
        .btn-primary:hover { color: #ffffff; border-color: #FF5C1A; }

        .btn-ghost {
            position: relative;
            overflow: hidden;
            transition: color 0.3s ease;
        }
        .btn-ghost::before {
            content: '';
            position: absolute;
            inset: 0;
            background: #ffffff;
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 0;
        }
        .btn-ghost:hover::before { transform: translateX(0); }
        .btn-ghost span { position: relative; z-index: 1; }
        .btn-ghost:hover { color: #080808; }

        /* Scrollbar styling for a dark theme */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #080808; 
        }
        ::-webkit-scrollbar-thumb {
            background: #1f1f1f; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #FF5C1A; 
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Top Navigation Bar -->
    <nav class="sticky top-0 z-50 flex items-center justify-between px-8 md:px-16 py-5 border-b border-brand-border"
         style="background: linear-gradient(to bottom, rgba(8,8,8,0.95), transparent); backdrop-filter: blur(8px);">
        
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('assets/Simha Logo Web White.png') }}" alt="Logo" class="h-8 object-contain">
            </a>
            
            <div class="hidden sm:flex sm:space-x-8 mt-2">
                <a href="{{ route('admin.blogs.index') }}"
                   class="font-body text-sm tracking-widest uppercase border-b-2 {{ request()->routeIs('admin.blogs.*') ? 'border-brand-orange text-brand-orange' : 'border-transparent text-gray-400 hover:text-white hover:border-white transition-colors' }}">
                    Manage Blogs
                </a>
            </div>
        </div>
        
        <div class="flex flex-row gap-6 items-center">
             <a href="{{ route('home') }}" class="font-body text-sm text-gray-400 hover:text-white transition tracking-widest uppercase mt-1">Back to site</a>
             
             @auth
             <form method="POST" action="{{ route('admin.logout') }}" class="m-0 p-0">
                 @csrf
                 <button type="submit" class="font-body text-sm text-brand-orange hover:text-white transition tracking-widest uppercase mt-1 cursor-pointer">
                     Logout
                 </button>
             </form>
             @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow w-full py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-brand-border mt-auto shrink-0 py-6 px-4">
        <div class="max-w-7xl mx-auto flex flex-col items-center justify-center">
            <p class="font-body text-sm text-gray-500 tracking-wider">
                &copy; {{ date('Y') }} Simha Interactive Admin.
            </p>
        </div>
    </footer>

</body>
</html>
