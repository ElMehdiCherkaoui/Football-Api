# Football API (Laravel)

Laravel project with:
- Public API endpoint: /api/fixtures?league=19&season=2024
- Public API endpoint: /api/topscorers?league=19&season=2024
- Admin panel for managing datasets by type, league, and season
- PostgreSQL-ready setup

## Tech Stack

- Laravel 13
- PostgreSQL (recommended)
- Laravel Breeze (authentication for admin)

## Project Structure

- API routes: routes/api.php
- Web/admin routes: routes/web.php
- Data model: app/Models/FootballData.php
- API controllers:
  - app/Http/Controllers/Api/FixturesController.php
  - app/Http/Controllers/Api/TopScorersController.php
- Admin controller: app/Http/Controllers/Admin/FootballDataController.php
- Seed files:
  - database/seeders/data/fixtures_19_2024.json
  - database/seeders/data/topscorers_19_2024.json

## Setup

1. Install dependencies

   composer install
   npm install

2. Configure environment

   Copy .env.example to .env and update DB values:

   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=football_api
   DB_USERNAME=postgres
   DB_PASSWORD=postgres

3. Generate key

   php artisan key:generate

4. Run migrations and seeders

   php artisan migrate --seed

5. Run the app

   php artisan serve

## Default Admin Account

The seeder creates:
- Email: admin@example.com
- Password: password

Login URL:
- /login

Admin pages:
- /admin/football-data

## API Endpoints

- GET /api/fixtures?league=19&season=2024
- GET /api/topscorers?league=19&season=2024

Responses are returned from stored dataset payloads in the database.

## How To Add More Data

Option 1 (Admin UI):
- Login to /login
- Go to /admin/football-data
- Add a dataset with:
  - type: fixtures or topscorers
  - league: integer
  - season: integer
  - payload_json: full API JSON

Option 2 (Seed files):
- Add or replace JSON files in database/seeders/data
- Keep parameters.league and parameters.season in each payload
- Run:

  php artisan db:seed --class=FootballDataSeeder

## Notes

- This repo currently seeds partial fixtures sample and top scorers sample.
- You can replace seed JSON files with your full dataset and reseed.
