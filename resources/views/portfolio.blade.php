<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>Portfolio - Simha Interactive</title>
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
    html, body {
      max-width: 100vw;
      overflow-x: hidden;
    }
    body {
      background-color: #080808;
      color: #ffffff;
      font-family: 'Outfit', sans-serif;
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

    @media (max-width: 1279px) {
      [data-carousel] > div.relative.w-full.overflow-hidden {
        height: clamp(340px, 72vw, 620px) !important;
      }

      [data-carousel] img,
      [data-carousel] video {
        object-fit: contain !important;
        object-position: center center !important;
      }
    }

    @media (min-width: 1280px) {
      [data-carousel] img,
      [data-carousel] video {
        object-fit: cover !important;
        object-position: top center !important;
      }
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
  </style>
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
  <!--  PORTFOLIO HERO                                               -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pt-40 pb-20 md:pt-48 md:pb-32 px-5 sm:px-8 md:px-16 lg:px-24">
    <div class="relative z-10 max-w-5xl mx-auto flex flex-col items-center text-center gap-6">
      <div class="reveal-item flex items-center justify-center gap-3">
        <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Portfolio</span>
        <div class="w-[36px] h-[2px] bg-brand-orange"></div>
      </div>
      <h1 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">Our Work Speaks for Itself</h1>
      <p class="reveal-item font-body text-gray-400 text-base md:text-lg max-w-2xl mt-4 leading-relaxed font-medium lg:font-normal">
        Explore our projects across design, visualization, marketing, and immersive content. Each case study showcases our strategic approach and the impact of our solutions.
      </p>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  PORTFOLIO PROJECTS                                           -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark pb-24 md:pb-36 px-5 sm:px-8 md:px-16 lg:px-24 space-y-24 md:space-y-36">
    
  <!-- Project 1: Branding, Strategy& Identity -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Branding, Strategy& Identity</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Comprehensive Brand Identity</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Design/1.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Branding Image 1">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Design/2.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Branding Image 2">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Design/3.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Branding Image 3">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Design/4.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Branding Image 4">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Design/5.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Branding Image 5">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>

          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Strategic brand identity creation, shaping visually immersive and memorable brand stories that align with modern consumer expectations.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We defined complete branding ecosystems from versatile logos and cohesive typography to sophisticated graphic language and marketing assets.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">To forge a distinctive brand voice and recognizable visuals that foster deep engagement and sustain long-term market trust.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Adobe Illustrator, Photoshop, InDesign, Figma</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Distinct market positioning • Cohesive visual elements • Enduring brand recognition.</p>
      </div>
    </article>

  <!-- Project 2: Design (Website Design and Development) -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Website Design and Development</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Responsive Digital Experiences</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Website Design and Development/Cyblink.jpg.jpeg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Cyblink Website Design">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Website Design and Development/Meena.jpg.jpeg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Meena Website Design">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Website Design and Development/Shahi.jpg.jpeg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Shahi Website Design">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>

          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Custom, comprehensive modern website architectures focusing on intuitive user experience, brand representation, and reliable performance across all platforms.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We engineered fully responsive, dynamic interfaces paired with robust back-end systems. By prioritizing clean layouts and seamless navigation, we ensure a world-class user journey.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Establish a powerful digital footprint, deliver highly accessible content to diverse audiences, and reliably scale their online operations to drive engagement.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Figma, HTML5, Tailwind CSS, JavaScript, React, Node.js</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Enhanced mobile responsiveness • Substantial increase in page retention • Streamlined customer conversions.</p>
      </div>
    </article>  
  
  <!-- Project 3: Visualization (Interior Rendering) -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Interior Rendering</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">3D Architectural Interior Rendering</h2>
      </div>
  
      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/06.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 1">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/09.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 2">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/10.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 3">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/12.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 4">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/1726551890035.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 5">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/1726551891405.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 6">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/5e16a4d9-f15a-49f9-b389-831c39bc81dc.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 7">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/75215733-fa9a-428e-9fd6-422ea9af5d1b.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 8">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Interior Rendering/e1027d37-4ab3-4945-ad4f-9d44b4eaf828.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interior Rendering 9">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>
  
        <div class="mt-6 flex items-center justify-between">
          
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>
  
          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Photorealistic 3D architectural interior rendering bringing luxury residential and commercial spaces to life with stunning detail, lighting, and textures.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We meticulously crafted visually striking interior environments, focusing on natural light physics, high-end materials, and spatial harmony to create compelling visualizations.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Produce compelling, hyper-realistic imagery that enables clients to envision spaces accurately before construction and drives presales.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">3ds Max, V-Ray, Corona Renderer, Unreal Engine, Adobe Photoshop</p>
            </div>
         </div>
      </div>
  
      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Accelerated client sign-offs • High-impact marketing collateral • Enhanced design validation.</p>
      </div>
    </article>

    <!-- Project 4: Visualization (Exterior Rendering) -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Exterior Rendering</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">3D Exterior Architectural Visualizations</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/13.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 1">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/14.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 2">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/15.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 3">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/16.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 4">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/17.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 5">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/1708469964381.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 6">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/18.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 7">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/1b9fa2a1-57dd-4dc2-8461-abe5f069a7b0.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 8">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/867f9a4a-a96c-4395-b86f-9b77d3876fd6.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 9">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/985b4db8-f777-48d6-8b03-fb49bbe65871.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 10">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/a8405e81-906b-4921-b744-c0627dd8395e.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 11">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/parq-1.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 12">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Architectural Exterior Rendering/parq-2.jpg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Exterior Rendering 13">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>

          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Photorealistic 3D external perspectives for various luxury residential, commercial, and landscape architecture developments.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We produced breathtaking, high-fidelity 3D exterior renderings showcasing landscaping, material finishes, and atmospheric lighting conditions.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Capture the environmental integration and aesthetic of building exteriors to facilitate quicker off-plan sales and marketing.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Autodesk 3ds Max, Corona Renderer, V-Ray, Adobe Photoshop</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Accelerated pre-sales process • Boosted investor confidence • Eye-catching marketing collateral.</p>
      </div>
    </article>

    <!-- Project 5: Visualization (3D Floor Plans) -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">3D Floor Plans</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Spatial Layouts</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Floor Plans/3DFloorPlan.webp') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Floor Plan">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>
          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Detailed top-down 3D floor plan visualizations displaying spatial arrangements, furniture layouts, and structural flow.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Transformed basic 2D blueprints into highly legible, beautifully rendered 3D floor plans with realistic shadows, textures, and scaled room proportions.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Help prospective buyers and tenants easily understand property layouts, dimensions, and potential space utilization at a glance.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">AutoCAD, SketchUp, 3ds Max, V-Ray</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Faster comprehension of space • Higher lease conversion rates • Engaging digital brochures.</p>
      </div>
    </article>

    <!-- Project 6: Visualization (Walkthrough Animations) -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Walkthrough Animations</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Architectural Animation</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <video autoplay loop muted playsinline class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" src="{{ asset('assets/portfolio-images/Walkthrough Animations/architecture_3d_walkthrough.mp4') }}"></video>
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>
          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Cinematic 3D walkthrough animations guiding viewers through highly detailed architectural spaces, revealing the design narrative and flow.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We sequenced dynamic camera movements, ambient lighting changes, and high-fidelity rendering to deliver a seamless and engaging tour of the property before it was built.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Elevate project presentations and secure early investments by offering a lifelike preview that static images alone could not convey.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Unreal Engine 5, Lumion, After Effects, Premiere Pro</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Immersive project previews • Stronger emotional connection with buyers • Rapid sales cycles.</p>
      </div>
    </article>

    <!-- Project 7: Visualization (Real Estate Marketing Visuals) -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Real Estate Marketing Visuals</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none"> Real Estate Branding</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Real Estate Marketing Visual/Architectural Model Maker.webp') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Real Estate Marketing">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>
          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Comprehensive visual campaigns designed specifically for high-end real estate developments, including scale models and promotional graphics.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We produced a suite of top-tier visual marketing assets that bridge the gap between technical architecture and lifestyle aspirations.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Establish a dominant market presence, encapsulate the lifestyle promised by the development, and supply sales teams with persuasive storytelling assets.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Photoshop, Illustrator, 3ds Max, InDesign</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Premium brand positioning • Highly cohesive marketing materials • Exceptional pre-launch buzz.</p>
      </div>
    </article>


    <!-- Project 8: 3D Product Animation -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">3D Product Animation</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Dynamic Product Visualization</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <video autoplay loop muted playsinline class="w-full h-full object-cover transition-transform duration-[3s] ease-out" src="{{ asset('assets/portfolio-images/3D Product Animation/Atomberg Ver-10.mp4') }}"></video>
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <video autoplay loop muted playsinline class="w-full h-full object-cover transition-transform duration-[3s] ease-out" src="{{ asset('assets/portfolio-images/3D Product Animation/Buds.mp4') }}"></video>
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <video autoplay loop muted playsinline class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" src="{{ asset('assets/portfolio-images/3D Product Animation/Smart Watch.mp4') }}"></video>
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <video autoplay loop muted playsinline class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" src="{{ asset('assets/portfolio-images/3D Product Animation/Spotlight Stand.mp4') }}"></video>
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>

          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">High-fidelity 3D product animations to showcase product functions, details, and features dynamically for various consumer tech and industrial brands.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We created continuous, engaging video loops highlighting the strengths of each product using advanced shading, lighting, and camera techniques.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Boost visual engagement, replace static photography overheads with flexible CG assets, and drive higher click-through rates on digital campaigns.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Cinema 4D, Redshift, After Effects, Premiere Pro</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Immersive product demonstrations • Flexible and reusable video assets • Elevated brand perception.</p>
      </div>
    </article>

    <!-- Project 9: Immersive Content -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Product Visualization</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">3D Product Rendering</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/10.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 1">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/2.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 2">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/4.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 3">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/5.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 4">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/6.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 5">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/Ear Pod.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 7">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/Lakme.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 8">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/R for Rabbit_01.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 9">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/R for Rabbit_02.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 10">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/R for Rabbit_03.jpeg') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 11">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/Smart Watch.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 12">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/3D Product Rendering/Solo Ear Pod.png') }}" class="w-full h-full object-cover transition-transform duration-[3s] ease-out group-hover:scale-105" alt="3D Product Rendering 13">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>

          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">High-end product visualization for marketing campaigns, e-commerce stores, and product launches to enhance digital presence and user engagement.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We created detailed and photorealistic 3D renders showcasing product features, different angles, and contextual settings to enrich visual communication.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Elevate brand perception and increase conversion rates by substituting traditional photography with perfect, adaptable 3D product imagery.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Autodesk Maya, Keyshot, V-Ray, Adobe Substance 3D Painter</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Increased sales conversions • Reduced cost to produce marketing assets • Stunning high-resolution assets.</p>
      </div>
    </article>

    <!-- Project 10: AR & VR Experiences -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">AR & VR Experiences</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Immersive Digital Realities</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/AR & VR Experiences/_0000_Virtual Reality (VR) Environments.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="VR Environments">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/AR & VR Experiences/_0001_Giant Screen AR Experiences.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Giant Screen AR">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/AR & VR Experiences/_0002_Augmented Reality (AR) Applications.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="AR Applications">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/AR & VR Experiences/_0003_VR 360 Degree Virtual Tours.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="VR 360 Virtual Tours">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>
          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Developing cutting-edge Augmented and Virtual Reality applications that transport users into highly detailed, interactive virtual environments.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We created realistic 360-degree virtual tours and interactive AR experiences. The approach ensures users can deeply engage with the spaces and products without the limits of physical reality.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Pioneer a futuristic digital presence, drive user engagement through immersive technologies, and provide inaccessible physical journeys digitally.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Unreal Engine, Unity, ARKit, ARCore, WebXR</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Unprecedented engagement times • Immersive brand storytelling • High adoption in virtual showrooms.</p>
      </div>
    </article>

    <!-- Project 11: Interactive & Display Solutions -->
    <article class="reveal-item max-w-5xl mx-auto flex flex-col gap-10">
      <div class="flex flex-col items-center text-center gap-4">
        <span class="font-body text-xs text-brand-orange tracking-[0.2em] border border-brand-orange px-3 py-1 rounded-full uppercase">Interactive & Display Solutions</span>
        <h2 class="font-display text-white text-4xl md:text-5xl leading-none">Next-Gen Experiential Marketing</h2>
      </div>

      <div class="w-full relative" data-carousel>
        <div class="relative w-full overflow-hidden h-[400px] md:h-[600px] my-6">
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Interactive & Display Solutions/Anamorphic 3D Illusion Content.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Anamorphic 3D Illusion">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Interactive & Display Solutions/Experiential Marketing Displays.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Experiential Marketing Displays">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Interactive & Display Solutions/Holographic Content & Installations.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Holographic Content">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
          <div class="stack-card absolute inset-0 w-full h-full" style="transform-origin: center center; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.8s ease, filter 0.8s ease;">
            <img src="{{ asset('assets/portfolio-images/Interactive & Display Solutions/Interactive Digital Touch Experiences.jpg') }}" class="w-full h-full object-cover object-top transition-transform duration-[3s] ease-out group-hover:scale-105" alt="Interactive Digital Touch">
            <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          <div class="hidden sm:block flex-1 max-w-[180px] mx-auto h-[2px] bg-[#1f1f1f] relative overflow-hidden rounded">
            <div class="absolute top-0 left-0 h-full bg-[#FF5C1A] transition-all duration-600 ease-out stack-progress" style="width: 0%;"></div>
          </div>
          <div class="flex items-center gap-3">
            <button class="stack-prev w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
            </button>
            <button class="stack-next w-10 h-10 rounded-full border border-[#1f1f1f] bg-transparent text-white flex items-center justify-center cursor-pointer hover:border-[#FF5C1A] hover:text-[#FF5C1A] transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Project Overview</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Redefining offline customer interactions through holographic contents, anamorphic 3D illusions, and experiential touch displays tailored for physical venues.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Our Solution</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">We engineered state-of-the-art interactive installations. Blending tactile systems out of screens with eye-catching 3D illusion contents to captivate audiences passing by.</p>
            </div>
         </div>
         <div class="space-y-6">
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Client Objectives</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">Stand out at events, retail environments, and exhibitions by establishing memorable physical touchpoints and interactive visual marvels.</p>
            </div>
            <div>
              <h4 class="font-body text-white text-sm tracking-widest uppercase mb-2">Technologies Used</h4>
              <p class="font-body text-gray-400 text-sm leading-relaxed">TouchDesigner, Cinema 4D, Holographic Displays, Kinect Sensors, WebGL</p>
            </div>
         </div>
      </div>

      <div class="bg-brand-card p-4 border-l-2 border-brand-orange flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
        <h4 class="font-body text-white text-sm tracking-widest uppercase whitespace-nowrap">Results Delivered:</h4>
        <p class="font-body text-brand-orange text-sm font-medium">Massive crowd engagement • Viral social media impact via anamorphic content • Higher offline dwell times.</p>
      </div>
    </article>

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
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-tumblr"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M14 2a1 1 0 0 1 1 1v3h3a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -1 1h-3v4h3a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -1 1h-4a5 5 0 0 1 -5 -5v-5h-3a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 1 -1h1a2 2 0 0 0 2 -2v-1a1 1 0 0 1 1 -1z" /></svg>
          </a>
          <a href="https://www.quora.com/profile/Simha-Interactive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
             <svg class="w-5 h-5" fill="currentColor" viewBox="-1.5 0 20 20"><g transform="translate(-85, -7279)"><path d="M94.6307159,7294.53993 C94.2430139,7294.63693 93.8504042,7294.67493 93.4715358,7294.67493 C91.455485,7294.67493 89.0409353,7293.78793 89.0409353,7288.25196 C89.0409353,7282.71798 91.5693418,7281.18899 93.5853926,7281.18899 C95.6014434,7281.18899 97.9453233,7282.50598 97.9453233,7288.04196 C97.9453233,7290.55095 97.4437644,7292.14594 96.7076212,7293.14293 C96.695843,7293.14393 96.6870092,7293.14093 96.6870092,7293.14093 C95.0105658,7290.93694 92.8355081,7291.46494 92.3143187,7291.70494 C92.3143187,7291.70494 92.3800808,7292.20994 92.5184758,7293.12893 C93.6688222,7293.12793 94.2390878,7293.73593 94.6366051,7294.52093 C94.632679,7294.52993 94.6307159,7294.53993 94.6307159,7294.53993 M97.9090069,7295.59792 C97.9090069,7295.59792 97.91097,7295.59192 97.912933,7295.58492 C100.362818,7294.03693 102,7291.21394 102,7287.83196 C102,7281.31499 97.8579677,7279 93.5274827,7279 C89.4413972,7279 85,7282.27098 85,7287.95696 C85,7294.47393 89.1420323,7296.86392 93.4734988,7296.86392 C94.1546767,7296.86392 94.816224,7296.78092 95.4512702,7296.62592 C95.4512702,7296.62592 95.4610855,7296.62992 95.4669746,7296.63092 C97.1738453,7299.7369 99.7159931,7298.98591 100.371651,7298.74091 C100.371651,7298.74091 100.283314,7298.19391 100.129215,7297.17592 C98.903291,7297.14392 98.356582,7296.51692 97.9090069,7295.59792"/></g></svg>
          </a>
          <a href="https://www.pinterest.com/simhainteractive/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.782c0-1.67.968-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 0 1 .083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.607 0 11.985-5.373 11.985-11.987C23.97 5.367 18.627.001 12.017.001z"/></svg>
          </a>
          <a href="https://www.behance.net/simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-behance"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 18v-12h4.5a3 3 0 0 1 0 6a3 3 0 0 1 0 6h-4.5" /><path d="M3 12l4.5 0" /><path d="M14 13h7a3.5 3.5 0 0 0 -7 0v2a3.5 3.5 0 0 0 6.64 1" /><path d="M16 6l3 0" /></svg>
          </a>
          <a href="https://www.reddit.com/user/Comfortable_Head5568/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500 hover:text-brand-orange hover:border-brand-orange hover:-translate-y-1 transition-all duration-300">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-reddit"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 8c2.648 0 5.028 .826 6.675 2.14a2.5 2.5 0 0 1 2.326 4.36c0 3.59 -4.03 6.5 -9 6.5c-4.875 0 -8.845 -2.8 -9 -6.294l-1 -.206a2.5 2.5 0 0 1 2.326 -4.36c1.646 -1.313 4.026 -2.14 6.674 -2.14l.999 0" /><path d="M12 8l1 -5l6 1" /><path d="M18 4a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M8.5 13a.5 .5 0 1 0 1 0a.5 .5 0 1 0 -1 0" fill="currentColor" /><path d="M14.5 13a.5 .5 0 1 0 1 0a.5 .5 0 1 0 -1 0" fill="currentColor" /><path d="M10 17c.667 .333 1.333 .5 2 .5s1.333 -.167 2 -.5" /></svg>
          </a>
        </div>
      </div>

      <div class="flex flex-col gap-6">
        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">Quick Links</h4>
        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">
          <a href="{{ route('home') }}" class="nav-link hover:text-white transition">Home</a>
          <a href="{{ route('about') }}" class="nav-link hover:text-white transition">About</a>
          <a href="{{ route('services') }}" class="nav-link hover:text-white transition">Services</a>
          <a href="{{ route('portfolio') }}" class="nav-link text-white transition">Portfolio</a>
          <a href="{{ route('blogs') }}" class="nav-link hover:text-white transition">Blogs</a>
          <a href="{{ route('contact') }}" class="nav-link hover:text-white transition">Contact Us</a>
        </div>
      </div>

      <div class="flex flex-col gap-6">
        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">Services</h4>
        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">
          <a href="services#design" class="nav-link hover:text-white transition">Design</a>
          <a href="services#visualization" class="nav-link hover:text-white transition">Visualization</a>
          <a href="services#marketing" class="nav-link hover:text-white transition">Marketing</a>
          <a href="services#engagement" class="nav-link hover:text-white transition">Engagement Content</a>
        </div>
      </div>
    </div>

    <div class="relative z-10 mt-12 border-t border-brand-border pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-xs font-body">
      <span>Built with precision and creativity.</span>
      <span class="tracking-widest uppercase text-gray-600">Simha Interactive</span>
    </div>
  </footer>

  <script>
    class StackCarousel {
      constructor(wrapper) {
        this.wrapper = wrapper;
        this.cards = Array.from(wrapper.querySelectorAll('.stack-card'));
        this.prevBtn = wrapper.querySelector('.stack-prev');
        this.nextBtn = wrapper.querySelector('.stack-next');
        this.counter = wrapper.querySelector('.stack-counter');
        this.progress = wrapper.querySelector('.stack-progress');
        this.currentIndex = 0;
        this.total = this.cards.length;
        this.autoPlayInterval = null;

        this.init();
      }

      init() {
        if (this.prevBtn) this.prevBtn.addEventListener('click', () => { this.prev(); this.resetAutoPlay(); });
        if (this.nextBtn) this.nextBtn.addEventListener('click', () => { this.next(); this.resetAutoPlay(); });
        this.goTo(this.currentIndex);
        this.startAutoPlay();
      }

      startAutoPlay() {
        this.autoPlayInterval = setInterval(() => this.next(), 3500);
      }

      resetAutoPlay() {
        clearInterval(this.autoPlayInterval);
        this.startAutoPlay();
      }

      goTo(index) {
        this.currentIndex = index;
        
        this.cards.forEach((card, i) => {
          let offset = i - this.currentIndex;
          
          if (offset < -1) offset += this.total;
          if (offset > 1) offset -= this.total;
          
          if (offset === 0) {
            // Active
            card.style.transform = 'scale(1) translateX(0)';
            card.style.opacity = '1';
            card.style.zIndex = '3';
            card.style.filter = 'brightness(1)';
          } else if (offset === -1 || offset === this.total - 1) {
            // Previous
            card.style.transform = 'scale(0.95) translateX(-50px)';
            card.style.opacity = '0';
            card.style.zIndex = '2';
            card.style.filter = 'brightness(0.5)';
          } else if (offset === 1 || offset === -(this.total - 1)) {
            // Next
            card.style.transform = 'scale(0.95) translateX(50px)';
            card.style.opacity = '0';
            card.style.zIndex = '2';
            card.style.filter = 'brightness(0.5)';
          } else {
            // Other
            card.style.transform = 'scale(0.9) translateX(0)';
            card.style.opacity = '0';
            card.style.zIndex = '1';
            card.style.filter = 'brightness(0.2)';
          }
        });

        if (this.counter) {
          this.counter.textContent = String(this.currentIndex + 1).padStart(2, '0');
        }

        if (this.progress) {
          const percentage = ((this.currentIndex + 1) / this.total) * 100;
          this.progress.style.width = percentage + '%';
        }
      }

      next() {
        const nextIndex = (this.currentIndex + 1) % this.total;
        this.goTo(nextIndex);
      }

      prev() {
        const prevIndex = (this.currentIndex - 1 + this.total) % this.total;
        this.goTo(prevIndex);
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      const carousels = document.querySelectorAll('[data-carousel]');
      carousels.forEach(carouselWrapper => {
        new StackCarousel(carouselWrapper);
      });
    });
  </script>
</body>
</html>
