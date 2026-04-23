<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="noindex, nofollow" />
  <title>Admin Portal - Simha Interactive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Bebas Neue', 'sans-serif'],
            body: ['Outfit', 'sans-serif'],
          },
          colors: {
            'brand-orange': '#FF5C1A',
            'brand-dark': '#080808',
            'brand-card': '#111111',
            'brand-border': '#1f1f1f',
          },
          animation: {
            'fade-up': 'fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards',
            'glow': 'glow 3s ease-in-out infinite alternate',
          },
          keyframes: {
            fadeUp: {
              '0%': { opacity: '0', transform: 'translateY(20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            glow: {
              '0%': { boxShadow: '0 0 10px rgba(255, 92, 26, 0.1)' },
              '100%': { boxShadow: '0 0 30px rgba(255, 92, 26, 0.3)' },
            }
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
      /* Subtle grid background to match the theme's high-tech aesthetic */
      background-image: radial-gradient(circle, #1a1a1a 1px, transparent 1px);
      background-size: 40px 40px;
    }
    
    .input-field {
      width: 100%;
      background: #080808;
      border: 1px solid #1f1f1f;
      color: #ffffff;
      padding: 1rem 1.25rem;
      transition: all 0.3s ease;
      font-family: 'Outfit', sans-serif;
      outline: none;
    }
    .input-field:focus {
      border-color: #FF5C1A;
      box-shadow: 0 0 0 2px rgba(255, 92, 26, 0.1);
    }
    
    .btn-submit {
      width: 100%;
      background-color: #FF5C1A;
      color: #ffffff;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.25rem;
      padding: 1rem;
      letter-spacing: 0.1em;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    .btn-submit:hover {
      background-color: #ffffff;
      color: #FF5C1A;
      transform: translateY(-2px);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

  <!-- Ambient light accents -->
  <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-[#FF5C1A] opacity-10 blur-[100px] pointer-events-none rounded-full"></div>
  <div class="fixed bottom-0 right-[-10%] w-[500px] h-[300px] bg-[#FF5C1A] opacity-10 blur-[120px] pointer-events-none rounded-full"></div>

  <div class="w-full max-w-md bg-brand-card border border-brand-border p-10 animate-fade-up animate-glow relative z-10 shadow-2xl">
    
    <!-- Header -->
    <div class="text-center mb-10">
      <div class="flex justify-center mb-6">
        <img src="{{ asset('assets/Simha Logo Web White.png') }}" alt="Simha Logo" class="h-10 w-auto object-contain">
      </div>
      <div class="flex items-center justify-center gap-3 mb-2">
        <div class="w-6 h-px bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Secured Access</span>
        <div class="w-6 h-px bg-brand-orange"></div>
      </div>
      <h1 class="font-display text-4xl text-white tracking-wide">Portal Login</h1>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="mb-6 p-4 border border-red-900 bg-red-950/30 text-red-400 text-sm font-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div class="space-y-2">
            <label for="email" class="block font-body text-xs text-gray-400 tracking-widest uppercase">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                   class="input-field" placeholder="Enter your email...">
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="block font-body text-xs text-gray-400 tracking-widest uppercase">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="input-field" placeholder="Enter your password...">
        </div>

        <!-- Remember Me & Forgot Password (Optional, keeping minimal) -->
        <div class="flex items-center justify-between text-xs font-body tracking-wider text-gray-500">
            <label class="flex items-center gap-2 cursor-pointer hover:text-white transition-colors">
                <input type="checkbox" name="remember" class="accent-brand-orange w-4 h-4 bg-brand-dark border-brand-border">
                <span class="uppercase">Remember Session</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-submit mt-8">
            Access Dashboard
        </button>
    </form>

    <div class="mt-8 text-center border-t border-brand-border pt-6">
       <a href="{{ route('home') }}" class="font-body text-xs text-gray-500 tracking-widest uppercase hover:text-brand-orange transition-colors">
          &larr; Back to Website
       </a>
    </div>

  </div>

</body>
</html>
