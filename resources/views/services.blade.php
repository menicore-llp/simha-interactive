<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>Services - Simha Interactive</title>
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
  <!--  SERVICES HERO                                                -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pt-40 pb-20 md:pt-48 md:pb-32 px-5 sm:px-8 md:px-16 lg:px-24 min-h-[50vh] flex items-center">
    <div class="relative z-10 max-w-7xl mx-auto w-full flex justify-center pointer-events-none">
      <div class="flex flex-col items-center text-center gap-6 w-full max-w-3xl pointer-events-auto">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Overview</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h1 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">Our Services</h1>
        <p class="reveal-item font-body text-gray-200 lg:text-gray-400 text-base md:text-lg max-w-xl mt-4 leading-relaxed font-medium lg:font-normal">
          We offer four core verticals designed to cover the complete creative and digital ecosystem from brand creation to immersive experiences.
        </p>
      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  SERVICES SHOWREEL / VIDEO                                    -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pb-24 md:pb-36 px-5 sm:px-8 md:px-16 lg:px-24">
    <div class="relative z-10 max-w-7xl mx-auto reveal-item">
      <!-- Video Container -->
      <div class="relative w-full aspect-video overflow-hidden border border-brand-border bg-white shadow-2xl group flex items-center justify-center cursor-pointer cursor-glow-target">
        <video class="absolute inset-0 w-full h-full object-cover opacity-90 transition-opacity duration-700 group-hover:opacity-100" autoplay muted playsinline loop>
          <!-- Please add the actual video source here -->
          <source src="{{ asset('assets/architecture_3d_walkthrough.mp4') }}" type="video/mp4" />
          Your browser does not support the video tag.
        </video>
        <!-- Subtle inner shadow overlay -->
        <div class="absolute inset-0 pointer-events-none border border-white/10" style="box-shadow: inset 0 0 40px rgba(0,0,0,0.5);"></div>
        
      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  DESIGN                                                       -->
  <!-- ============================================================ -->
  <section id="design" class="relative bg-brand-card overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-16 items-center">
      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Design</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">
          Strategic Design That Builds Strong Brands
        </h2>
        <p class="reveal-item font-body text-gray-400 leading-relaxed text-base lg:text-lg">
          We craft distinctive brand identities and digital platforms that leave lasting impressions.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
        <div class="reveal-item bg-brand-dark p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Branding, Strategy& Identity</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Your brand is more than a logo — it’s your identity. We build strategic brand systems that communicate clarity, consistency, and confidence.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Brand Strategy Development</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Brand Positioning</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Logo Design</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Visual Identity Systems</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Brand Guidelines</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Corporate Identity Design</li>
          </ul>
        </div>

        <div class="reveal-item bg-brand-dark p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Website Design & Development</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            We design and develop modern, responsive, and user-focused websites that drive engagement and conversions.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>UI/UX Design</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Corporate Websites</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>E-commerce Development</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Landing Pages</li>
            <!-- Lines added for Custom Web Development -->
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Custom Web Development</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Responsive & Mobile-Optimized Design</li>
          </ul>
        </div>
      </div>
      <div class="reveal-item mt-4 w-full flex justify-center">
        <a href="{{ route('contact') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex hover:border-brand-orange">
          <span>Start Your Brand Journey</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  VISUALIZATION                                                -->
  <!-- ============================================================ -->
  <section id="visualization" class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-16 items-center">
      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Visualization</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">
          Transforming Concepts Into Visual Reality
        </h2>
        <p class="reveal-item font-body text-gray-400 leading-relaxed text-base lg:text-lg">
          We create high-end photorealistic visuals that help brands, architects, and developers present ideas with clarity and impact.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
        <div class="reveal-item bg-brand-card p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Architectural Visualization</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Bring your architectural concepts to life with stunning visual storytelling.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Interior Rendering</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Exterior Rendering</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>3D Floor Plans</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Walkthrough Animations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Real Estate Marketing Visuals</li>
          </ul>
        </div>

        <div class="reveal-item bg-brand-card p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Product Visualization</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Showcase your products with precision and realism that drives customer confidence.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>3D Product Rendering</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Product Animations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Explainer Videos</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Lifestyle Visual Scenes</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>E-commerce Visual Assets</li>
          </ul>
        </div>
      </div>
      <div class="reveal-item mt-4 w-full flex justify-center">
        <a href="{{ route('contact') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex hover:border-brand-orange">
          <span>Visualize Your Project</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  MARKETING                                                    -->
  <!-- ============================================================ -->
  <section id="marketing" class="relative bg-brand-card overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-16 items-center">
      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Marketing</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">
          Data-Driven Marketing That Delivers Results
        </h2>
        <p class="reveal-item font-body text-gray-400 leading-relaxed text-base lg:text-lg">
          We create strategic digital marketing campaigns focused on visibility, engagement, and measurable growth.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
        <div class="reveal-item bg-brand-dark p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Search Engine Optimization (SEO)</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Enhance your online visibility and drive organic traffic through proven SEO strategies tailored to your industry.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>On-Page & Off-Page SEO</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Technical SEO Audits</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Keyword Strategy & Research</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Content Marketing & Optimization</li>
          </ul>
        </div>

        <div class="reveal-item bg-brand-dark p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Digital & Performance Marketing</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Maximize your ROI with targeted ad campaigns and engaging social media strategies that connect with your audience.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Google Ads & PPC Campaigns</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Social Media Marketing</li>
            <!-- Line edit -->
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Performance Marketing</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Analytics & Campaign Reporting</li>
          </ul>
        </div>
      </div>
      <div class="reveal-item mt-4 w-full flex justify-center">
        <a href="{{ route('contact') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex hover:border-brand-orange">
          <span>Grow Your Business</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  ENGAGEMENT CONTENT                                           -->
  <!-- ============================================================ -->
  <section id="engagement" class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-16 items-center">
      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Engagement</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem);">
          Immersive Experiences That Captivate Audiences
        </h2>
        <p class="reveal-item font-body text-gray-400 leading-relaxed text-base lg:text-lg">
          We create next-generation engagement content using advanced immersive technologies that transform how brands interact with their audience.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
        <div class="reveal-item bg-brand-card p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">AR & VR Experiences</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Transport your audience to entirely new worlds with engaging AR and VR content suited for brand activations, real estate, and more.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Augmented Reality (AR) Applications</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Virtual Reality (VR) Environments</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Giant Screen AR Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>VR 360 Degree Virtual Tours</li>
          </ul>
        </div>

        <div class="reveal-item bg-brand-card p-8 md:p-10 border border-brand-border hover:border-white transition-colors duration-500">
          <h3 class="font-body text-white text-2xl font-medium tracking-wide uppercase mb-4">Interactive & Display Solutions</h3>
          <p class="font-body text-gray-500 mb-6 leading-relaxed">
            Whether for an exhibition or real estate launch, our interactive and display technologies ensure your brand makes a powerful impact.
          </p>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Our services include:</div>
          <ul class="font-body text-gray-400 space-y-3">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Interactive Digital Touch Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Holographic Content & Installations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Anamorphic 3D Illusion Content</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1">•</span>Experiential Marketing Displays</li>
          </ul>
        </div>
      </div>
      <div class="reveal-item mt-4 w-full flex justify-center">
        <a href="{{ route('contact') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex hover:border-brand-orange">
          <span>Create Immersive Experiences</span>
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

      <div class="flex flex-col gap-6">
        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">Quick Links</h4>
        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">
          <a href="{{ route('home') }}" class="nav-link hover:text-white transition">Home</a>
          <a href="{{ route('about') }}" class="nav-link hover:text-white transition">About</a>
          <a href="{{ route('services') }}" class="nav-link text-white transition">Services</a>
          <a href="{{ route('portfolio') }}" class="nav-link hover:text-white transition">Portfolio</a>
          <a href="{{ route('blogs') }}" class="nav-link hover:text-white transition">Blogs</a>
          <a href="{{ route('contact') }}" class="nav-link hover:text-white transition">Contact Us</a>
        </div>
      </div>

      <div class="flex flex-col gap-6">
        <h4 class="text-white text-sm tracking-[0.3em] uppercase font-body">Services</h4>
        <div class="flex flex-col gap-3 text-gray-400 text-sm font-body">
          <a href="#design" class="nav-link hover:text-white transition">Design</a>
          <a href="#visualization" class="nav-link hover:text-white transition">Visualization</a>
          <a href="#marketing" class="nav-link hover:text-white transition">Marketing</a>
          <a href="#engagement" class="nav-link hover:text-white transition">Engagement Content</a>
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

