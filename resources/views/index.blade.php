<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>Simha Interactive</title>
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
          },
          animation: {
            'fade-up': 'fadeUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards',
            'fade-in': 'fadeIn 1.2s ease forwards',
            'scroll-bounce': 'scrollBounce 2s ease-in-out infinite',
            'marquee': 'marquee 20s linear infinite',
            'marquee-reverse': 'marqueeReverse 20s linear infinite',
            'grain': 'grain 0.5s steps(2) infinite',
          },
          keyframes: {
            fadeUp: {
              '0%': { opacity: '0', transform: 'translateY(40px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' },
            },
            scrollBounce: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(8px)' },
            },
            marquee: {
              '0%': { transform: 'translateX(0%)' },
              '100%': { transform: 'translateX(-50%)' },
            },
            marqueeReverse: {
              '0%': { transform: 'translateX(-50%)' },
              '100%': { transform: 'translateX(0%)' },
            },
            grain: {
              '0%, 100%': { backgroundPosition: '0% 0%' },
              '25%': { backgroundPosition: '50% 25%' },
              '50%': { backgroundPosition: '100% 50%' },
              '75%': { backgroundPosition: '25% 75%' },
            }
          }
        }
      }
    }

    function toggleMenu() {
      const menu = document.getElementById("mobileMenu");

      menu.classList.toggle("-translate-y-full");

      // Prevent scroll when open
      if (!menu.classList.contains("-translate-y-full")) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "auto";
      }
    }
  </script>

  <style>
    html {
      scroll-behavior: smooth;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      background-color: #080808;
      color: #ffffff;
      font-family: 'Outfit', sans-serif;
      overflow-x: hidden;
    }
    
    /* Button hover slide effect */
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

    /* Headline word animation stagger */
    .word { display: inline-block; overflow: hidden; }
    .word-inner {
      display: inline-block;
      opacity: 0;
      transform: translateX(-40px);
      animation: wordReveal 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes wordReveal {
      to { opacity: 1; transform: translateX(0); }
    }

    /* Delay utilities */
    .delay-100 { animation-delay: 0.1s; }
    .delay-300 { animation-delay: 0.3s; }

    /* Navbar link hover */
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

    /* Stats fade in */
    .stat-item {
      opacity: 0;
      animation: fadeUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }    

    /* Orange line accent */
    .accent-line {
      width: 40px;
      height: 2px;
      background: #FF5C1A;
    }

    /* Hero image card float */
    .float-card {
      animation: floatY 4s ease-in-out infinite;
    }
    @keyframes floatY {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-12px); }
    }

    /* Counter number style */
    .counter-num {
      font-family: 'Bebas Neue', sans-serif;
      line-height: 1;
    }

    /* Responsive headline */
    @media (max-width: 768px) {
      .hero-headline { font-size: clamp(2.8rem, 10vw, 5rem); }
    }

    /* Services Background */
    .services-bg {
      background-color: #080808;
      background-image: radial-gradient(circle, #2a2a2a 1.5px, transparent 1.5px);
      background-size: 32px 32px;
      position: relative;
    }

    /* Pulse ring animation */
    @keyframes pulseRing {
      0% { transform: scale(1); opacity: 0.4; }
      100% { transform: scale(1.5); opacity: 0; }
    }
    .pulse-ring::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 9999px;
      border: 1px solid #FF5C1A;
      animation: pulseRing 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
      pointer-events: none;
      z-index: -1;
    }

    /* Hide scrollbar */
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    /* Fade up animation classes for IntersectionObserver */
    .reveal-item {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal-item.is-visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Blinking typing cursor */
    .typing-cursor::after {
      content: '';
      display: inline-block;
      width: 3px;
      height: 0.85em;
      background-color: #ffffff;
      animation: blink 1s step-start infinite;
      margin-left: 8px;
    }
    @keyframes blink { 50% { opacity: 0; } }
  </style>
  <link href="https://fonts.cdnfonts.com/css/nexa-bold" rel="stylesheet">
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
  <!--  HERO VIDEO SECTION                                          -->
  <!-- ============================================================ -->
  <section id="hero-video-section" class="relative min-h-screen w-full flex flex-col justify-center overflow-hidden z-0 bg-brand-dark">
    <!-- Background Video -->
    <video src="{{ asset('assets/landing_page_video.mp4') }}" 
           autoplay loop muted playsinline 
           class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none"></video>
  </section>

  <!-- ============================================================ -->
  <!--  HERO TEXT SECTION                                           -->
  <!-- ============================================================ -->
  <section id="hero-text-section" class="relative flex flex-col justify-center overflow-hidden z-0 py-20 md:py-32"
           style="background-color: #080808;">
    
    <!-- Main hero content -->
    <div class="flex-1 flex flex-col justify-center px-8 md:px-16 lg:px-24 relative z-10 w-full max-w-screen-2xl mx-auto">

      <!-- Small badge label -->
      <div class="flex items-center justify-center gap-3 mb-8 opacity-0 animate-fade-in mx-auto"
           style="animation-delay: 0.3s; animation-fill-mode: forwards;">
        <div class="accent-line"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">
          Full-Service Creative Agency
        </span>
        <div class="accent-line"></div>
      </div>

      <!-- BIG headline -->
      <h1 class="hero-headline font-display text-white font-normal text-center leading-tight md:leading-none mb-6 max-w-7xl mx-auto"
          style="font-size: clamp(2.5rem, 6vw, 6.5rem); letter-spacing: 0.02em; font-weight: 300;">
        <span id="typewriter-text" class="typing-cursor"></span>
      </h1>

      <!-- Subheadline -->
      <p class="font-body text-gray-400 text-center leading-relaxed max-w-2xl mx-auto text-base lg:text-lg mb-10 opacity-0 animate-fade-in"
         style="animation-delay: 1s; animation-fill-mode: forwards;">
        A full-service creative agency delivering strategic design, high-end visualization,
        performance marketing, and immersive engagement solutions.
      </p>

      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row justify-center gap-4 opacity-0 animate-fade-in mx-auto"
           style="animation-delay: 1.2s; animation-fill-mode: forwards; flex-shrink: 0;">

        <a href="{{ route('portfolio') }}"
           class="btn-ghost border border-white text-white px-8 py-4 font-body text-sm tracking-widest uppercase text-center">
          <span>Explore Our Work</span>
        </a>

        <a href="{{ route('contact') }}"
           class="btn-ghost border border-white text-white px-8 py-4 font-body text-sm tracking-widest uppercase text-center">
          <span>Start Your Project</span>
        </a>

      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  ABOUT PREVIEW SECTION                                        -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-8 md:px-16 lg:px-24">

    <!-- Diagonal stripes -->
    <div class="diagonal-stripes"></div>

    <!-- Main container -->
    <div class="relative z-10 flex flex-col items-center text-center gap-16 max-w-7xl mx-auto">

      <!-- TOP HEADER -->
      <div class="flex flex-col items-center gap-6 max-w-3xl mx-auto text-center">

        <!-- Small label -->
        <div class="flex items-center justify-center gap-3 w-full">
          <div class="w-8 h-px bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">
            Who We Are
          </span>
          <div class="w-8 h-px bg-brand-orange"></div>
        </div>

        <!-- Heading -->
        <h2 class="font-display text-white leading-none"
            style="font-size: clamp(3rem, 7vw, 5.5rem);">
          A Creative Force <br/>
          <span class="text-brand-white">Driven By Strategy</span>
        </h2>

        <!-- Paragraph -->
        <p class="font-body text-gray-400 leading-relaxed text-base lg:text-lg max-w-2xl mt-4 mx-auto">
          We are a multidisciplinary creative agency driven by design excellence,
          and cutting-edge technology. From building powerful brand identities to crafting
          immersive AR/VR experiences, we help businesses stand out, scale faster, and
          connect deeper with their audience.
        </p>

      </div>

      <!-- CARDS ROW -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 w-full text-left">

        <!-- Card 1 — Design -->
        <div class="group relative border border-brand-border p-4 sm:p-5 md:p-6 flex flex-col gap-4 w-full min-h-[160px] sm:min-h-[180px] md:min-h-[220px]
                    hover:border-white transition-all duration-300 cursor-default"
            style="background: #0e0e0e;">
          <!-- Top icon line -->
          <div class="w-8 h-px bg-brand-orange"></div>
          <div class="font-display text-white text-3xl">
            01
          </div>
          <div>
            <h3 class="font-body text-white font-medium text-sm tracking-wider uppercase mb-2">
              Design
            </h3>
            <p class="font-body text-gray-600 text-[11px] sm:text-xs md:text-sm leading-relaxed break-words">
              Strategic branding & digital experiences that define your identity.
            </p>
          </div>
          <!-- Hover corner accent -->
          <div class="absolute bottom-2 right-2 w-0 h-0 
                      group-hover:w-6 group-hover:h-6 
                      transition-all duration-300 pointer-events-none"
              style="border-right: 2px solid #FF5C1A; border-bottom: 2px solid #FF5C1A;">
          </div>
        </div>

        <!-- Card 2 — Visualization -->
        <div class="group relative border border-brand-border p-4 sm:p-5 md:p-6 flex flex-col gap-4 transform w-full min-h-[160px] sm:min-h-[180px] md:min-h-[220px]
                    hover:border-white transition-all duration-300 cursor-default"
            style="background: #0e0e0e;">
          <div class="w-8 h-px bg-brand-orange"></div>
          <div class="font-display text-white text-3xl">
            02
          </div>
          <div>
            <h3 class="font-body text-white font-medium text-sm tracking-wider uppercase mb-2">
              Visualization
            </h3>
            <p class="font-body text-gray-600 text-[11px] sm:text-xs md:text-sm leading-relaxed break-words">
              Photorealistic renders & animations that bring concepts to life.
            </p>
          </div>
          <div class="absolute bottom-2 right-2 w-0 h-0 
                      group-hover:w-6 group-hover:h-6 
                      transition-all duration-300 pointer-events-none"
              style="border-right: 2px solid #FF5C1A; border-bottom: 2px solid #FF5C1A;">
          </div>
        </div>

        <!-- Card 3 — Marketing -->
        <div class="group relative border border-brand-border p-4 sm:p-5 md:p-6 flex flex-col gap-4 w-full min-h-[160px] sm:min-h-[180px] md:min-h-[220px]
                    hover:border-white transition-all duration-300 cursor-default"
            style="background: #0e0e0e;">
          <div class="w-8 h-px bg-brand-orange"></div>
          <div class="font-display text-white text-3xl">
            03
          </div>
          <div>
            <h3 class="font-body text-white font-medium text-sm tracking-wider uppercase mb-2">
              Marketing
            </h3>
            <p class="font-body text-gray-600 text-[11px] sm:text-xs md:text-sm leading-relaxed break-words">
              Performance-driven SEO & digital campaigns for measurable growth.
            </p>
          </div>
          <div class="absolute bottom-2 right-2 w-0 h-0 
                      group-hover:w-6 group-hover:h-6 
                      transition-all duration-300 pointer-events-none"
              style="border-right: 2px solid #FF5C1A; border-bottom: 2px solid #FF5C1A;">
          </div>
        </div>

        <!-- Card 4 — Engagement -->
        <div class="group relative border border-brand-border p-4 sm:p-5 md:p-6 flex flex-col gap-4 transform w-full min-h-[160px] sm:min-h-[180px] md:min-h-[220px]
                    hover:border-white transition-all duration-300 cursor-default"
            style="background: #0e0e0e;">
          <div class="w-8 h-px bg-brand-orange"></div>
          <div class="font-display text-white text-3xl">
            04
          </div>
          <div>
            <h3 class="font-body text-white font-medium text-sm tracking-wider uppercase mb-2">
              Engagement
            </h3>
            <p class="font-body text-gray-600 text-[11px] sm:text-xs md:text-sm leading-relaxed break-words">
              Immersive AR, VR, holographic & anamorphic experiences that captivate audiences.
            </p>
          </div>
          <div class="absolute bottom-2 right-2 w-0 h-0 
                      group-hover:w-6 group-hover:h-6 
                      transition-all duration-300 pointer-events-none"
              style="border-right: 2px solid #FF5C1A; border-bottom: 2px solid #FF5C1A;">
          </div>
        </div>

      </div>
      <!-- end cards row -->

      <!-- CTA text link -->
      <a href="{{ route('about') }}"
         class="group inline-flex items-center gap-4 mt-6"
         style="text-decoration: none;">
        <span class="font-body text-sm text-white tracking-[0.3em] uppercase
                    border-b border-white/20 pb-1
                    group-hover:border-brand-orange group-hover:text-brand-orange
                    transition-all duration-300">
          Learn More About Us
        </span>
        <span class="w-8 h-px bg-white/30 group-hover:w-14 group-hover:bg-brand-orange
                    transition-all duration-500 inline-block"></span>
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 text-white/30 group-hover:text-brand-orange
                    group-hover:translate-x-1 transition-all duration-300"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
      </a>

    </div>
    <!-- end main grid -->
  </section>

  <!-- ============================================================ -->
  <!--  WHY CHOOSE US SECTION                                        -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pb-16 pt-4 sm:pb-24 md:pb-36 px-5 sm:px-8 md:px-16 lg:px-24 border-b border-brand-border h-full">
    <!-- Diagonal stripes -->
    <div class="diagonal-stripes"></div>

    <!-- Main Container -->
    <div class="relative z-10 flex flex-col items-center gap-16 mt-16 max-w-7xl mx-auto">
      
      <!-- HEADER BLOCK -->
      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        
        <!-- Small label -->
        <div class="reveal-item flex items-center justify-center gap-3 w-full">
          <div class="w-10 h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">
            Why Choose Us
          </span>
          <div class="w-10 h-[2px] bg-brand-orange"></div>
        </div>

        <!-- Big Heading -->
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">
          The Simha Difference
        </h2>

        <!-- Description Paragraph -->
        <div class="reveal-item" style="transition-delay: 100ms;">
          <p class="font-body text-gray-400 text-sm sm:text-base leading-relaxed max-w-2xl">
            We don't just deliver projects — we become your creative partner. Every solution we build is rooted in strategy, powered by technology, and measured by results.
          </p>
        </div>

      </div>
      
      <!-- FEATURES GRID (6 points, 2 columns) -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 w-full">
        
        <!-- Item 1 -->
        <div class="feature-item group flex items-start gap-4 sm:gap-6 py-5 sm:py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-4" style="opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: 0ms;">
          <div class="font-display text-white text-2xl sm:text-3xl min-w-[3rem] opacity-50 group-hover:opacity-100 transition-opacity duration-300">01</div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Strategic + Creative Approach</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              We combine sharp creative thinking with data-backed Strategyto deliver work that looks exceptional and performs even better.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="feature-item group flex items-start gap-4 sm:gap-6 py-5 sm:py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-4" style="opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: 100ms;">
          <div class="font-display text-white text-2xl sm:text-3xl min-w-[3rem] opacity-50 group-hover:opacity-100 transition-opacity duration-300">02</div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Technology-Driven Execution</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              From AR/VR to real-time 3D and AI-powered workflows — we use cutting-edge technology to give your brand an unfair advantage.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="feature-item group flex items-start gap-4 sm:gap-6 py-5 sm:py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-4" style="opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: 200ms;">
          <div class="font-display text-white text-2xl sm:text-3xl min-w-[3rem] opacity-50 group-hover:opacity-100 transition-opacity duration-300">03</div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Industry Expertise</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              15+ years across real estate, hospitality, retail, and F&B — we understand your industry and know what moves your audience.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <!-- Item 4 -->
        <div class="feature-item group flex items-start gap-4 sm:gap-6 py-5 sm:py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-4" style="opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: 300ms;">
          <div class="font-display text-white text-2xl sm:text-3xl min-w-[3rem] opacity-50 group-hover:opacity-100 transition-opacity duration-300">04</div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">End-to-End Project Management</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              From brief to delivery, we handle every stage — Strategy, design, production, and activation — so you don't have to juggle vendors.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <!-- Item 5 -->
        <div class="feature-item group flex items-start gap-4 sm:gap-6 py-5 sm:py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-4 md:border-transparent" style="opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: 400ms;">
          <div class="font-display text-white text-2xl sm:text-3xl min-w-[3rem] opacity-50 group-hover:opacity-100 transition-opacity duration-300">05</div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Results-Focused Solutions</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Every project is tied to a measurable outcome — whether that's brand recall, lead generation, or audience engagement.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <!-- Item 6 (New) -->
        <div class="feature-item group flex items-start gap-4 sm:gap-6 py-5 sm:py-6 border-b border-transparent hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-4" style="opacity: 0; transform: translateY(20px); transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); transition-delay: 500ms;">
          <div class="font-display text-white text-2xl sm:text-3xl min-w-[3rem] opacity-50 group-hover:opacity-100 transition-opacity duration-300">06</div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Uncompromising Quality</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              We never settle for good enough. Our dedication to craftsmanship ensures every detail aligns with premium standards.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

      </div>
      <!-- End Features Grid -->

      <!-- CTA LINK -->
      <div class="reveal-item flex justify-center mt-6" style="transition-delay: 200ms;">
        <a href="{{ route('contact') }}" class="group inline-flex items-center gap-4" style="text-decoration: none;">
          <span class="font-body text-sm text-white tracking-[0.3em] uppercase border-b border-white/20 pb-1 group-hover:border-brand-orange group-hover:text-brand-orange transition-all duration-300">
            Start Your Project
          </span>
          <span class="w-8 h-px bg-white/30 group-hover:w-14 group-hover:bg-brand-orange transition-all duration-500 inline-block"></span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/30 group-hover:text-brand-orange group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>
      </div>

    </div>
  </section>
  
  <!-- ============================================================ -->
  <!--  OUR CLIENTS SECTION                                          -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark py-16 md:py-24 border-b border-brand-border overflow-hidden w-full">
    <div class="relative z-10 flex flex-col items-center gap-12 mt-8 w-full">
      
      <!-- HEADER BLOCK -->
      <div class="flex flex-col items-center text-center gap-6 max-w-3xl mx-auto px-5 sm:px-8 md:px-16 lg:px-24">
        <div class="reveal-item flex items-center justify-center gap-3 w-full">
          <div class="w-10 h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">
            Our Clients
          </span>
          <div class="w-10 h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 4.5rem);">
          Brands We Partner With
        </h2>
      </div>

      <!-- LOGOS TICKER -->
      <div class="reveal-item w-full flex flex-col gap-12 mt-12 overflow-hidden" style="transition-delay: 200ms;">
        
        <!-- ROW 1: Logos 1-10 -->
        <div class="flex w-max animate-marquee" style="animation-duration: 40s;">
          <div class="flex items-center justify-around gap-16 md:gap-24 px-8 md:px-12">
            <img src="{{ asset('assets/Client Logo/_0000_Parimal REALTY.jpg') }}" alt="Parimal Realty" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0001_Delta-Group.jpg') }}" alt="Delta Group" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0002_Command Collective.jpg') }}" alt="Command Collective" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0003_Cellecor.jpg') }}" alt="Cellecor" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0004_Risland Icon.jpg') }}" alt="Risland Icon" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0005_Zebra Idealab.jpg') }}" alt="Zebra Idealab" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0006_Trident Group.jpg') }}" alt="Trident Group" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0007_THOE.jpg') }}" alt="The Heart of Europe" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0008_Suraksha Smart City.jpg') }}" alt="Suraksha Smart City" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0009_RenderThat.jpg') }}" alt="RenderThat" class="h-20 md:h-28 w-auto object-contain">
          </div>
          <!-- Duplicate for seamless loop -->
          <div class="flex items-center justify-around gap-16 md:gap-24 px-8 md:px-12">
            <img src="{{ asset('assets/Client Logo/_0000_Parimal REALTY.jpg') }}" alt="Parimal Realty" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0001_Delta-Group.jpg') }}" alt="Delta Group" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0002_Command Collective.jpg') }}" alt="Command Collective" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0003_Cellecor.jpg') }}" alt="Cellecor" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0004_Risland Icon.jpg') }}" alt="Risland Icon" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0005_Zebra Idealab.jpg') }}" alt="Zebra Idealab" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0006_Trident Group.jpg') }}" alt="Trident Group" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0007_THOE.jpg') }}" alt="The Heart of Europe" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0008_Suraksha Smart City.jpg') }}" alt="Suraksha Smart City" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0009_RenderThat.jpg') }}" alt="RenderThat" class="h-20 md:h-28 w-auto object-contain">
          </div>
        </div>

        <!-- ROW 2: Logos 11-19 (Moves opposite direction) -->
        <div class="flex w-max animate-marquee-reverse" style="animation-duration: 40s;">
          <div class="flex items-center justify-around gap-16 md:gap-24 px-8 md:px-12">
            <img src="{{ asset('assets/Client Logo/_0010_R for Rabbit.jpg') }}" alt="R for Rabbit" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0011_Oli Studio.jpg') }}" alt="Oli Studio" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0012_Nirvana.jpg') }}" alt="Nirvana" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0013_Labdhi Lifestylle.jpg') }}" alt="Labdhi Lifestyle" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0014_Kanak Naturals.jpg') }}" alt="Kanak Naturals" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0015_Kanak Export.jpg') }}" alt="Kanak Export" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0016_Hafiz Contractor.jpg') }}" alt="Architect Hafeez Contractor" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0017_Gupta Housing.jpg') }}" alt="Gupta Housing" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0018_DDECORHOMEFABRICS.jpg') }}" alt="D Decor" class="h-20 md:h-28 w-auto object-contain">
          </div>
          <!-- Duplicate for seamless loop -->
          <div class="flex items-center justify-around gap-16 md:gap-24 px-8 md:px-12">
            <img src="{{ asset('assets/Client Logo/_0010_R for Rabbit.jpg') }}" alt="R for Rabbit" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0011_Oli Studio.jpg') }}" alt="Oli Studio" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0012_Nirvana.jpg') }}" alt="Nirvana" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0013_Labdhi Lifestylle.jpg') }}" alt="Labdhi Lifestyle" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0014_Kanak Naturals.jpg') }}" alt="Kanak Naturals" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0015_Kanak Export.jpg') }}" alt="Kanak Export" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0016_Hafiz Contractor.jpg') }}" alt="Architect Hafeez Contractor" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0017_Gupta Housing.jpg') }}" alt="Gupta Housing" class="h-20 md:h-28 w-auto object-contain">
            <img src="{{ asset('assets/Client Logo/_0018_DDECORHOMEFABRICS.jpg') }}" alt="D Decor" class="h-20 md:h-28 w-auto object-contain">
          </div>
        </div>

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

    <!-- Main Footer Grid -->
    <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">

      <!-- LEFT: Brand Info -->
      <div class="flex flex-col gap-6">

        <!-- Logo -->
        <div class="flex items-center gap-3">
          <div class="h-10 w-auto overflow-hidden">
            <img src="{{ asset('assets/Simha Logo Web White.png') }}" alt="Simha Logo" class="h-full w-auto object-contain">
          </div>
        </div>

        <!-- Copyright -->
        <p class="text-gray-500 text-sm font-body leading-relaxed max-w-xs">
          © 2026 Simha Interactive. All Rights Reserved.
        </p>

      </div>

      <!-- MIDDLE: Quick Links -->
      <div class="flex flex-col gap-6">

        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">
          Quick Links
        </h4>

        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">

          <a href="{{ route('home') }}" class="nav-link text-white transition">Home</a>
          <a href="{{ route('about') }}" class="nav-link hover:text-white transition">About</a>
          <a href="{{ route('services') }}" class="nav-link hover:text-white transition">Services</a>
          <a href="{{ route('portfolio') }}" class="nav-link hover:text-white transition">Portfolio</a>
          <a href="{{ route('blogs') }}" class="nav-link hover:text-white transition">Blogs</a>
          <a href="{{ route('contact') }}" class="nav-link hover:text-white transition">Contact Us</a>

        </div>

      </div>

      <!-- RIGHT: Services -->
      <div class="flex flex-col gap-6">

        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">
          Services
        </h4>

        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">

          <a href="services#design" class="nav-link hover:text-white transition">Design</a>
          <a href="services#visualization" class="nav-link hover:text-white transition">Visualization</a>
          <a href="services#marketing" class="nav-link hover:text-white transition">Marketing</a>
          <a href="services#engagement" class="nav-link hover:text-white transition">Engagement Content</a>

        </div>

      </div>

    </div>

    <!-- Bottom Divider Line -->
    <div class="relative z-10 mt-12 border-t border-brand-border pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-xs font-body">

      <span>
        Built with precision and creativity.
      </span>

      <span class="tracking-widest uppercase text-gray-600">
        Simha Interactive
      </span>

    </div>

  </footer>
  <script>
    // Custom JS Scroll Logic for Hero Video
    document.addEventListener("DOMContentLoaded", function() {
      let isHeroSnapped = false;
      const heroText = document.getElementById("hero-text-section");
      const heroVideo = document.getElementById("hero-video-section");
      
      let initialScrollCompleted = false;

      // Listen for the first scroll attempt down while at the top
      window.addEventListener('wheel', function(e) {
        if (window.innerWidth <= 1000) return; // Disable effect on small screens

        if (!initialScrollCompleted && window.scrollY < 50 && e.deltaY > 0) {
          e.preventDefault(); // Pause natural scrolling
          
          initialScrollCompleted = true; // Make sure it only auto-snaps once
          
          // Instantly smooth-scroll exactly to the top of the video container
          heroVideo.scrollIntoView({ behavior: "smooth", block: "start" });
        }
      }, { passive: false });

      // Handle touch swipe for mobile (equivalent logic)
      let touchStartY = 0;
      window.addEventListener('touchstart', e => {
        if (window.innerWidth <= 1000) return; // Disable effect on small screens
        touchStartY = e.touches[0].clientY;
      });

      window.addEventListener('touchmove', e => {
        if (window.innerWidth <= 1000) return; // Disable effect on small screens
        
        let touchEndY = e.touches[0].clientY;
        let diffY = touchStartY - touchEndY; // check if scrolling down
        
        if (!initialScrollCompleted && window.scrollY < 50 && diffY > 10) {
          e.preventDefault();
          initialScrollCompleted = true;
          heroVideo.scrollIntoView({ behavior: "smooth", block: "start" });
        }
      }, { passive: false });
    });

    // Intersection Observer for scroll reveal animations
    document.addEventListener("DOMContentLoaded", function() {
      const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
      };

      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            // Depending on preference, stop observing after reveal:
            // observer.unobserve(entry.target);
          }
        });
      }, observerOptions);

      document.querySelectorAll('.reveal-item').forEach((item) => {
        observer.observe(item);
      });
      
      // Observer for feature items (horizontal slide-in)
      const featureObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateX(0)';
            // observer.unobserve(entry.target);
          }
        });
      }, observerOptions);

      document.querySelectorAll('.feature-item').forEach((item) => {
        featureObserver.observe(item);
      });
      
      // Modal Logic
      const modal = document.getElementById('videoModal');
      const openBtn = document.getElementById('openModalBtn');
      const closeBtn = document.getElementById('closeModalBtn');
      
      function openModal() {
        modal.classList.remove('hidden');
        // trigger reflow
        void modal.offsetWidth;
        modal.classList.remove('opacity-0');
        document.body.style.overflow = 'hidden';
      }
      
      function closeModal() {
        modal.classList.add('opacity-0');
        setTimeout(() => {
          modal.classList.add('hidden');
          document.body.style.overflow = 'auto';
        }, 300);
      }
      
      if (openBtn) openBtn.addEventListener('click', openModal);
      if (closeBtn) closeBtn.addEventListener('click', closeModal);
      
      // Close on clicking outside video container
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          closeModal();
        }
      });
      
      // Close on Escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
          closeModal();
        }
      });
    });

    // ==========================================
    // JS Typewriter Effect (Letter by Letter Reveal)
    // ==========================================
    document.addEventListener("DOMContentLoaded", () => {
      const texts = ["We Design.", "We Visualize.", "We Market.", "We Create Experiences."];
      const typeSpeed = 35;      // Speed of typing each letter (ms)
      const deleteSpeed = 20;     // Speed of deleting each letter (ms)
      const delayBetweenWords = 1200; // Pause after word is fully typed (ms)

      const element = document.getElementById("typewriter-text");
      if (!element) return;

      let textIndex = 0;
      let charIndex = 0;
      let isDeleting = false;
      let currentWordSpans = [];

      function createLetterSpans(word) {
        element.innerHTML = "";
        currentWordSpans = [];

        // Split by word (by spaces)
        const words = word.split(" ");

        words.forEach((w, wordIdx) => {
          // Word container
          const wordSpan = document.createElement("span");
          wordSpan.setAttribute("aria-hidden", "true");

          // Letters
          for (let i = 0; i < w.length; i++) {
            const letterSpan = document.createElement("span");
            letterSpan.setAttribute("aria-hidden", "true");
            letterSpan.style.opacity = "0";
            letterSpan.innerText = w[i];

            wordSpan.appendChild(letterSpan);
            currentWordSpans.push(letterSpan);
          }

          element.appendChild(wordSpan);

          // Add space between words if not the last word
          if (wordIdx < words.length - 1) {
            const spaceSpan = document.createElement("span");
            spaceSpan.setAttribute("aria-hidden", "true");
            spaceSpan.style.opacity = "0";
            spaceSpan.innerHTML = "&nbsp;";
            element.appendChild(spaceSpan);
            currentWordSpans.push(spaceSpan);
          }
        });
      }

      function typeWriter() {
        const currentText = texts[textIndex];
        
        // If starting a new word, prepare the DOM
        if (charIndex === 0 && !isDeleting) {
          createLetterSpans(currentText);
        }

        let speed = isDeleting ? deleteSpeed : typeSpeed;

        if (isDeleting) {
          // Remove a character by setting opacity to 0
          if (charIndex > 0) {
            charIndex--;
            currentWordSpans[charIndex].style.opacity = "0";
          }
        } else {
          // Add a character by setting opacity to 1
          if (charIndex < currentWordSpans.length) {
            currentWordSpans[charIndex].style.opacity = "1";
            charIndex++;
          }
        }

        if (!isDeleting && charIndex === currentText.length) {
          // Finished typing word
          speed = delayBetweenWords;
          isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
          // Finished deleting word
          isDeleting = false;
          textIndex = (textIndex + 1) % texts.length;
          speed = 300; // small pause before next word
        }

        setTimeout(typeWriter, speed);
      }

      // Start the loop
      setTimeout(typeWriter, 1000);
    });
  </script>

</body>
</html>
