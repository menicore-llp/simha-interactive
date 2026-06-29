<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>AR & VR Experiences - Simha Interactive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&family=DM+Sans:ital@0;1&display=swap" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/nexa-bold" rel="stylesheet">

  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18229527475"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());
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

    document.addEventListener("DOMContentLoaded", function() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
          }
        });
      }, { threshold: 0.12 });

      document.querySelectorAll('.reveal-item').forEach((item) => {
        observer.observe(item);
      });

      document.querySelectorAll('.carousel-container').forEach((container) => {
        const slides = container.querySelectorAll('.carousel-slide');
        const prev = container.querySelector('.carousel-arrow-prev');
        const next = container.querySelector('.carousel-arrow-next');
        let current = 0, interval, total = slides.length;

        function goTo(index) {
          slides.forEach(s => { const v = s.querySelector('video'); if (v) v.pause(); });
          slides.forEach((s, i) => s.classList.toggle('active', i === index));
          current = index;
          const v = slides[current].querySelector('video');
          if (v) v.play().catch(function(){});
        }

        function nextSlide() { goTo((current + 1) % total); }
        function prevSlide() { goTo((current - 1 + total) % total); }
        function startAuto() { interval = setInterval(nextSlide, 4000); }
        function stopAuto() { clearInterval(interval); }

        if (prev) prev.addEventListener('click', function() { prevSlide(); stopAuto(); startAuto(); });
        if (next) next.addEventListener('click', function() { nextSlide(); stopAuto(); startAuto(); });
        container.classList.add('carousel-initialized');
        goTo(0);
        startAuto();
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
    .nav-cta { display: none; }
    .nav-toggle { display: inline-flex; }
    @media (min-width: 1111px) {
      .nav-desktop { display: flex; }
      .nav-cta { display: inline-flex; }
      .nav-toggle { display: none; }
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

    .services-bg {
      background-color: #080808;
      background-image: radial-gradient(circle, #2a2a2a 1.5px, transparent 1.5px);
      background-size: 32px 32px;
      position: absolute;
      inset: 0;
    }

    .service-card {
      transition: border-color 0.4s ease, transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;
    }
    .service-card:hover {
      border-color: #ffffff;
      transform: translateY(-6px);
      box-shadow: 0 24px 64px rgba(0, 0, 0, 0.6);
    }
    .service-card .service-icon {
      color: #5a5a5a;
      transition: color 0.3s ease;
    }
    .service-card:hover .service-icon {
      color: #FF5C1A;
    }

    @keyframes skeleton-shimmer {
      0%   { background-position: -200% 0; }
      100% { background-position:  200% 0; }
    }
    .card-skeleton {
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, #191919 25%, #272727 50%, #191919 75%);
      background-size: 200% 100%;
      animation: skeleton-shimmer 2.2s ease-in-out infinite;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 14px;
    }
    .card-skeleton-icon {
      width: 52px;
      height: 52px;
      color: #333333;
      flex-shrink: 0;
    }
    .card-skeleton-bars {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      width: 100%;
      padding: 0 28%;
    }
    .card-skeleton-bar {
      height: 6px;
      border-radius: 4px;
      background: #2e2e2e;
      width: 100%;
    }
    .card-skeleton-bar.short { width: 60%; }

    .service-img {
      opacity: 0;
      transition: opacity 0.55s ease, transform 0.75s cubic-bezier(0.16, 1, 0.3, 1);
    }
    img.service-img:not([src=""]):not([src="#"]) {
      opacity: 0.88;
    }
    .service-card:hover img.service-img:not([src=""]):not([src="#"]) {
      opacity: 1;
      transform: scale(1.06);
    }
    img.service-img:not([src=""]):not([src="#"]) ~ .card-skeleton,
    img.service-img:not([src=""]):not([src="#"]) ~ * .card-skeleton {
      display: none;
    }
    .service-img-line {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      background: #FF5C1A;
      width: 0;
      transition: width 0.65s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .service-card:hover .service-img-line {
      width: 100%;
    }

    .pillar-card {
      transition: border-color 0.4s ease, background 0.4s ease;
    }
    .pillar-card:hover {
      border-color: rgba(255, 92, 26, 0.5);
      background: rgba(255, 92, 26, 0.04);
    }
    .pillar-card .pillar-icon {
      color: #5a5a5a;
      transition: color 0.3s ease;
    }
    .pillar-card:hover .pillar-icon {
      color: #FF5C1A;
    }

    .showcase-item {
      transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
      cursor: default;
    }
    .showcase-item:hover {
      transform: scale(1.015);
      box-shadow: 0 24px 60px rgba(0,0,0,0.55);
    }
    .showcase-label {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      padding: 18px 22px;
      background: linear-gradient(to top, rgba(8,8,8,0.9) 0%, rgba(8,8,8,0.2) 60%, transparent 100%);
      transform: translateY(6px);
      opacity: 0;
      z-index: 5;
      pointer-events: none;
      transition: opacity 0.35s ease, transform 0.35s ease;
    }
    .showcase-item:hover .showcase-label { opacity: 1; transform: translateY(0); }

    .showcase-feature { aspect-ratio: 4/3; }
    .showcase-cinema  { aspect-ratio: 4/3; }
    @media (min-width: 768px) {
      .showcase-feature { aspect-ratio: 16/9; }
      .showcase-cinema  { aspect-ratio: 21/9; }
    }

    .carousel-container { position: absolute; inset: 0; }
    .carousel-slide {
      position: absolute; inset: 0;
      opacity: 0; pointer-events: none; z-index: 1;
      transition: opacity 0.6s ease;
    }
    .carousel-slide.active { opacity: 1; pointer-events: auto; z-index: 2; }
    .carousel-slide img,
    .carousel-slide video { width: 100%; height: 100%; object-fit: cover; display: block; }
    .carousel-initialized > .card-skeleton { display: none; }
    .carousel-arrow {
      position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;
      width: 26px; height: 26px; border-radius: 50%;
      background: rgba(0,0,0,0.15); color: rgba(255,255,255,0.3);
      border: 1px solid rgba(255,255,255,0.06);
      display: flex; align-items: center; justify-content: center;
      cursor: pointer; padding: 0; backdrop-filter: blur(2px);
      transition: background 0.3s, color 0.3s;
      font-size: 13px; line-height: 1;
    }
    .carousel-arrow:hover { background: rgba(0,0,0,0.35); color: rgba(255,255,255,0.8); }
    .carousel-arrow-prev { left: 5px; }
    .carousel-arrow-next { right: 5px; }

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
</head>

<body>

  <!-- ============================================================ -->
  <!--  NAVBAR                                                       -->
  <!-- ============================================================ -->
  <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-8 md:px-16 py-5"
       style="background: linear-gradient(to bottom, rgba(8,8,8,0.95), transparent); backdrop-filter: blur(8px);">

    <a href="{{ route('home') }}" class="flex items-center gap-3 opacity-0 animate-fade-in delay-100"
       style="animation-fill-mode: forwards;">
      <div class="flex h-8 sm:h-10 lg:h-12 w-auto overflow-hidden">
        <img src="{{ asset('assets/Simha Logo Web White.png') }}"
             alt="Simha Interactive Icon"
             class="h-full w-auto object-contain">
      </div>
    </a>

    <div class="nav-desktop items-center gap-10 opacity-0 animate-fade-in delay-300"
         style="animation-fill-mode: forwards;">
      <a href="{{ route('home') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">We Do</a>
      <a href="{{ route('about') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">We Are</a>
      <a href="{{ route('services') }}" class="nav-link font-body text-sm text-white transition-colors tracking-wider uppercase">Services</a>
      <a href="{{ route('portfolio') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Portfolio</a>
      <a href="{{ route('blogs') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Blogs</a>
      <a href="{{ route('contact') }}" class="nav-link font-body text-sm text-gray-400 hover:text-white transition-colors tracking-wider uppercase">Contact us</a>
    </div>

    <a href="{{ route('contact') }}"
       class="btn-ghost nav-cta items-center gap-2 border border-white/20 text-white px-6 py-2.5 text-sm font-body tracking-widest uppercase opacity-0 animate-fade-in"
       style="animation-fill-mode: forwards;">
      <span>Start Project</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
      </svg>
    </a>

    <button onclick="toggleMenu()" class="nav-toggle text-white" aria-label="Toggle menu">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <div id="mobileMenu"
         class="fixed top-0 left-0 w-full h-screen z-[999] flex flex-col items-center justify-center gap-8 text-white font-medium backdrop-blur-md bg-black/95 transform -translate-y-full transition-transform duration-500">
      <button onclick="toggleMenu()" class="absolute top-4 right-4 text-white hover:text-brand-orange">✕</button>
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
  <!--  HERO                                                         -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pt-40 pb-20 md:pt-52 md:pb-36 px-5 sm:px-8 md:px-16 lg:px-24 min-h-[90vh] flex items-center">
    <div class="services-bg opacity-25 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[700px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at bottom right, rgba(255,92,26,0.10) 0%, transparent 65%);"></div>
    <div class="absolute top-0 left-0 w-[500px] h-[400px] pointer-events-none" style="background: radial-gradient(ellipse at top left, rgba(255,92,26,0.05) 0%, transparent 65%);"></div>
    <div class="absolute right-0 md:right-8 top-1/2 -translate-y-1/2 font-display text-white pointer-events-none select-none hidden lg:block"
         style="font-size: clamp(16rem, 22vw, 28rem); opacity: 0.018; line-height: 1; letter-spacing: -0.05em;">A</div>

    <div class="relative z-10 max-w-7xl mx-auto w-full">
      <div class="flex flex-col items-center text-center gap-7 max-w-4xl mx-auto">

        <div class="reveal-item w-full flex justify-center" style="transition-delay: 0ms;">
          <a href="{{ route('services') }}" class="group inline-flex items-center gap-2 font-body text-xs text-gray-500 hover:text-brand-orange tracking-[0.25em] uppercase transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            <span>All Services</span>
          </a>
        </div>

        <div class="reveal-item flex items-center justify-center gap-3" style="transition-delay: 60ms;">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">AR &amp; VR Experiences</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>

        <h1 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 6rem); transition-delay: 120ms;">
          Transform How Audiences<br class="hidden sm:block"/> Interact with Your Brand
        </h1>

        <p class="reveal-item font-body text-gray-400 text-base md:text-lg max-w-2xl leading-relaxed" style="transition-delay: 180ms;">
          Transform the way your audience interacts with your brand through immersive Augmented Reality (AR) and Virtual Reality (VR) experiences. We design and develop cutting-edge interactive solutions that captivate users, enhance engagement, and create memorable digital experiences across industries.
        </p>

        <div class="reveal-item mt-2" style="transition-delay: 240ms;">
          <a href="{{ route('contact') }}"
             class="btn-ghost border border-white text-white px-10 py-4 font-body text-sm tracking-widest uppercase inline-flex items-center gap-3">
            <span>Let's Create Immersive Experiences</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  INTRODUCTION                                                 -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-card overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-16 items-center">

      <div class="flex flex-col gap-8">
        <div class="reveal-item flex items-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Introduction</span>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(2.8rem, 5.5vw, 4.5rem); transition-delay: 80ms;">
          Immersive Technology<br/>for Modern Brands
        </h2>
        <p class="reveal-item font-body text-gray-400 text-base md:text-lg leading-relaxed" style="transition-delay: 140ms;">
          From virtual property tours and interactive brand activations to large-scale immersive installations, our AR and VR solutions help businesses stand out by blending creativity with innovative technology.
        </p>
        <p class="reveal-item font-body text-gray-500 text-sm md:text-base leading-relaxed" style="transition-delay: 180ms;">
          We combine strategic planning, creative design, 3D content creation, and advanced technology development to deliver immersive experiences that align with your goals.
        </p>
        <div class="reveal-item" style="transition-delay: 220ms;">
          <a href="{{ route('contact') }}" class="group inline-flex items-center gap-4">
            <span class="font-body text-sm text-white tracking-[0.3em] uppercase border-b border-white/20 pb-1 group-hover:border-brand-orange group-hover:text-brand-orange transition-all duration-300">
              Start Your Immersive Project
            </span>
            <span class="w-8 h-px bg-white/30 group-hover:w-14 group-hover:bg-brand-orange transition-all duration-500 inline-block"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/30 group-hover:text-brand-orange group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="reveal-item relative" style="transition-delay: 100ms;">
        <div class="relative border border-brand-border p-10 md:p-12 bg-brand-dark">
          <div class="absolute top-0 left-0 w-12 h-12 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-[2px] bg-brand-orange"></div>
            <div class="absolute top-0 left-0 h-full w-[2px] bg-brand-orange"></div>
          </div>
          <div class="absolute bottom-0 right-0 w-12 h-12 pointer-events-none">
            <div class="absolute bottom-0 right-0 w-full h-[2px] bg-brand-orange"></div>
            <div class="absolute bottom-0 right-0 h-full w-[2px] bg-brand-orange"></div>
          </div>

          <div class="flex flex-col gap-8">
            <div class="flex items-start gap-5 pb-7 border-b border-brand-border">
              <div class="w-8 h-px bg-brand-orange mt-3 flex-shrink-0"></div>
              <div>
                <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase mb-2">Custom Solutions</h4>
                <p class="font-body text-gray-500 text-sm leading-relaxed">Tailored AR and VR experiences designed to meet your specific objectives.</p>
              </div>
            </div>
            <div class="flex items-start gap-5 pb-7 border-b border-brand-border">
              <div class="w-8 h-px bg-brand-orange mt-3 flex-shrink-0"></div>
              <div>
                <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase mb-2">Cross-Platform</h4>
                <p class="font-body text-gray-500 text-sm leading-relaxed">Solutions that work seamlessly across mobile, web, and VR devices.</p>
              </div>
            </div>
            <div class="flex items-start gap-5">
              <div class="w-8 h-px bg-brand-orange mt-3 flex-shrink-0"></div>
              <div>
                <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase mb-2">High-Impact</h4>
                <p class="font-body text-gray-500 text-sm leading-relaxed">Experiences designed for maximum engagement and lasting brand impact.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  SERVICES GRID                                                -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-16 items-center">

      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">What We Offer</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem); transition-delay: 80ms;">
          Our Services
        </h2>
        <p class="reveal-item font-body text-gray-400 leading-relaxed text-base lg:text-lg" style="transition-delay: 140ms;">
          End-to-end AR and VR development services tailored to help your business create immersive experiences.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 w-full">

        <!-- Card 1: Augmented Reality (AR) Applications -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-6" style="transition-delay: 0ms;">
          <div class="service-icon w-10 h-10 flex-shrink-0">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">Augmented Reality (AR) Applications</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Bring digital content into the real world with interactive AR experiences that engage users through smartphones, tablets, wearable devices, and interactive displays.
            </p>
          </div>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Key Deliverables</div>
          <ul class="font-body text-gray-400 space-y-2.5">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Custom AR Mobile Applications</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Web-Based AR Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Product Visualization &amp; Demonstrations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Interactive Brand Activations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>AR Filters &amp; Social Media Effects</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Educational &amp; Training Applications</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Retail &amp; E-Commerce AR Solutions</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Location-Based AR Experiences</li>
          </ul>
          <div class="pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

        <!-- Card 2: Virtual Reality (VR) Environments -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-6" style="transition-delay: 80ms;">
          <div class="service-icon w-10 h-10 flex-shrink-0">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">Virtual Reality (VR) Environments</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Create fully immersive virtual worlds that allow users to explore, learn, and interact in highly engaging digital environments tailored to your business objectives.
            </p>
          </div>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Key Deliverables</div>
          <ul class="font-body text-gray-400 space-y-2.5">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Custom VR Application Development</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Interactive Training Simulations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Virtual Showrooms &amp; Exhibitions</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Product Demonstrations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Educational VR Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Corporate &amp; Enterprise VR Solutions</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Multi-User Virtual Environments</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>VR Event Experiences</li>
          </ul>
          <div class="pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

        <!-- Card 3: Giant Screen AR Experiences -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-6" style="transition-delay: 160ms;">
          <div class="service-icon w-10 h-10 flex-shrink-0">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">Giant Screen AR Experiences</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Deliver unforgettable large-scale immersive experiences for events, exhibitions, retail spaces, and public installations. Our giant screen AR solutions combine real-time interaction with visually stunning content to captivate audiences.
            </p>
          </div>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Key Deliverables</div>
          <ul class="font-body text-gray-400 space-y-2.5">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Interactive Event Installations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Brand Activation Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Exhibition &amp; Trade Show Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Motion Tracking Integrations</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Real-Time Audience Interaction</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Large Format Digital Displays</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Experiential Marketing Campaigns</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Custom Interactive Content Development</li>
          </ul>
          <div class="pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

        <!-- Card 4: VR 360 Degree Virtual Tours -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-6" style="transition-delay: 240ms;">
          <div class="service-icon w-10 h-10 flex-shrink-0">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">VR 360 Degree Virtual Tours</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Allow customers, investors, and audiences to explore spaces remotely through immersive 360-degree virtual tours. Ideal for real estate, hospitality, tourism, education, and commercial facilities.
            </p>
          </div>
          <div class="font-body text-brand-orange text-xs tracking-[0.2em] uppercase font-medium mb-4">Key Deliverables</div>
          <ul class="font-body text-gray-400 space-y-2.5">
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Real Estate Virtual Tours</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Hospitality &amp; Hotel Showcases</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Campus &amp; Facility Tours</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Tourism &amp; Destination Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Interactive Information Hotspots</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Drone-Based 360° Experiences</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Virtual Walkthrough Development</li>
            <li class="flex items-start gap-3"><span class="text-brand-orange mt-1 flex-shrink-0">•</span>Cross-Platform Accessibility</li>
          </ul>
          <div class="pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

      </div>

      <div class="reveal-item mt-4 w-full flex justify-center" style="transition-delay: 200ms;">
        <a href="{{ route('contact') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex">
          <span>Discuss Your AR/VR Project</span>
        </a>
      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  VISUAL SHOWCASE                                              -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-14">

      <div class="flex flex-col items-center text-center gap-5">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Our Portfolio</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem); transition-delay: 80ms;">
          Immersive Experiences
        </h2>
        <p class="reveal-item font-body text-gray-400 text-base leading-relaxed max-w-2xl" style="transition-delay: 140ms;">
          A showcase of AR and VR experiences that captivated audiences and delivered measurable brand impact.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div class="reveal-item showcase-item relative overflow-hidden rounded-xl showcase-feature md:col-span-2 group" style="transition-delay: 0ms;">
          <div class="carousel-container">
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/AR & VR Experiences/_0002_Augmented Reality (AR) Applications.jpg') }}" alt="Augmented Reality (AR) Applications" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="card-skeleton">
            <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <circle cx="8.5" cy="8.5" r="1.5"/>
              <polyline points="21 15 16 10 5 21"/>
            </svg>
            <div class="card-skeleton-bars">
              <div class="card-skeleton-bar"></div>
              <div class="card-skeleton-bar short"></div>
            </div>
          </div>
          <div class="showcase-label">
            <p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Augmented Reality (AR) Applications</p>
          </div>
        </div>

        <div class="reveal-item showcase-item relative overflow-hidden rounded-xl group" style="aspect-ratio: 4/3; transition-delay: 80ms;">
          <div class="carousel-container">
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/AR & VR Experiences/_0000_Virtual Reality (VR) Environments.jpg') }}" alt="Virtual Reality (VR) Environments" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="card-skeleton">
            <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <circle cx="8.5" cy="8.5" r="1.5"/>
              <polyline points="21 15 16 10 5 21"/>
            </svg>
            <div class="card-skeleton-bars">
              <div class="card-skeleton-bar"></div>
              <div class="card-skeleton-bar short"></div>
            </div>
          </div>
          <div class="showcase-label">
            <p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Virtual Reality (VR) Environments</p>
          </div>
        </div>

        <div class="reveal-item showcase-item relative overflow-hidden rounded-xl group" style="aspect-ratio: 4/3; transition-delay: 160ms;">
          <div class="carousel-container">
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/AR & VR Experiences/_0001_Giant Screen AR Experiences.jpg') }}" alt="Giant Screen AR Experiences" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="card-skeleton">
            <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <circle cx="8.5" cy="8.5" r="1.5"/>
              <polyline points="21 15 16 10 5 21"/>
            </svg>
            <div class="card-skeleton-bars">
              <div class="card-skeleton-bar"></div>
              <div class="card-skeleton-bar short"></div>
            </div>
          </div>
          <div class="showcase-label">
            <p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Giant Screen AR Experiences</p>
          </div>
        </div>

        <div class="reveal-item showcase-item relative overflow-hidden rounded-xl showcase-cinema md:col-span-2 group" style="transition-delay: 240ms;">
          <div class="carousel-container">
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/AR & VR Experiences/_0003_VR 360 Degree Virtual Tours.jpg') }}" alt="VR 360 Degree Virtual Tours" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="card-skeleton">
            <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <circle cx="8.5" cy="8.5" r="1.5"/>
              <polyline points="21 15 16 10 5 21"/>
            </svg>
            <div class="card-skeleton-bars">
              <div class="card-skeleton-bar"></div>
              <div class="card-skeleton-bar short"></div>
            </div>
          </div>
          <div class="showcase-label">
            <p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">VR 360 Degree Virtual Tours</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  WHY CHOOSE SIMHA INTERACTIVE                                 -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-card overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-16 items-center">

      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Why Choose Us</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem); transition-delay: 80ms;">
          Why Choose<br/>Simha Interactive
        </h2>
        <p class="reveal-item font-body text-gray-400 text-sm sm:text-base leading-relaxed max-w-2xl" style="transition-delay: 140ms;">
          Innovative and immersive user experiences, custom-designed for your objectives.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-0 w-full">

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 0ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Innovative &amp; Immersive User Experiences</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              We create cutting-edge AR and VR experiences that captivate audiences and leave lasting impressions.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 80ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Custom-Designed Solutions Tailored to Your Objectives</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Every project is uniquely designed to align with your brand, audience, and business goals.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 160ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Cross-Platform Compatibility for Mobile, Web &amp; VR Devices</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Our solutions work seamlessly across a wide range of devices and platforms.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 240ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">High-Quality 3D Visualization &amp; Interactive Content</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              We deliver production-ready 3D content and interactive experiences with exceptional visual quality.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 320ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">End-to-End Development from Concept to Deployment</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              From initial concept through prototyping, development, and deployment, we manage the entire project lifecycle.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 400ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Scalable Solutions for Businesses, Events &amp; Enterprises</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              From intimate brand activations to large-scale enterprise deployments, our AR and VR solutions scale to meet any requirement.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

        <div class="reveal-item group flex items-start gap-5 sm:gap-6 py-6 border-b border-brand-border hover:bg-white/[0.02] transition-colors duration-300 cursor-default px-3" style="transition-delay: 480ms;">
          <div class="flex-shrink-0 w-9 h-9 flex items-center justify-center border border-brand-border rounded-full group-hover:border-brand-orange group-hover:bg-brand-orange/10 transition-all duration-300 mt-0.5">
            <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
          </div>
          <div class="flex flex-col flex-1 pb-1">
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Focus on Engagement, Education &amp; Brand Impact</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Every AR and VR experience we create is designed to captivate, educate, and leave a lasting impression on your audience.
            </p>
          </div>
          <div class="ml-auto text-gray-700 group-hover:text-white group-hover:translate-x-1 transition-all duration-300 flex-shrink-0 self-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  INDUSTRIES WE SERVE                                          -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="max-w-7xl mx-auto flex flex-col gap-14 items-center">

      <div class="flex flex-col items-center text-center gap-6 max-w-3xl">
        <div class="reveal-item flex items-center justify-center gap-3">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Industries We Serve</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h2 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem); transition-delay: 80ms;">
          Industries We Serve
        </h2>
        <p class="reveal-item font-body text-gray-400 text-sm sm:text-base leading-relaxed max-w-xl" style="transition-delay: 140ms;">
          Our AR and VR solutions are ideal for:
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 w-full">

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Real Estate &amp; Property Development</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Property tours, virtual staging, and architectural visualization for developers and agents.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Retail &amp; E-Commerce</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Virtual try-ons, product visualization, and immersive shopping experiences.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Tourism &amp; Hospitality</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Virtual destination tours, hotel previews, and travel experience showcases.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Education &amp; Training</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Immersive learning environments, training simulations, and educational content.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Healthcare &amp; Medical Simulation</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Medical training, patient education, and surgical simulation applications.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281zM15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Manufacturing &amp; Industrial Training</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Equipment training, safety simulations, and industrial process visualization.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Events &amp; Experiential Marketing</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Brand activations, virtual event experiences, and audience engagement.</p>
        </div>

        <div class="reveal-item bg-brand-card border border-brand-border p-6 md:p-8 flex flex-col items-start gap-4 hover:border-white/30 transition-colors duration-300" style="transition-delay: 0ms;">
          <div class="w-10 h-10 flex items-center justify-center border border-brand-border rounded-full text-brand-orange flex-shrink-0">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase">Entertainment &amp; Media</h4>
          <p class="font-body text-gray-500 text-xs leading-relaxed">Immersive storytelling, interactive content, and entertainment experiences.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================ -->
  <!--  VALUE PROPOSITION                                            -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden py-24 md:py-36 px-5 sm:px-8 md:px-16 lg:px-24 border-t border-brand-border">
    <div class="services-bg opacity-20 pointer-events-none"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] pointer-events-none" style="background: radial-gradient(ellipse, rgba(255,92,26,0.08) 0%, transparent 65%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto flex flex-col items-center text-center gap-16">

      <div class="reveal-item flex items-center justify-center gap-3">
        <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Our Promise</span>
        <div class="w-[36px] h-[2px] bg-brand-orange"></div>
      </div>

      <h2 class="reveal-item font-display text-white leading-tight max-w-5xl" style="font-size: clamp(2.4rem, 5.5vw, 4.5rem); transition-delay: 80ms;">
        We unlock new possibilities for customer engagement and brand storytelling through innovative AR and VR solutions that bring your vision to life.
      </h2>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6 w-full">

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 0ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Innovation</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Cutting-edge technology that pushes boundaries.</p>
        </div>

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 80ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Immersion</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Captivating experiences that transport audiences.</p>
        </div>

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 160ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Engagement</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Deep audience connection through interactivity.</p>
        </div>

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 240ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Impact</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Measurable results for your brand.</p>
        </div>

      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!--  FINAL CALL TO ACTION                                         -->
  <!-- ============================================================ -->
  <section class="relative bg-white overflow-hidden py-20 md:py-28 px-5 sm:px-8 md:px-16 lg:px-24 flex flex-col items-center justify-center">

    <div class="relative z-10 w-full max-w-7xl mx-auto flex flex-col items-center justify-center text-center gap-7">

      <div class="reveal-item flex items-center justify-center gap-3">
        <div class="w-8 h-px bg-brand-orange"></div>
        <span class="font-body text-xs text-brand-orange tracking-[0.4em] font-medium uppercase">
          Ready to Begin?
        </span>
        <div class="w-8 h-px bg-brand-orange"></div>
      </div>

      <h2 class="reveal-item font-display text-brand-dark leading-none" style="font-size: clamp(3rem, 7vw, 5.5rem); transition-delay: 80ms;">
        Ready to Create Immersive<br/>Experiences?
      </h2>

      <p class="reveal-item font-body text-gray-500 text-sm sm:text-base md:text-lg max-w-xl mt-1 mx-auto leading-relaxed" style="transition-delay: 160ms;">
        Unlock new possibilities for customer engagement and brand storytelling with innovative AR and VR solutions.
      </p>

      <div class="reveal-item flex flex-col sm:flex-row items-center justify-center gap-4 mt-6" style="transition-delay: 240ms;">

        <a href="{{ route('contact') }}"
           class="relative overflow-hidden group bg-white text-black border border-gray-300 px-10 py-5 rounded-full font-body text-sm tracking-widest uppercase text-center inline-flex items-center gap-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
          <div class="absolute inset-0 bg-black scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500 ease-out z-0 rounded-full"></div>
          <span class="relative z-10 font-medium group-hover:text-white transition-colors duration-300">Start Your Immersive Journey</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-4 h-4 group-hover:text-white group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </a>

        <a href="{{ route('contact') }}"
           class="group inline-flex items-center gap-3 border border-gray-300 text-gray-700 hover:border-black hover:text-black px-10 py-5 rounded-full font-body text-sm tracking-widest uppercase transition-all duration-300 hover:-translate-y-1">
          <span class="font-medium">Contact Us</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        Everything you need to know about AR and VR experiences.
      </p>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto space-y-3 md:space-y-4">

      <!-- FAQ 1 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">What are AR and VR technologies?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Augmented Reality overlays digital content onto real-world environments, while Virtual Reality creates fully immersive digital experiences.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 2 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">What AR and VR services do you offer?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              We develop virtual walkthroughs, immersive training simulations, interactive product experiences, virtual showrooms, and AR applications.
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
    <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">
      <div class="flex flex-col gap-6">
        <div class="flex items-center gap-3">
          <div class="h-10 w-auto overflow-hidden">
            <img src="{{ asset('assets/Simha Logo Web White.png') }}" alt="Simha Logo" class="h-full w-auto object-contain">
          </div>
        </div>
        <p class="text-gray-500 text-sm font-body leading-relaxed max-w-xs">
          &copy; 2026 Simha Interactive. All Rights Reserved.
        </p>
        <div class="flex flex-wrap justify-start items-center gap-3 pt-3">
          <a href="https://www.instagram.com/simhainteractive/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          </a>
          <a href="https://x.com/SimhaInteractiv" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <a href="https://www.youtube.com/@simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
          </a>
          <a href="https://www.linkedin.com/company/simha-interactive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          <a href="https://www.facebook.com/profile.php?id=61590164084216" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
          <a href="https://www.tumblr.com/blog/simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-brand-tumblr"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M14 2a1 1 0 0 1 1 1v3h3a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -1 1h-3v4h3a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -1 1h-4a5 5 0 0 1 -5 -5v-5h-3a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 1 -1h1a2 2 0 0 0 2 -2v-1a1 1 0 0 1 1 -1z" /></svg>
          </a>
          <a href="https://www.quora.com/profile/Simha-Interactive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
             <svg class="w-5 h-5" fill="currentColor" viewBox="-1.5 0 20 20"><g transform="translate(-85, -7279)"><path d="M94.6307159,7294.53993 C94.2430139,7294.63693 93.8504042,7294.67493 93.4715358,7294.67493 C91.455485,7294.67493 89.0409353,7293.78793 89.0409353,7288.25196 C89.0409353,7282.71798 91.5693418,7281.18899 93.5853926,7281.18899 C95.6014434,7281.18899 97.9453233,7282.50598 97.9453233,7288.04196 C97.9453233,7290.55095 97.4437644,7292.14594 96.7076212,7293.14293 C96.695843,7293.14393 96.6870092,7293.14093 96.6870092,7293.14093 C95.0105658,7290.93694 92.8355081,7291.46494 92.3143187,7291.70494 C92.3143187,7291.70494 92.3800808,7292.20994 92.5184758,7293.12893 C93.6688222,7293.12793 94.2390878,7293.73593 94.6366051,7294.52093 C94.632679,7294.52993 94.6307159,7294.53993 94.6307159,7294.53993 M97.9090069,7295.59792 C97.9090069,7295.59792 97.91097,7295.59192 97.912933,7295.58492 C100.362818,7294.03693 102,7291.21394 102,7287.83196 C102,7281.31499 97.8579677,7279 93.5274827,7279 C89.4413972,7279 85,7282.27098 85,7287.95696 C85,7294.47393 89.1420323,7296.86392 93.4734988,7296.86392 C94.1546767,7296.86392 94.816224,7296.78092 95.4512702,7296.62592 C95.4512702,7296.62592 95.4610855,7296.62992 95.4669746,7296.63092 C97.1738453,7299.7369 99.7159931,7298.98591 100.371651,7298.74091 C100.371651,7298.74091 100.283314,7298.19391 100.129215,7297.17592 C98.903291,7297.14392 98.356582,7296.51692 97.9090069,7295.59792"/></g></svg>
          </a>
          <a href="https://www.pinterest.com/simhainteractive/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.782c0-1.67.968-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 0 1 .083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.607 0 11.985-5.373 11.985-11.987C23.97 5.367 18.627.001 12.017.001z"/></svg>
          </a>
          <a href="https://www.behance.net/simhainteractive" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-behance"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 18v-12h4.5a3 3 0 0 1 0 6a3 3 0 0 1 0 6h-4.5" /><path d="M3 12l4.5 0" /><path d="M14 13h7a3.5 3.5 0 0 0 -7 0v2a3.5 3.5 0 0 0 6.64 1" /><path d="M16 6l3 0" /></svg>
          </a>
          <a href="https://www.reddit.com/user/Comfortable_Head5568/" target="_blank" rel="noopener noreferrer"
             class="social-icon w-12 h-12 flex items-center justify-center border border-brand-border rounded-full text-gray-500">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-reddit"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 8c2.648 0 5.028 .826 6.675 2.14a2.5 2.5 0 0 1 2.326 4.36c0 3.59 -4.03 6.5 -9 6.5c-4.875 0 -8.845 -2.8 -9 -6.294l-1 -.206a2.5 2.5 0 0 1 2.326 -4.36c1.646 -1.313 4.026 -2.14 6.674 -2.14l.999 0" /><path d="M12 8l1 -5l6 1" /><path d="M18 4a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M8.5 13a.5 .5 0 1 0 1 0a.5 .5 0 1 0 -1 0" fill="currentColor" /><path d="M14.5 13a.5 .5 0 1 0 1 0a.5 .5 0 1 0 -1 0" fill="currentColor" /><path d="M10 17c.667 .333 1.333 .5 2 .5s1.333 -.167 2 -.5" /></svg>
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
