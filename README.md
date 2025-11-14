# Sensitive Blog (Laravel)

A Laravel-based blogging platform featuring dynamic post pages, category/tag organization, and a modern front-end build (Vite + Tailwind CSS).

## Features
- Posts CRUD (title, body, featured image, slug)
- Categories & tags (optional)
- Responsive Blade templates
- SEO-friendly slugs
- Optional Markdown rendering
- Tailwind + Vite asset pipeline

## Tech Stack
Laravel · PHP 8.x · Vite · Tailwind CSS · (Add: Spatie Sluggable / Medialibrary / CommonMark if used)

## Installation
```bash
git clone https://github.com/Skylok-24/Sensitive-Blog.git
cd Sensitive-Blog
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed   # if seeders exist
npm run dev
php artisan serve
```

## Environment (sample)
```
APP_NAME=SensitiveBlog
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```

## Scripts
- Dev: `npm run dev`
- Build: `npm run build`
- Tests: `php artisan test`

## Roadmap
- Comments system
- Post scheduling & drafts
- Full-text search
- Image optimization
- API endpoints (public & admin)
- RSS feed generation

## License
MIT
