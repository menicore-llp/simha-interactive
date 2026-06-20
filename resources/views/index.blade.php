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

    /* Social icon hover */
    .social-icon {
      transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .social-icon:hover {
      box-shadow: 0 0 30px rgba(255, 92, 26, 0.3);
      background: rgba(255, 92, 26, 0.1);
      border-color: #FF5C1A !important;
      color: #FF5C1A !important;
      transform: translateY(-4px) scale(1.08);
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

    /* FAQ accordion */
    .faq-item {
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .faq-item[open] {
      border-color: rgba(255, 92, 26, 0.3);
    }
    .faq-item summary::-webkit-details-marker {
      display: none;
    }
    .faq-item summary {
      list-style: none;
    }
    .faq-item .faq-icon {
      transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), color 0.3s ease;
    }
    .faq-item[open] .faq-icon {
      transform: rotate(45deg);
      color: #FF5C1A;
    }
    .faq-content {
      display: grid;
      grid-template-rows: 0fr;
      transition: grid-template-rows 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .faq-item[open] .faq-content {
      grid-template-rows: 1fr;
    }
    .faq-content > div {
      overflow: hidden;
    }
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
        <a href="{{ route('home') }}" class="flex items-center gap-3 opacity-0 animate-fade-in delay-100"
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
    <video src="{{ asset('assets/landing_page_video(1).mp4') }}" 
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
  <!--  FAQ SECTION                                                  -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden py-24 md:py-32 px-8 md:px-16 lg:px-24 border-t border-brand-border">

    <div class="services-bg absolute inset-0 opacity-30"></div>

    <div class="relative z-10 flex flex-col items-center text-center gap-6 max-w-7xl mx-auto mb-14 md:mb-16">
      <div class="reveal-item flex items-center justify-center gap-3 w-full">
        <div class="w-10 h-[2px] bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">FAQs</span>
        <div class="w-10 h-[2px] bg-brand-orange"></div>
      </div>

      <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">
        Frequently Asked <br class="hidden sm:block"/><span class="text-brand-orange">Questions</span>
      </h2>

      <p class="reveal-item font-body text-gray-400 text-sm sm:text-base max-w-2xl leading-relaxed" style="transition-delay: 100ms;">
        Everything you need to know about working with us.
      </p>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto space-y-3 md:space-y-4">

      <!-- FAQ 1 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">What services does Simha Interactive offer?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Simha Interactive provides Branding, Strategy &amp; Identity, Website Design &amp; Development, Search Engine Optimization (SEO), Digital &amp; Performance Marketing, Product Visualization, Architectural Visualization, AR &amp; VR Experiences, and Interactive &amp; Display Solutions.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 2 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">Which industries do you serve?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              We work with businesses across real estate, architecture, construction, retail, manufacturing, healthcare, education, hospitality, technology, and corporate sectors.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 3 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">Do you work with international clients?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Yes. We serve clients globally, including the USA, Australia, UAE, UK, Europe, and other international markets.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 4 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">How do I get started with a project?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Simply contact us with your requirements, objectives, and references. Our team will review your needs and provide a customized proposal and timeline.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 5 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">Do you sign Non-Disclosure Agreements (NDAs)?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Yes. We are happy to sign NDAs and maintain complete confidentiality for all client projects.
            </div>
          </div>
        </div>
      </details>

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

        <!-- Social Icons Inline with Brand -->
        <div class="flex flex-wrap justify-start items-center gap-3 pt-3">
          <a href="https://www.instagram.com/simhainteractive/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          </a>
          <a href="https://x.com/SimhaInteractiv" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <a href="https://www.youtube.com/@simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
          </a>
          <a href="https://www.linkedin.com/company/simha-interactive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          <a href="https://www.facebook.com/profile.php?id=61590164084216" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
          <a href="https://www.tumblr.com/blog/simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M14.563 18.404c-.451.215-1.023.322-1.717.322-1.695 0-2.636-1.014-2.636-3.033v-5.309h3.171V8.158H10.21V4.422H8.049c-.051.408-.183 1.003-.393 1.784-.312 1.154-.766 2.156-1.361 3.007v2.705h1.649v5.519c0 2.423 1.512 3.649 4.051 3.649.994 0 1.803-.159 2.425-.476l.143-2.206z"/></svg>
          </a>
          <a href="https://www.quora.com/profile/Simha-Interactive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.555 17.102c-.858-1.512-1.407-3.443-1.407-5.472 0-2.487.788-4.393 1.943-5.712.846-.964 2.163-1.794 3.957-2.166V3.2C10.971 3.2 6.643 7.397 6.643 12.6c0 1.245.28 2.47.808 3.573-.28.583-1.093.929-2.053.929-1.053 0-1.872-.41-2.185-1.572-.236-.877-.722-1.386-1.36-1.386-.743 0-.983.626-.983 1.064 0 .25.037.539.122.858.679 2.539 2.633 3.781 4.606 3.781 1.638 0 2.992-.717 3.603-1.944.997.866 2.148 1.432 3.357 1.681.116-.389.246-.845.343-1.195-.752-.137-1.478-.506-2.084-1.03zm1.645 1.083c.436.873.928 1.438 1.602 1.438.776 0 1.881-.91 2.464-1.952.553-.988.891-2.113.891-3.354 0-2.443-1.119-4.557-2.76-5.735l1.778-1.3-.772-1.763-6.194 4.555c1.392 1.392 2.402 3.387 2.402 5.585 0 1.363-.294 2.587-.77 3.526.246.347.496.617.559.617.142 0 .249-.205.249-.617 0-.316.026-.599.09-.945z"/></svg>
          </a>
          <a href="https://www.pinterest.com/simhainteractive/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.782c0-1.67.968-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 0 1 .083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.607 0 11.985-5.373 11.985-11.987C23.97 5.367 18.627.001 12.017.001z"/></svg>
          </a>
          <a href="https://www.behance.net/simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7.807 12.979H4.3V9.814h3.163c1.259 0 2.472.394 2.472 1.578 0 1.623-2.128.995-2.128 1.587zm.634 3.115H4.3v-2.299h3.843c1.499 0 2.295.727 2.295 1.587 0 1.354-1.421.84-1.997.712zM22.5 6.758H17.04V4.871H22.5v1.887zM15.509 16.158c1.391 0 2.089-.811 2.389-1.298h2.577c-.779 2.228-2.701 3.1-4.941 3.1-2.977 0-4.899-1.689-4.899-4.475 0-2.681 1.923-4.645 4.925-4.645 3.303 0 4.853 2.488 4.853 5.169 0 .32-.012.63-.051.886h-6.711c.14 1.514 1.111 2.263 2.858 2.263zm3.636-3.589c-.172-1.191-.89-2.046-2.321-2.046-1.424 0-2.216.863-2.458 2.046h4.779zM2.3 19.393h5.523c2.585 0 4.203-1.02 4.203-3.288 0-1.364-.785-2.274-1.728-2.673.649-.409 1.326-1.06 1.326-2.122 0-2.052-1.648-2.876-3.688-2.876H2.3v10.959z"/></svg>
          </a>
          <a href="https://www.reddit.com/user/Comfortable_Head5568/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.059l-2.295-.388v6.159h4.016c.637 0 .966.457.98 1.088h.007v6.729a.628.628 0 0 1-.634.634H7.115a.628.628 0 0 1-.634-.634v-6.73c.014-.63.343-1.087.98-1.087h3.647V7.944c0-.416.272-.737.672-.789l3.291-.546a1.25 1.25 0 0 1 1.339.127c.103.085.232.128.37.128zm-.165 8.083H7.154v5.461h9.691v-5.461zM8.955 15.11c-.518 0-.938.42-.938.938s.42.938.938.938.938-.42.938-.938-.42-.938-.938-.938zm6.09 0c-.518 0-.938.42-.938.938s.42.938.938.938.938-.42.938-.938-.42-.938-.938-.938zm-.469 2.688h-5.152a.313.313 0 0 0-.312.313v.625c0 .173.14.313.312.313h5.152a.313.313 0 0 0 .313-.313v-.625a.313.313 0 0 0-.313-.313z"/></svg>
          </a>
        </div>

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
