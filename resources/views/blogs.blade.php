<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>Our Blogs - Simha Interactive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&family=DM+Sans:ital@0;1&display=swap" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/nexa-bold" rel="stylesheet">

  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18229527475"></script> 
   <script> 
     window.dataLayer = window.dataLayer || []; 
     function gtag(){
       dataLayer.push(arguments);
       } 
     gtag('js', new Date()); |
     gtag('config', 'AW-18229527475'); 
   </script>
  
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

    .nav-desktop,
    .nav-cta {
      display: none;
    }
    .nav-toggle {
      display: inline-flex;
    }
    @media (min-width: 1111px) {
      .nav-desktop {
        display: flex;
      }
      .nav-cta {
        display: inline-flex;
      }
      .nav-toggle {
        display: none;
      }
    }

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
  </style>
</head>

<body>

  <!-- ============================================================ -->
  <!--  NAVBAR                                                       -->
  <!-- ============================================================ -->
  <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-8 md:px-16 py-5"
       style="background: linear-gradient(to bottom, rgba(8,8,8,0.95), transparent); backdrop-filter: blur(8px);">

        <!-- Logo -->
        <a href="#" class="flex items-center gap-3 opacity-0 animate-fade-in delay-100"
      style="animation-fill-mode: forwards;">
      
      <!-- Icon box -->
      <div class="flex h-8 sm:h-10 lg:h-12 w-auto overflow-hidden">
        <img src="{{ asset('assets/Simha Logo Web White.png') }}" 
            alt="Simha Interactive Icon"
            class="h-full w-auto object-contain">
      </div>
    </a>

    <!-- Nav links -->
    <div class="nav-desktop items-center gap-10 opacity-0 animate-fade-in delay-300"
         style="animation-fill-mode: forwards;">
      <a href="{{ route('home') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">We Do</a>
      <a href="{{ route('about') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">We Are</a>
      <a href="{{ route('services') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Services</a>
      <a href="{{ route('portfolio') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Portfolio</a>
      <a href="{{ route('blogs') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Blogs</a>
      <a href="{{ route('contact') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Contact us</a>
    </div>

    <!-- CTA -->
    <a href="{{ route('contact') }}"
      class="btn-ghost nav-cta items-center gap-2 border border-white/20 text-white px-6 py-2.5 text-sm font-body tracking-widest 
              uppercase opacity-0 animate-fade-in"
       style="animation-fill-mode: forwards;">
      <span>Start Project</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="btn-ghost w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
      </svg>
    </a>

    <!-- Hamburger (Mobile Only) -->
        <button onclick="toggleMenu()" class="nav-toggle text-white" aria-label="Toggle menu">
          <svg xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
              class="w-6 h-6">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>

    <!-- Mobile hamburger -->
    <div id="mobileMenu"
      class="fixed top-0 left-0 w-full h-screen z-[999] flex flex-col items-center justify-center gap-8 text-white font-medium backdrop-blur-md bg-black/95 transform -translate-y-full transition-transform duration-500">

      <!-- Close button -->
      <button onclick="toggleMenu()" class="absolute top-4 right-4 text-white hover:text-brand-orange">
        ✕
      </button>

      <a href="{{ route('home') }}" class="nav-link text-gray-400 hover:text-white uppercase">We Do</a>
      <a href="{{ route('about') }}" class="nav-link text-gray-400 hover:text-white uppercase">We Are</a>
      <a href="{{ route('services') }}" class="nav-link text-gray-400 hover:text-white uppercase">Services</a>
      <a href="{{ route('portfolio') }}" class="nav-link text-gray-400 hover:text-white uppercase">Portfolio</a>
      <a href="{{ route('blogs') }}" class="nav-link text-gray-400 hover:text-white uppercase">Blogs</a>
      <a href="{{ route('contact') }}" class="nav-link text-gray-400 hover:text-white uppercase">Contact us</a>
    
      <div>
        <a href="{{ route('contact') }}" class="btn-ghost md:hidden inline-flex items-center gap-2 border border-white/20 text-white px-6 py-2.5 text-sm font-body tracking-widest uppercase">
          <span>Start Project</span>
        </a>
      </div>

    </div>
  </nav>

  <!-- ============================================================ -->
  <!--  HERO SECTION                                                 -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pt-40 pb-20 md:pt-48 md:pb-24 px-5 sm:px-8 md:px-16 lg:px-24">
    <div class="relative z-10 max-w-5xl mx-auto flex flex-col items-center text-center gap-6">
      <div class="reveal-item flex items-center justify-center gap-3">
        <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Inside Our Minds</span>
        <div class="w-[36px] h-[2px] bg-brand-orange"></div>
      </div>
      <h1 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 6.5rem);">Our Blogs</h1>
      <p class="reveal-item font-body text-gray-400 text-base md:text-xl max-w-2xl mt-4 leading-relaxed font-medium lg:font-normal">
        Insights, thoughts, and industry perspectives on strategy, cutting-edge design, and the future of digital engagement.
      </p>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  BLOGS GRID SECTION                                           -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pb-24 px-5 sm:px-8 md:px-16 lg:px-24 border-b border-brand-border">
    <div class="relative z-10 max-w-7xl mx-auto">
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 w-full text-left">
        @forelse($blogs as $idx => $blog)
        <a href="{{ route('blog-detail', $blog->slug) }}" class="reveal-item group relative border border-brand-border p-5 flex flex-col gap-4 w-full h-full hover:border-white transition-all duration-300 transform bg-[#0e0e0e] max-w-xl mx-auto" style="transition-delay: {{ ($idx % 3) * 100 }}ms;">
          <div class="w-8 h-px bg-brand-orange"></div>
          
          <!-- Image -->
          <div class="w-full h-56 overflow-hidden mb-2 bg-[#080808]">
             @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover group-hover:opacity-100 transition-all duration-500 scale-100 group-hover:scale-105" alt="{{ $blog->title }}">
             @else
                <div class="w-full h-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-[#1f1f1f] group-hover:text-brand-orange transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6M9 11l3 3L22 4" />
                    </svg>
                </div>
             @endif
          </div>

          <div class="flex-1 flex flex-col">
            <p class="font-body text-brand-orange font-medium text-xs tracking-wider uppercase mb-2">{{ $blog->category }}</p>
            <h3 class="font-body text-white font-medium text-2xl leading-snug mb-3 group-hover:text-brand-orange transition-colors">
              {{ $blog->title }}
            </h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed line-clamp-3 mb-6">
              {{ $blog->short_description }}
            </p>
          </div>
          
          <div class="mt-auto pt-4 border-t border-brand-border flex justify-between items-center text-xs font-body text-gray-500 uppercase tracking-widest">
            <span>{{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}</span>
            <span class="group-hover:text-brand-orange transition-colors inline-flex items-center gap-2">
                Read Article
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </span>
          </div>

          <!-- Hover corner accent -->
          <div class="absolute bottom-2 right-2 w-0 h-0 group-hover:w-6 group-hover:h-6 transition-all duration-300 pointer-events-none" style="border-right: 2px solid #FF5C1A; border-bottom: 2px solid #FF5C1A;"></div>
        </a>
        @empty
        <div class="col-span-full py-20 text-center flex flex-col items-center justify-center">
             <div class="w-16 h-px bg-brand-border mb-6"></div>
             <h3 class="font-display text-2xl text-gray-500 tracking-wide uppercase">No Blog Entries Found</h3>
             <p class="font-body text-gray-600 mt-2">Check back soon for new insights and perspectives.</p>
        </div>
        @endforelse
      </div>

      <!-- Pagination -->
      @if($blogs->hasPages())
      <div class="mt-16 pt-8 border-t border-brand-border flex justify-center">
         {{ $blogs->links('pagination::tailwind') }}
      </div>
      @endif

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
