# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Simha Interactive is a Laravel 12 marketing agency website with a public-facing frontend and an authenticated admin panel for blog management. Database is MySQL (via XAMPP locally).

## Commands

**Initial setup (first time only):**
```bash
composer run setup
php artisan db:seed
php artisan storage:link
```

**Development (runs Laravel server + queue + Vite concurrently):**
```bash
composer run dev
```

**Run all tests:**
```bash
composer test
```

**Run a single test file:**
```bash
php artisan test tests/Feature/ExampleTest.php
```

**Lint / format PHP:**
```bash
./vendor/bin/pint
```

**Build frontend assets:**
```bash
npm run build
```

## Architecture

### Routing split

All routes are in `routes/web.php`. Public pages use inline closures directly in the route file (no dedicated controller). Only the contact form submission and the admin panel have controllers.

- Public: `/`, `/about`, `/services`, `/portfolio`, `/contact`, `/blogs`, `/blogs/{slug}`
- Admin: `/admin/*` — all behind `auth` middleware; dashboard redirects to blogs index
- Contact form is throttled at 3 requests/minute

### Admin panel

`/admin/login` → `Admin\AuthController` (standard Laravel Auth)  
`/admin/blogs` → `Admin\BlogController` (full resource: index, create/store, edit/update, destroy)  
Both `edit` and `show` reuse the same `resources/views/admin/add-blog.blade.php` view.

Admin credentials (seeded): `admin@simhainteractive.com` / `password`

### Models

All three content models (`Blog`, `Career`, `Applicant`) use soft deletes. `Career` and `Applicant` models and their controllers exist but are **not yet routed** — they are scaffolded but inactive.

`Blog.slug` is auto-generated as `Str::slug($title) . '-' . time()` when left blank. Blog images are stored in `storage/app/public/blogs/` via Laravel's public disk.

### Mail

Contact form sends a single `ContactFormMail` to the address in `ADMIN_RECEIVER_EMAIL` env var (defaults to `info@simhainteractive.com`). In local dev, mail defaults to `log` driver.

### Frontend / Blade

Public-facing Blade views (`resources/views/*.blade.php`) are **standalone HTML files** — they do not extend a shared layout. Tailwind CSS is loaded via CDN in each public view with an inline `tailwind.config` block.

The admin section uses a shared layout: `resources/views/layouts/admin.blade.php`.

Vite compiles `resources/css/app.css` and `resources/js/app.js` (Tailwind v4 via `@tailwindcss/vite`), but the public views currently use the CDN version, not the compiled asset.

**Brand design tokens** (defined in each view's inline tailwind config):
- Colors: `brand-orange` (#FF5C1A), `brand-dark` (#080808), `brand-card` (#111111), `brand-border` (#1f1f1f), `brand-muted` (#5a5a5a)
- Fonts: `font-display` (Bebas Neue), `font-body` (Outfit), `font-accent` (DM Sans)

### Testing

Tests use SQLite in-memory (configured in `phpunit.xml`) — no MySQL required for the test suite.
