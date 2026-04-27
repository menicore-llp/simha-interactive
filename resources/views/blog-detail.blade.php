<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>{{ $blog->title }} - Simha Interactive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&family=DM+Sans:ital@0;1&display=swap" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/nexa-bold" rel="stylesheet">

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
          },
          animation: {
            'fade-up': 'fadeUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards',
            'fade-in': 'fadeIn 1.2s ease forwards',
          },
          keyframes: {
            fadeUp: {
              '0%': { opacity: '0', transform: 'translateY(40px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            }
          }
        }
      }
    }

    function toggleMenu() {
      const menu = document.getElementById("mobileMenu");
      menu.classList.toggle("-translate-y-full");
      if (!menu.classList.contains("-translate-y-full")) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "auto";
      }
    }

    // Intersection Observer for scroll reveal animations
    document.addEventListener("DOMContentLoaded", function() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
          }
        });
      }, { threshold: 0.15 });

      document.querySelectorAll('.reveal-item').forEach((item) => {
        observer.observe(item);
      });
    });
  </script>

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background-color: #080808;
      color: #ffffff;
      font-family: 'Outfit', sans-serif;
      overflow-x: hidden;
    }
    
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
    .btn-ghost:hover { color: #080808; border-color: #ffffff !important; }

    .nav-link {
      position: relative;
      display: inline-block;
      width: fit-content;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: #ffffff;
      transition: width 0.3s ease;
    }
    .nav-link:hover::after { width: 100%; }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    
    .reveal-item {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal-item.is-visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar { width: 8px; height: 8px; }
    ::-webkit-scrollbar-track { background: #080808; }
    ::-webkit-scrollbar-thumb { background: #1f1f1f; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #FF5C1A; }

    /* Blog Content Styles */
    .prose-dark {
      word-wrap: break-word;
      overflow-wrap: break-word;
    }
    .prose-dark p { margin-bottom: 1.5em; line-height: 1.8; color: #a1a1aa; }
    .prose-dark h1, .prose-dark h2, .prose-dark h3 { font-family: 'Bebas Neue', sans-serif; color: #ffffff; margin-bottom: 1rem; margin-top: 2rem; letter-spacing: 0.05em; }
    .prose-dark h1 { font-size: clamp(2.5rem, 5vw, 3rem); line-height: 1.1; }
    .prose-dark h2 { font-size: clamp(2rem, 4vw, 2.5rem); line-height: 1.2; }
    .prose-dark h3 { font-size: clamp(1.5rem, 3vw, 1.8rem); line-height: 1.3; }
    .prose-dark a { color: #FF5C1A; text-decoration: none; border-bottom: 1px solid #FF5C1A; padding-bottom: 1px; transition: color 0.3s, border-color 0.3s; word-break: break-all; }
    .prose-dark a:hover { color: #ffffff; border-color: #ffffff; }
    .prose-dark ul, .prose-dark ol { margin-bottom: 1.5rem; padding-left: 1.5rem; color: #a1a1aa; }
    .prose-dark li { margin-bottom: 0.5rem; }
    .prose-dark blockquote { border-left: 3px solid #FF5C1A; padding-left: 1.5rem; font-style: italic; color: #d4d4d8; margin: 2rem 0; }
    
    /* Make inline assets responsive */
    .prose-dark img { max-width: 100%; height: auto; border-radius: 4px; margin: 2rem 0; display: block; }
    .prose-dark iframe, .prose-dark video { max-width: 100%; margin: 2rem 0; }
    .prose-dark pre, .prose-dark code { max-width: 100%; overflow-x: auto; white-space: pre-wrap; word-wrap: break-word; }
  </style>
</head>

<body>

  <!-- ============================================================ -->
  <!--  NAVBAR                                                       -->
  <!-- ============================================================ -->
  <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-8 md:px-16 py-5"
       style="background: linear-gradient(to bottom, rgba(8,8,8,0.95), transparent); backdrop-filter: blur(8px);">

    <a href="{{ route('home') }}" class="flex items-center gap-3 opacity-0 animate-fade-in delay-100" style="animation-fill-mode: forwards;">
      <!-- Icon box -->
      <div class="flex h-8 sm:h-10 lg:h-12 w-auto overflow-hidden">
        <img src="{{ asset('assets/Simha Logo Web White.png') }}" 
             alt="Simha Interactive Icon"
             class="h-full w-auto object-contain">
      </div>
    </a>

    <div class="hidden md:flex items-center gap-10 opacity-0 animate-fade-in delay-300" style="animation-fill-mode: forwards;">
      <a href="{{ route('home') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">We Do</a>
      <a href="{{ route('about') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">We Are</a>
      <a href="{{ route('services') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Services</a>
      <a href="{{ route('portfolio') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Portfolio</a>
      <a href="{{ route('blogs') }}" class="nav-link font-body text-sm text-white transition-colors tracking-wider uppercase">Blogs</a>
      <a href="{{ route('contact') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Contact us</a>
    </div>

    <a href="{{ route('contact') }}" class="btn-ghost hidden md:inline-flex items-center gap-2 border border-white/20 text-white px-6 py-2.5 text-sm font-body tracking-widest uppercase opacity-0 animate-fade-in" style="animation-fill-mode: forwards;">
      <span>Start Project</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
      </svg>
    </a>

    <button onclick="toggleMenu()" class="md:hidden text-white" aria-label="Toggle menu">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <div id="mobileMenu" class="fixed top-0 left-0 w-full h-screen z-[999] flex flex-col items-center justify-center gap-8 text-white font-medium backdrop-blur-md bg-black/95 transform -translate-y-full transition-transform duration-500">
      <button onclick="toggleMenu()" class="absolute top-4 right-4 text-white hover:text-brand-orange">✕</button>
      <a href="{{ route('home') }}" class="nav-link text-gray-400 hover:text-white uppercase">We Do</a>
      <a href="{{ route('about') }}" class="nav-link text-gray-400 hover:text-white uppercase">We Are</a>
      <a href="{{ route('services') }}" class="nav-link text-gray-400 hover:text-white uppercase">Services</a>
      <a href="{{ route('portfolio') }}" class="nav-link text-gray-400 hover:text-white uppercase">Portfolio</a>
      <a href="{{ route('blogs') }}" class="nav-link text-white uppercase">Blogs</a>
      <a href="{{ route('contact') }}" class="nav-link text-gray-400 hover:text-white uppercase">Contact us</a>
      <div>
        <a href="{{ route('contact') }}" class="btn-ghost inline-flex items-center gap-2 border border-white/20 text-white px-6 py-2.5 text-sm font-body tracking-widest uppercase">
          <span>Start Project</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- ============================================================ -->
  <!--  BLOG HERO SECTION                                            -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pt-40 pb-16 md:pt-48 md:pb-24 px-5 sm:px-8 md:px-16 lg:px-24">
    <div class="relative z-10 max-w-4xl mx-auto flex flex-col items-center text-center gap-6">
      
      <div class="reveal-item flex items-center justify-center gap-3">
        <div class="w-8 h-px bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">{{ $blog->category }}</span>
        <div class="w-8 h-px bg-brand-orange"></div>
      </div>
      
      <h1 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 6vw, 5.5rem);">
        {{ $blog->title }}
      </h1>
      
      @if($blog->short_description)
      <p class="reveal-item font-body text-gray-300 text-base md:text-lg max-w-3xl leading-relaxed mt-2" style="transition-delay: 50ms;">
        {{ $blog->short_description }}
      </p>
      @endif
      
      <div class="reveal-item flex items-center gap-6 mt-4 opacity-80" style="transition-delay: 100ms;">
        <div class="flex items-center gap-2 font-body text-sm text-gray-400 tracking-wider uppercase">
          <span>By {{ $blog->author ?? 'Simha Editiorial' }}</span>
        </div>
        <div class="w-1 h-1 rounded-full bg-brand-orange"></div>
        <div class="font-body text-sm text-gray-400 tracking-wider uppercase">
          {{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  BLOG CONTENT SECTION                                         -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pb-24 md:pb-36 px-5 sm:px-8 md:px-16 lg:px-24">
    <div class="relative z-10 max-w-4xl mx-auto">
      
      @if($blog->image)
      <div class="reveal-item w-full mb-16 border border-brand-border bg-[#0e0e0e] flex items-center justify-center overflow-hidden" style="min-h: 300px; max-height: 600px;">
         <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-auto object-cover max-h-[600px] transition-all duration-700" alt="{{ $blog->title }}">
      </div>
      @endif

      <div class="reveal-item font-body text-base md:text-lg prose-dark" style="transition-delay: 200ms;">
        <!-- Injecting HTML Content from WYSIWYG -->
        {!! $blog->content !!}
      </div>

      <!-- TAGS -->
      @if($blog->tags)
      <div class="reveal-item mt-16 pt-8 border-t border-brand-border" style="transition-delay: 300ms;">
         <div class="flex flex-wrap gap-3 items-center">
            <span class="font-body text-xs text-gray-600 tracking-widest uppercase mr-3">Tags:</span>
            @foreach(explode(',', $blog->tags) as $tag)
               <span class="bg-[#111111] border border-brand-border px-4 py-2 text-xs font-body tracking-wider uppercase text-gray-400 hover:text-brand-orange hover:border-brand-orange/50 transition-colors">
                  {{ trim($tag) }}
               </span>
            @endforeach
         </div>
      </div>
      @endif

      <!-- Back to Blogs -->
      <div class="reveal-item mt-12 flex justify-center">
         <a href="{{ route('blogs') }}" class="group inline-flex items-center gap-4" style="text-decoration: none;">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/30 group-hover:text-brand-orange group-hover:-translate-x-1 transition-all duration-300 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
          <span class="font-body text-sm text-white tracking-[0.3em] uppercase border-b border-white/20 pb-1 group-hover:border-brand-orange group-hover:text-brand-orange transition-all duration-300">
            Back to Blogs
          </span>
        </a>
      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  CALL TO ACTION SECTION                                       -->
  <!-- ============================================================ -->
  <section class="relative bg-white overflow-hidden py-16 md:py-24 px-5 sm:px-8 md:px-16 lg:px-24 flex flex-col items-center justify-center">

    <div class="relative z-10 w-full max-w-7xl mx-auto flex flex-col items-center justify-center text-center gap-6">
      <!-- Small label -->
      <div class="reveal-item flex items-center justify-center gap-3">
        <div class="w-8 h-px bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] font-medium uppercase">
          Ready to Start?
        </span>
        <div class="w-8 h-px bg-brand-orange"></div>
      </div>

      <!-- Headline -->
      <h2 class="reveal-item font-display text-brand-dark leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem); transition-delay: 100ms;">
        Let’s Build Something <br/>Extraordinary
      </h2>

      <!-- Description -->
      <p class="reveal-item font-body text-gray-500 text-sm sm:text-base md:text-lg max-w-2xl mt-2 mx-auto leading-relaxed" style="transition-delay: 200ms;">
        Tell us about your vision, and we’ll turn it into reality. Partner with us to scale your brand through strategy, high-end visuals, and deep engagement.
      </p>

      <!-- CTA Button -->
      <div class="reveal-item mt-8" style="transition-delay: 300ms;">
        <a href="{{ route('contact') }}" class="relative overflow-hidden group bg-white text-black border border-gray-300 px-10 py-5 rounded-full font-body text-sm tracking-widest uppercase text-center inline-flex items-center gap-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-brand-black">
          <div class="absolute inset-0 bg-black scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500 ease-out z-0"></div>
          <span class="relative z-10 font-medium group-hover:text-white transition-colors duration-300">Contact Us</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-4 h-4 group-hover:text-white group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  FOOTER                                                       -->
  <!-- ============================================================ -->
  <footer class="relative bg-brand-dark border-t border-brand-border px-8 md:px-16 lg:px-24 py-16 md:py-20 overflow-hidden">
    <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">
      <div class="flex flex-col gap-6">
        <!-- Logo -->
        <div class="flex items-center gap-3">
          <div class="h-10 w-auto overflow-hidden">
            <img src="{{ asset('assets/Simha Logo Web White.png') }}" alt="Simha Logo" class="h-full w-auto object-contain">
          </div>
        </div>
        <p class="text-gray-500 text-sm font-body leading-relaxed max-w-xs">
          © 2026 Simha Interactive. All Rights Reserved.
        </p>
      </div>

      <div class="flex flex-col gap-6">
        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">Quick Links</h4>
        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">
          <a href="{{ route('home') }}" class="nav-link hover:text-white transition">Home</a>
          <a href="{{ route('about') }}" class="nav-link hover:text-white transition">About</a>
          <a href="{{ route('services') }}" class="nav-link hover:text-white transition">Services</a>
          <a href="{{ route('portfolio') }}" class="nav-link hover:text-white transition">Portfolio</a>
          <a href="{{ route('blogs') }}" class="nav-link text-white transition">Blogs</a>
          <a href="{{ route('contact') }}" class="nav-link hover:text-white transition">Contact Us</a>
        </div>
      </div>

      <div class="flex flex-col gap-6">
        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">Services</h4>
        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">
          <a href="{{ route('services') }}#design" class="nav-link hover:text-white transition">Design</a>
          <a href="{{ route('services') }}#visualization" class="nav-link hover:text-white transition">Visualization</a>
          <a href="{{ route('services') }}#marketing" class="nav-link hover:text-white transition">Marketing</a>
          <a href="{{ route('services') }}#engagement" class="nav-link hover:text-white transition">Engagement Content</a>
        </div>
      </div>
    </div>

    <div class="relative z-10 mt-12 border-t border-brand-border pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-xs font-body">
      <span>Built with precision and creativity.</span>
      <span class="tracking-widest uppercase text-gray-600">Simha Interactive</span>
    </div>
  </footer>

</body>
</html>
