<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="robots" content="index, follow" />
  <title>Contact Us - Simha Interactive</title>
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
      gtag('event', 'conversion', {'send_to': 'AW-18229527475/lXrJCPb8gL8cELOHwvRD'}); 
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

    .form-input {
      background-color: #f9fafb;
      border: 1px solid #e5e7eb;
      color: #111827;
      transition: border-color 0.3s ease, background-color 0.3s ease;
    }
    .form-input::placeholder {
      color: #9ca3af;
    }
    .form-input:focus {
      outline: none;
      background-color: #ffffff;
      border-color: #FF5C1A;
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
  <!--  CONTACT HEADER & FORM                                        -->
  <!-- ============================================================ -->
  <section class="relative bg-brand-dark overflow-hidden pt-40 pb-24 md:pt-48 md:pb-36 px-5 sm:px-8 md:px-16 lg:px-24">
    <div class="relative z-10 max-w-7xl mx-auto flex flex-col gap-16 md:gap-24">
      
      <!-- TOP: Center Aligned Title & Info -->
      <div class="reveal-item flex flex-col items-center text-center gap-6 max-w-3xl mx-auto">
        <div class="flex items-center justify-center gap-3 w-full">
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
          <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Contact Us</span>
          <div class="w-[36px] h-[2px] bg-brand-orange"></div>
        </div>
        <h1 class="font-display text-white leading-none" style="font-size: clamp(3.5rem, 8vw, 6rem);">Let’s Start Your Project</h1>
        <p class="font-body text-gray-400 text-base md:text-lg max-w-xl leading-relaxed">
          Have an idea or a project in mind? We’d love to hear from you. Leave us a message and we'll get back to you shortly.
        </p>
      </div>

      <!-- BOTTOM: Grid for Info and Form -->
      <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.2fr] gap-16 lg:gap-24 items-start w-full">
        
        <!-- Left Side: Info Blocks -->
        <div class="flex flex-col gap-12 lg:sticky lg:top-32">

          <div class="reveal-item flex flex-col gap-10" style="transition-delay: 100ms;">
            <!-- HQ Email / Phone -->
            <div class="flex flex-col gap-3 p-6 sm:p-8 bg-brand-card border border-brand-border rounded-xl">
              <a href="mailto:marketing@simhainteractive.com" class="inline-flex items-center gap-3 font-body text-xl md:text-2xl text-white hover:text-brand-orange transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" /><path d="M3 7l9 6l9 -6" /></svg>
                 marketing@simhainteractive.com
              </a>
              <a href="tel:+919227171130" class="inline-flex items-center gap-3 font-body text-gray-400 hover:text-white transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                +91-922 71 71 130
              </a>
            </div>
            
            <!-- Offices Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <!-- UAE -->
              <div class="flex flex-col gap-3 group">
                <div class="flex items-center gap-3">
                  <div class="w-6 h-px bg-brand-orange group-hover:w-10 transition-all duration-300"></div>
                  <h4 class="font-body text-white tracking-[0.2em] uppercase text-sm">UAE</h4>
                </div>
                <p class="font-body text-gray-500 text-sm leading-relaxed max-w-xs">
                  Office No. 405, Royal Class (DIP Branch), Dubai Investment Park 1 - Dubai - United Arab Emirates
                </p>
                <a href="tel:+971558037946" class="inline-flex items-center gap-2 font-body text-gray-400 text-sm hover:text-brand-orange transition-colors w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                  +971 55 803 7946
                </a>
              </div>
              <!-- India -->
              <div class="flex flex-col gap-3 group">
                <div class="flex items-center gap-3">
                  <div class="w-6 h-px bg-brand-orange group-hover:w-10 transition-all duration-300"></div>
                  <h4 class="font-body text-white tracking-[0.2em] uppercase text-sm">India</h4>
                </div>
                <p class="font-body text-gray-500 text-sm leading-relaxed max-w-xs">
                  Block No.2, Nagarwal Compound, Kasthurba Cross Rd Number 1, opp. Jain Upashray, Borivali East, Mumbai, Maharashtra 400066
                </p>
                <a href="tel:+919664883746" class="inline-flex items-center gap-2 font-body text-gray-400 text-sm hover:text-brand-orange transition-colors w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                  +91 96648 83746
                </a>
              </div>
              <!-- Australia -->
              <div class="flex flex-col gap-3 group">
                <div class="flex items-center gap-3">
                  <div class="w-6 h-px bg-brand-orange group-hover:w-10 transition-all duration-300"></div>
                  <h4 class="font-body text-white tracking-[0.2em] uppercase text-sm">Australia</h4>
                </div>
                <p class="font-body text-gray-500 text-sm leading-relaxed max-w-xs">
                  28 Wistow Drive, Aveley, Perth, WA 6069
                </p>
                <a href="tel:+61478310445" class="inline-flex items-center gap-2 font-body text-gray-400 text-sm hover:text-brand-orange transition-colors w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                  +61 478 310 445
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side: Form -->
        <div class="reveal-item bg-white p-6 sm:p-8 md:p-12 border border-gray-100 rounded-xl h-fit shadow-2xl" style="transition-delay: 200ms;">
          @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md mb-6 font-body text-sm" role="alert">
              <span class="block sm:inline">{{ session('success') }}</span>
            </div>
          @endif
          @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md mb-6 font-body text-sm" role="alert">
              <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form id="contactForm" class="flex flex-col gap-6" action="{{ route('contact.submit') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div class="flex flex-col gap-2">
                <label class="font-body text-xs text-gray-600 tracking-wider uppercase">Full Name <span class="text-brand-orange">*</span></label>
                <input type="text" name="name" required class="form-input w-full px-4 py-3.5 text-sm font-body rounded-md" placeholder="John Doe">
              </div>
              <div class="flex flex-col gap-2">
                <label class="font-body text-xs text-gray-600 tracking-wider uppercase">Email Address <span class="text-brand-orange">*</span></label>
                <input type="email" name="email" required class="form-input w-full px-4 py-3.5 text-sm font-body rounded-md" placeholder="john@example.com">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div class="flex flex-col gap-2">
                <label class="font-body text-xs text-gray-600 tracking-wider uppercase">Company Name</label>
                <input type="text" name="company" class="form-input w-full px-4 py-3.5 text-sm font-body rounded-md" placeholder="Your Company">
              </div>
              <div class="flex flex-col gap-2">
                <label class="font-body text-xs text-gray-600 tracking-wider uppercase">Service Interested In</label>
                <div class="relative">
                  <select name="service" class="form-input w-full px-4 py-3.5 text-sm font-body appearance-none rounded-md cursor-pointer">
                    <option value="" disabled selected>Select a Service</option>
                    <option value="design">Design & Branding</option>
                    <option value="visualization">3D Visualization</option>
                    <option value="marketing">Digital Marketing</option>
                    <option value="engagement">AR / VR Engagement</option>
                    <option value="other">Other</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-4 h-4 absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>
              </div>
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-body text-xs text-gray-600 tracking-wider uppercase">Project Details <span class="text-brand-orange">*</span></label>
              <textarea name="message" required rows="5" class="form-input w-full px-4 py-4 text-sm font-body resize-none rounded-md" placeholder="Tell us about your project..."></textarea>
            </div>

            <button type="submit" id="submitBtn" class="relative overflow-hidden group bg-black border border-black text-white mt-4 py-4 px-8 w-full font-body text-sm tracking-widest uppercase text-center inline-flex items-center justify-center gap-3 rounded-full hover:bg-white hover:text-black transition-all duration-300 disabled:opacity-70 disabled:cursor-not-allowed">
              <div class="absolute inset-0 bg-white scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500 ease-out z-0"></div>
              
              <!-- Normal State -->
              <span id="btnText" class="relative z-10 group-hover:text-black font-medium transition-colors duration-300 flex items-center gap-3">
                <span>Send Message</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-4 h-4 relative z-10 group-hover:text-black group-hover:translate-x-1 transition-all duration-300">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
              </span>

              <!-- Loading State (Hidden by default) -->
              <span id="btnLoading" class="hidden relative z-10 group-hover:text-black font-medium transition-colors duration-300 items-center gap-3">
                <svg class="animate-spin h-5 w-5 text-white group-hover:text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Sending...</span>
              </span>
            </button>
            <p class="font-body text-xs text-gray-500 text-center mt-2">We typically reply within 24 hours.</p>

          </form>
        </div>

      </div>
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
          <a href="{{ route('services') }}" class="nav-link hover:text-white transition">Services</a>
          <a href="{{ route('portfolio') }}" class="nav-link hover:text-white transition">Portfolio</a>
          <a href="{{ route('blogs') }}" class="nav-link hover:text-white transition">Blogs</a>
          <a href="{{ route('contact') }}" class="nav-link text-white transition">Contact Us</a>
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
    document.getElementById('contactForm').addEventListener('submit', function() {
      const btn = document.getElementById('submitBtn');
      const text = document.getElementById('btnText');
      const loading = document.getElementById('btnLoading');
      
      // Disable button and show loading state
      btn.disabled = true;
      text.classList.add('hidden');
      loading.classList.remove('hidden');
      loading.classList.add('flex');
    });
  </script>
</body>
</html>
