# Blue Circle

This project allows you to create your own directory of links website and is built using Laravel, Livewire and Tailwind.

I was commissioned by someone to create this project (for free) but have decided to put this public. Feel free to use it or learn from it.

## Features

* Authentication
* Dashboard (with Google Analytics)
* Users
* Sites
  * Blocks
  * Links
  * Drag and drop for both blocks and links
  * Themes
* Categories
* Pages
* Blog
* Settings
* SEO options (basic)
* Bol.com API (automatically show related products per site)
* Sitemap

## First time setup

```sh
# install deps
composer i && npm i

# migrate and seed database
php artisan migrate:fresh --seed

# create .env file and set database credentials
cp .env.example .env
```

## Getting started

```sh
# run the application
php artisan serve

# compile front-end assets
npm run watch
```

## Deployment

```sh
dep deploy
```

### Migrations

Make sure you are inside the deployer/current directory and run:

```sh
php artisan migrate
```
