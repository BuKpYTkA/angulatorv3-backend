# angulator-v3

This is API for Angulator-v3-ui
https://github.com/Michaelel/angulator-v3-ui
## Table of contents

- [Getting started](#getting-started)
- [How to use](#how-to-use)
- [Technical requirements](#technical-requirements)
- [Demo](#demo)
## Getting started
- Clone it form github
  ```sh
  git clone https://github.com/BuKpYTkA/angulatorv3-backend.git
  ```
- Got to new directory of project
    ```sh
    cd AngulatorV3-backend
    ```
- Install project dependencies via composer
    ```sh
    composer install
    ```
- Fill config fields in /.env file related with database. For example
    DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=angulator_v3_db
DB_USERNAME=root
DB_PASSWORD=
- Run command to create tables in database
    ```sh
    php artisan migrate
    ```
- Run server
    ```sh
    php artisan serve
    ```
Now your project is accessible on local address: http://127.0.0.1:8000

## How to use

There are 3 endpoints:

1. Get user statistic
    - Method: **GET**
    - Url: **api/user/stats/get**
    - Parameters: **email: string** - email of the user.
    - Example: http://172.0.0.1:8080/api/user/stats/get?email=test@gmail.com
    - Response:
    ```json
    {
        "data": [
            {
                "id": string,
                "isWin": bool,
                "date": string,
                "gameType": string,
                "answerTitle": string,
                "answerSource": string,
                "gameSource": string
            }
        ]
    }
    ```
2. Start game of recognizing music
    - Method: **POST**
    - Url: **api/game/start**
    - Body parameters:
    ```json
    {
        "email": string,
        "gameType": string,
        "gameSource": string
    }
    ```
    - Email is a user email which starts game.
    - GameType is a type of the game (lyrics for recognizing by text, sound - for recognizing by sound and humming - for recognizing by human voice)
    - Game source - is a base64 encoded string of sound or human voice or text
    - Response:
    ```json
    {
        "id": int,
        "title": string,
        "source": string
    }
    ```
3. Finish the game. User change if he win or computer in particular game.
    - Method **POST**
    - Url: **api/game/finish**
    - Body parameters:
    ```json
    {
        "id": int,
        "isWin": boolean
    }
    ```
## Technical requirements
- php^7.2.5

## Demo
[Working API endpoints Demo](http://angulatorv3-backend.herokuapp.com/api)
