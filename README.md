# Laravel-Pusher Card Game and Leaderboard
Simple card game with a leaderboard to showcase how a realtime table can be created with [Pusher](https://pusher.com/) and [Laravel](https://laravel.com). To test this app locally:
1. Clone this repo -- `git clone https://github.com/olayinkaos/pusher-laravel-realtime-table.git`.
2. Copy `.env.example` to `.env` and configure your local environment variables, *especially the database and pusher settings*.
3. Install all dependencies -- `composer install && npm install`
4. Generate a new application key - `php artisan key:generate`
5. Migrate the database tables and seed the database -- `php artisan migrate --seed`
6. Edit in your Pusher App Key in `resources/assets/js/bootstrap.js`.
7. Run using your local web server, or PHP's built-in option - `php artisan serve`