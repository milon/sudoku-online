# Sudoku Ninja

This is a simple game platform for playing sudoku. This application just provide you the admin panel and API for creating frontend. There is no frontend provided for this application. You have to create it using the provided APIs.

This application is created based on Laravel 5.5 and follows laravel's standard convention.

## Prerequisites

- Composer
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Mysql Database
- composer installed on your machine

## Installation

First unzip the folder using following command-

```
git clone git@github.com:milon/sudoku-online.git sudoku
```

Then write the following commands in terminal one by one-

```
cd sudoku
composer install
cp .env.example .env
```

Then you need to provide the database and mail credentials to the `.env` file. Then run these commands-

```
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

If you want to install some seed data to get a proper idea about how the system works, then run these commands-

```
php artisan db:seed --class=GamesTableSeeder
php artisan db:seed --class=LevelsTableSeeder
php artisan db:seed --class=PlayersTableSeeder
```

## Database

The database schema is provided as migration file. You can also find the schema overview at `docs/database.md`.

## Admin Panel

If you successfully install the application, you can go to the admin panel by visiting `/admin` route. By default one user is created. Here is the credential-

```
Email: admin@sudoku.com
Password: password
```

## API

There are total 10 endpoints for creating a frontend. 4 of them are for registration and authentication purpose, 4 of them are for fetching various listing, and other 2 are for gameplay. The level and points will be calculated autometically while you are using these endpoints. Rather than the authentication endpoints, you need to use an `api_token` to validate your request. This token can be passed through HTTP header using `X-Auth-Token` key or passed as a query parameter using `api_token` key.

Endpoint                 | Method | Middleware | What it does?
:----------------------- | :----- | ---------- | ------------------------------------------
`/api/register`          | POST   | No         | Register a new player
`/api/auth/token`        | POST   | No         | Authenticate a user with credentials
`/api/auth/token/reset`  | POST   | No         | Password reset request
`/api/auth/token/change` | POST   | No         | Password change endpoints
`/api/games`             | GET    | Yes        | Get games list
`/api/levels`            | GET    | Yes        | Get levels list
`/api/levels/{id}`       | GET    | Yes        | Get a individual level details
`/api/leadboard`         | GET    | Yes        | Get top 10 scorer
`/players/next-game`     | GET    | Yes        | Get the next problem of a player
`/players/submit-game`   | POST   | Yes        | Submit the solution of the current problem

More details with the parameters detail will be found in the [Postman](https://www.getpostman.com/) collection here- `docs/Sudoku.postman_collection.json`.

## Admin Panel

After login to the admin panel, you will get some options in the menu bar for managing players, levels, games, submissions and even users. There is also an option to update your information, change your password etc. Here is the brief description-

- You can create a new game by using the provided panel with various options. You can also show the details, update and delete it.
- You can create level and assign multiple game on it. You can also define the position of each game in the level.
- Each level has a rank, with defines the order. I suggest you to assign the rank from 1 to onwards.
- You can create a player with the panel, though register via api is preferable.
- You can manage users for the admin panel as well.

## Game Play

Here is the steps of the game for a player-

- A player will register to the system
- Then he will get his first problem (via `/api/players/next-game` endpoint)
- Then he can submit the solution (via `/api/players/submitgame` endpoint)
- If the submitted solution is correct, it will calculate the points to player's profile and transfer it to next step.
- If submitted solution is wrong, it will calculate the penalty.
- Once all the problem of a level is finished, it will move you to next level.
- You can get the leadboard to get top scorer players. (via `/api/leadboard` endpoint)

## To-Do

Due to shortage of time, automated testing is not done yet. It will be added in future.

## Developer

Nuruzzaman Milon<br>
<http://milon.im><br>
contact@milon.im
