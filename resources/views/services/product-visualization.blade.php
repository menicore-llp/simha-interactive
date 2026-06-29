<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>Product Visualization - Simha Interactive</title>
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
         style="font-size: clamp(16rem, 22vw, 28rem); opacity: 0.018; line-height: 1; letter-spacing: -0.05em;">P</div>

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
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Product Visualization</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>

        <h1 class="reveal-item font-display text-white leading-none" style="font-size: clamp(3rem, 7vw, 6rem); transition-delay: 120ms;">
          Bring Your Products to Life<br class="hidden sm:block"/> with Stunning Visuals
        </h1>

        <p class="reveal-item font-body text-gray-400 text-base md:text-lg max-w-2xl leading-relaxed" style="transition-delay: 180ms;">
          In today's digital marketplace, high-quality product visuals play a crucial role in influencing purchasing decisions. At Simha Interactive, we create realistic and engaging product visualizations that help businesses showcase their products with clarity, precision, and impact.
        </p>

        <div class="reveal-item mt-2" style="transition-delay: 240ms;">
          <a href="{{ route('contact') }}"
             class="btn-ghost border border-white text-white px-10 py-4 font-body text-sm tracking-widest uppercase inline-flex items-center gap-3">
            <span>Let's Visualize Your Products</span>
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
          Products That Look<br/>as Good as They Perform
        </h2>
        <p class="reveal-item font-body text-gray-400 text-base md:text-lg leading-relaxed" style="transition-delay: 140ms;">
          From photorealistic renders to animated product demonstrations, our visualization solutions help brands enhance marketing campaigns, improve customer engagement, and accelerate sales.
        </p>
        <p class="reveal-item font-body text-gray-500 text-sm md:text-base leading-relaxed" style="transition-delay: 180ms;">
          We combine cutting-edge rendering technology with creative artistry to produce product visuals that build customer confidence and drive purchasing decisions.
        </p>
        <div class="reveal-item" style="transition-delay: 220ms;">
          <a href="{{ route('contact') }}" class="group inline-flex items-center gap-4">
            <span class="font-body text-sm text-white tracking-[0.3em] uppercase border-b border-white/20 pb-1 group-hover:border-brand-orange group-hover:text-brand-orange transition-all duration-300">
              Start Your Product Project
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
                <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase mb-2">Photorealistic Quality</h4>
                <p class="font-body text-gray-500 text-sm leading-relaxed">Highly detailed renders that accurately represent materials, textures, and product features.</p>
              </div>
            </div>
            <div class="flex items-start gap-5 pb-7 border-b border-brand-border">
              <div class="w-8 h-px bg-brand-orange mt-3 flex-shrink-0"></div>
              <div>
                <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase mb-2">Dynamic Presentations</h4>
                <p class="font-body text-gray-500 text-sm leading-relaxed">Animations and explainer videos that demonstrate product features and functionality.</p>
              </div>
            </div>
            <div class="flex items-start gap-5">
              <div class="w-8 h-px bg-brand-orange mt-3 flex-shrink-0"></div>
              <div>
                <h4 class="font-body font-medium text-white text-sm tracking-wider uppercase mb-2">Marketing Optimized</h4>
                <p class="font-body text-gray-500 text-sm leading-relaxed">Visuals tailored for e-commerce, catalogs, social media, and digital advertising campaigns.</p>
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
          Comprehensive product visualization services designed to showcase your products with clarity, detail, and impact.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">

        <!-- Card 1: 3D Product Rendering -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-5" style="transition-delay: 0ms;">
          <div class="service-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">3D Product Rendering</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Create highly detailed and photorealistic product images that highlight design, materials, features, and functionality from every angle.
            </p>
          </div>
          <div class="mt-auto pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

        <!-- Card 2: Product Animations -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-5" style="transition-delay: 80ms;">
          <div class="service-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">Product Animations</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Showcase product features, assembly processes, and functionality through dynamic animations that captivate and inform your audience.
            </p>
          </div>
          <div class="mt-auto pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

        <!-- Card 3: Explainer Videos -->
        <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-5" style="transition-delay: 160ms;">
          <div class="service-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/>
            </svg>
          </div>
          <div>
            <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">Explainer Videos</h3>
            <p class="font-body text-gray-500 text-sm leading-relaxed">
              Simplify complex concepts and demonstrate product benefits with engaging visual storytelling that enhances customer understanding.
            </p>
          </div>
          <div class="mt-auto pt-5 border-t border-brand-border">
            <div class="w-8 h-[2px] bg-brand-orange"></div>
          </div>
        </div>

      </div>

      <div class="flex flex-wrap justify-center gap-6 w-full">
        <div class="w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)]">
          <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-5 h-full" style="transition-delay: 240ms;">
            <div class="service-icon w-10 h-10">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                <path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
              </svg>
            </div>
            <div>
              <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">Lifestyle Visual Scenes</h3>
              <p class="font-body text-gray-500 text-sm leading-relaxed">
                Present products in realistic environments to help customers visualize how they fit into everyday life and intended use cases.
              </p>
            </div>
            <div class="mt-auto pt-5 border-t border-brand-border">
              <div class="w-8 h-[2px] bg-brand-orange"></div>
            </div>
          </div>
        </div>
        <div class="w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)]">
          <div class="service-card reveal-item bg-brand-card p-7 md:p-9 border border-brand-border flex flex-col gap-5 h-full" style="transition-delay: 320ms;">
            <div class="service-icon w-10 h-10">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                <path d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
              </svg>
            </div>
            <div>
              <h3 class="font-body text-white text-lg font-medium tracking-wide uppercase mb-3">E-commerce Visual Assets</h3>
              <p class="font-body text-gray-500 text-sm leading-relaxed">
                Develop high-quality product images, banners, and marketing visuals optimized for e-commerce platforms, websites, catalogs, and digital campaigns.
              </p>
            </div>
            <div class="mt-auto pt-5 border-t border-brand-border">
              <div class="w-8 h-[2px] bg-brand-orange"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="reveal-item mt-4 w-full flex justify-center" style="transition-delay: 200ms;">
        <a href="{{ route('contact') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex">
          <span>Discuss Your Product Visualization Needs</span>
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
          Product Showcase
        </h2>
        <p class="reveal-item font-body text-gray-400 text-base leading-relaxed max-w-2xl" style="transition-delay: 140ms;">
          A collection of product visualizations that bring ideas to life and drive customer engagement.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

        <!-- 3D Product Rendering Carousel (7 images) -->
        <div class="reveal-item showcase-item relative overflow-hidden showcase-feature md:col-span-2 lg:col-span-2 group" style="transition-delay: 0ms;">
          <div class="carousel-container">
            <div class="card-skeleton">
              <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <div class="card-skeleton-bars"><div class="card-skeleton-bar"></div><div class="card-skeleton-bar short"></div></div>
            </div>
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/10.png') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Ear Pod.png') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/HP Laptop.jpg') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Metal Chair.jpg') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Pavillion_Shot_01.jpg') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Smart Watch.png') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Solo Ear Pod.png') }}" alt="3D Product" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="showcase-label"><p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">3D Product Rendering</p></div>
          <div class="service-img-line"></div>
        </div>

        <!-- Product Animations Carousel (3 videos) -->
        <div class="reveal-item showcase-item relative overflow-hidden group" style="aspect-ratio: 8/9; transition-delay: 80ms;">
          <div class="carousel-container">
            <div class="card-skeleton">
              <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <div class="card-skeleton-bars"><div class="card-skeleton-bar"></div><div class="card-skeleton-bar short"></div></div>
            </div>
            <div class="carousel-slide active"><video src="{{ asset('assets/service-images/Product Visualization/Product Animation/Buds.mp4') }}" muted loop playsinline preload="metadata" class="w-full h-full object-cover"></video></div>
            <div class="carousel-slide"><video src="{{ asset('assets/service-images/Product Visualization/Product Animation/Smart Watch.mp4') }}" muted loop playsinline preload="metadata" class="w-full h-full object-cover"></video></div>
            <div class="carousel-slide"><video src="{{ asset('assets/service-images/Product Visualization/Product Animation/Spotlight Stand.mp4') }}" muted loop playsinline preload="metadata" class="w-full h-full object-cover"></video></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="showcase-label"><p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Product Animations</p></div>
          <div class="service-img-line"></div>
        </div>

        <!-- Explainer Videos Carousel (1 video) -->
        <div class="reveal-item showcase-item relative overflow-hidden group" style="aspect-ratio: 4/3; transition-delay: 160ms;">
          <div class="carousel-container">
            <div class="card-skeleton">
              <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <div class="card-skeleton-bars"><div class="card-skeleton-bar"></div><div class="card-skeleton-bar short"></div></div>
            </div>
            <div class="carousel-slide active"><video src="{{ asset('assets/service-images/Product Visualization/Explainers Video/Atomberg Ver-10.mp4') }}" muted loop playsinline preload="metadata" class="w-full h-full object-cover"></video></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="showcase-label"><p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Explainer Videos</p></div>
          <div class="service-img-line"></div>
        </div>

        <!-- Lifestyle Visual Scenes Carousel (6 images) -->
        <div class="reveal-item showcase-item relative overflow-hidden group" style="aspect-ratio: 4/3; transition-delay: 240ms;">
          <div class="carousel-container">
            <div class="card-skeleton">
              <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <div class="card-skeleton-bars"><div class="card-skeleton-bar"></div><div class="card-skeleton-bar short"></div></div>
            </div>
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/Product Visualization/Lifestyle Visual Scenes/M01Ibiza-02_Milieu-Ibiza-01-Col-2_Content-Image_sideview_01.png') }}" alt="Lifestyle" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/Lifestyle Visual Scenes/Piece Dyed Dobby Border Bath Towel_Lifestyle.jpg') }}" alt="Lifestyle" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/Lifestyle Visual Scenes/Towel.jpg') }}" alt="Lifestyle" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/Lifestyle Visual Scenes/Yarn Dyed Fashion Dobby Non- Terry Bath Towel_Lifestyle.jpg') }}" alt="Lifestyle" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/Lifestyle Visual Scenes/Yarn Dyed Fashion Jacquard Terry Bath Towel_Lifestyle.jpg') }}" alt="Lifestyle" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="showcase-label"><p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Lifestyle Visual Scenes</p></div>
          <div class="service-img-line"></div>
        </div>

        <!-- E-commerce Visual Assets Carousel (6 images) -->
        <div class="reveal-item showcase-item relative overflow-hidden group" style="aspect-ratio: 4/3; transition-delay: 320ms;">
          <div class="carousel-container">
            <div class="card-skeleton">
              <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <div class="card-skeleton-bars"><div class="card-skeleton-bar"></div><div class="card-skeleton-bar short"></div></div>
            </div>
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/Product Visualization/E-commerce Visual Assets/2.png') }}" alt="E-commerce" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/E-commerce Visual Assets/4.png') }}" alt="E-commerce" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/E-commerce Visual Assets/5.png') }}" alt="E-commerce" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/E-commerce Visual Assets/6.png') }}" alt="E-commerce" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/E-commerce Visual Assets/Lakme.png') }}" alt="E-commerce" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/E-commerce Visual Assets/Vatika Jasmine.png') }}" alt="E-commerce" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="showcase-label"><p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">E-commerce Visual Assets</p></div>
          <div class="service-img-line"></div>
        </div>

        <!-- Complete Product Visualization Carousel (6 images) -->
        <div class="reveal-item showcase-item relative overflow-hidden showcase-cinema md:col-span-2 lg:col-span-3 group" style="transition-delay: 400ms;">
          <div class="carousel-container">
            <div class="card-skeleton">
              <svg class="card-skeleton-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <div class="card-skeleton-bars"><div class="card-skeleton-bar"></div><div class="card-skeleton-bar short"></div></div>
            </div>
            <div class="carousel-slide active"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/10.png') }}" alt="Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Ear Pod.png') }}" alt="Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/HP Laptop.jpg') }}" alt="Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Pavillion_Shot_01.jpg') }}" alt="Product" class="w-full h-full object-cover" loading="lazy"></div>
            <div class="carousel-slide"><img src="{{ asset('assets/service-images/Product Visualization/3D Product Rendering/Smart Watch.png') }}" alt="Product" class="w-full h-full object-cover" loading="lazy"></div>
            <button class="carousel-arrow carousel-arrow-prev" aria-label="Previous">‹</button>
            <button class="carousel-arrow carousel-arrow-next" aria-label="Next">›</button>
          </div>
          <div class="showcase-label"><p class="font-body text-white text-xs tracking-[0.25em] uppercase font-medium">Complete Product Visualization</p></div>
          <div class="service-img-line"></div>
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
          We help businesses create compelling product experiences that build customer confidence, increase engagement, and drive conversions.
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
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Photorealistic &amp; Detail-Oriented Visualizations</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Every render is crafted with meticulous attention to detail, delivering visuals that are virtually indistinguishable from photography.
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
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">High-Quality Renders &amp; Animations</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              From static images to dynamic animations, we deliver production-ready visuals that elevate your brand presence.
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
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Faster Product Presentation Without Physical Photography</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Eliminate the need for costly photoshoots and get market-ready product visuals in a fraction of the time.
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
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Cost-Effective Marketing Solutions</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Reduce production costs while maintaining exceptional visual quality across all your marketing channels.
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
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Customized Visuals Tailored to Your Brand</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Every visualization is designed to align with your brand identity, ensuring consistency across all touchpoints.
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
            <h3 class="font-body font-medium text-white text-sm sm:text-base tracking-wider uppercase mb-1">Suitable for E-Commerce, Manufacturing, Retail &amp; Product Marketing</h3>
            <p class="font-body text-gray-600 text-xs sm:text-sm leading-relaxed max-w-sm mt-1">
              Our product visualization services cater to a wide range of industries, from e-commerce and retail to manufacturing and marketing.
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
        We create compelling product experiences that build customer confidence, increase engagement, and drive conversions.
      </h2>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-5 md:gap-6 w-full">

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 0ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Quality</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Photorealistic renders that highlight every detail of your product.</p>
        </div>

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 80ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Speed</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Faster delivery than traditional photography without compromising quality.</p>
        </div>

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 160ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Engagement</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Dynamic visuals that capture attention and drive customer action.</p>
        </div>

        <div class="pillar-card reveal-item border border-brand-border p-6 md:p-8 flex flex-col items-center text-center gap-4" style="transition-delay: 240ms;">
          <div class="pillar-icon w-10 h-10">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
              <path d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h4 class="font-body font-medium text-white text-xs tracking-[0.2em] uppercase">Versatility</h4>
          <p class="font-body text-gray-600 text-xs leading-relaxed">Visuals optimized for e-commerce, print, social media, and campaigns.</p>
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
        Ready to Showcase Your Products<br/>with Impactful Visuals?
      </h2>

      <p class="reveal-item font-body text-gray-500 text-sm sm:text-base md:text-lg max-w-xl mt-1 mx-auto leading-relaxed" style="transition-delay: 160ms;">
        Let's create visuals that turn attention into action.
      </p>

      <div class="reveal-item flex flex-col sm:flex-row items-center justify-center gap-4 mt-6" style="transition-delay: 240ms;">

        <a href="{{ route('contact') }}"
           class="relative overflow-hidden group bg-white text-black border border-gray-300 px-10 py-5 rounded-full font-body text-sm tracking-widest uppercase text-center inline-flex items-center gap-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
          <div class="absolute inset-0 bg-black scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500 ease-out z-0 rounded-full"></div>
          <span class="relative z-10 font-medium group-hover:text-white transition-colors duration-300">Start Your Project</span>
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
        Everything you need to know about product visualization.
      </p>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto space-y-3 md:space-y-4">

      <!-- FAQ 1 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">What is product visualization?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Product visualization involves creating photorealistic 3D images, animations, and interactive experiences to showcase products before or after manufacturing.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 2 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">What product visualization services do you offer?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              We provide 3D product rendering, product animation, 360&deg; product views, exploded views, lifestyle renders, and AR-ready product models.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 3 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">Can you create product renders before manufacturing?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Yes. We can create highly realistic visualizations from CAD files, sketches, technical drawings, or concept designs.
            </div>
          </div>
        </div>
      </details>

      <!-- FAQ 4 -->
      <details class="faq-item group bg-[#0e0e0e] border border-brand-border rounded-xl overflow-hidden hover:border-white/20 transition-all duration-300">
        <summary class="flex items-center justify-between gap-4 px-5 md:px-7 py-4 md:py-5 cursor-pointer text-white font-body text-sm md:text-base font-medium tracking-wide hover:text-brand-orange transition-colors duration-300">
          <span class="leading-snug">Can product visualizations be used for e-commerce and marketing?</span>
          <svg class="faq-icon w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </summary>
        <div class="faq-content">
          <div>
            <div class="px-5 md:px-7 pb-4 md:pb-5 text-gray-400 font-body text-sm leading-relaxed border-t border-brand-border pt-4">
              Absolutely. They are ideal for websites, online stores, catalogs, social media, advertisements, and product presentations.
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
