## Mini build task
Build a simplified Laravel module to simulate a typical performance-sensitive feature on the platform.

### Required Feature:
A lightweight Service Provider Directory with the following specs:

### Functional Requirements:
- List of service providers with:
- Name, short description, logo, and category
- Ability to filter by category
- Each provider has a profile page

### Technical Requirements:
- Use Laravel 10+ and Eloquent ORM
- Ensure no N+1 queries (use eager loading)
- Optimize for fast TTFB and LCP (defer JS, lazy load images, minimize critical CSS)
- Add basic unit or feature tests
- Add performance-focused README:
  - Design decisions
  - Performance optimizations
  - Areas for future enhancement

## Build and run instructions
- Run `composer install`
- Copy .env.example to .env `cp .env.example .env`
- Run `php artisan key:generate`
- Run `./vendor/bin/sail up -d`
- Run `./vendor/bin/sail artisan migrate`
- Run `./vendor/bin/sail artisan storage:link`
- Run `./vendor/bin/sail artisan module:seed`
- Run `./vendor/bin/sail npm install`
- Run `./vendor/bin/sail npm run build`
- Open link http://localhost:8080/agencies

## Design decisions
- Using pgsql as a DB as have recent experience only with it
- Using nwidart/laravel-modules, lorisleiva/laravel-actions, tucker-eric/eloquentfilter to better structure the source code
- Categories implemented as many-to-many relation as they can be used in other application entities. Implemented a trait for ease of use.
- Using spatie/laravel-sluggable to hide internal id structure

## Performance optimizations
- Checked that existing scripts have type="module" - are deferred by default
- vite minifies js and css on build
- Added loading="lazy" to imag tags
- Added HTML minification middleware fahlisaputra/laravel-minify
- Added cache headers middleware
- After deployment to prod "php artisan view:cache" command should be run

## Areas of future enhancement
- Use memcached or Redis to cache query results. Use request data as a cache key.
- Implement cache invalidation logic for it.
- If search/filtering gets more complex, consider moving it to an external service like Elastic
- Move static resources to a CDN
