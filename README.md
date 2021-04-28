<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Тестовое задание "BioData"

----------

# Начало


## Установка

Склонируйте репозиторий

    git clone git@github.com:VladVasilenko/docker.git

Перейдите в папку проекта

    cd BarProject

Установите все зависимости, используя composer

    composer install

Скопируйте пример файла env и внесите необходимые изменения конфигурации в файл .env.

    cp .env.example .env

Сгенерируйте новый ключ приложения

    php artisan key:generate

Запустите миграцию базы данных (**Установите соединение с базой данных в .env перед миграцией**)

    php artisan migrate

Сборка фронтенда (Laravel Mix)

    npm install && npm run development

**TL;DR Список команд**

    git clone git@github.com:VladVasilenko/BarProject.git
    cd BarProject
    composer install
    cp .env.example .env
    php artisan key:generate

**Убедитесь, что вы верно сконфигурировали переменные окружения согласно вашей базы данных перед запуском миграции** [Переменные среды](#переменные-среды)

    php artisan migrate

## Заполнение базы данных

**Заполните базу данных исходными данными, которые включают тестового пользователя и жанры музыки.**

Запустите команду для наполнения базы данных данными

    php artisan db:seed

***Примечание*** : Рекомендуется иметь чистую базу данных перед заполнением. Вы можете обновить свои миграции в любой момент, чтобы очистить базу данных, выполнив следующую команду

    php artisan migrate:refresh

## API Спецификация

Это приложение имеет REST API для получения текущего состояния бара с его посетителями

    Пример api-запроса : https://host/api/bar?api_token=5of1CgNeLd8gMdkKoBUxzfn3mbdukBWkPU7rwF2l8hDBZFa196CAdF31vP1VfzmkCwfZkZENjL42LAaU

***Примечание*** : Api был сделан на "скорую руку" с опущением соблюдения требований безопасности и токен хранится в открытом виде для демонстрации функционала.


----------

# Code overview

## Папки

- `app/Models` - Содержит все модели Eloquent
- `app/Http/Controllers/Api` - Содержит Api контроллер
- `app/Services` - Содержит сервис для обработки логики бара
- `database/factories` - Содержит фабрику моделей для всех моделей
- `database/migrations` - Содержит все миграции базы данных
- `database/seeds` - Содержит seeds базы данных
- `routes` - Содержит все маршруты приложения

## Переменные среды

- `.env` - В этом файле можно установить переменные среды

***Примечание***: Вы можете задать информацию о базе данных и другие переменные в этом файле, и приложение будет полностью работать.

----------

# Тестирование API

Состояние бара можно получить по адресу

    https://host/api/bar?api_token=5of1CgNeLd8gMdkKoBUxzfn3mbdukBWkPU7rwF2l8hDBZFa196CAdF31vP1VfzmkCwfZkZENjL42LAaU

***Примечание***: api_token задан в seed Пользователя и хранится в открытом виде для демонстрации функционала. Правильное использование api_token описано в [официальной документации](https://laravel.com/docs/6.x/api-authentication)

##Пример ответа сервера

```json
{
    "id": 1,
    "name": "ut",
    "music_id": 1,
    "visitors": [
        {
            "id": 1,
            "bar_id": 1,
            "name": "Dr. Ulises Wolf",
            "action_name": "Пьет",
            "musics": [
                {
                    "id": 2,
                    "name": "Поп",
                    "pivot": {
                        "visitor_id": 1,
                        "music_id": 2
                    }
                },
                {
                    "id": 3,
                    "name": "Джаз",
                    "pivot": {
                        "visitor_id": 1,
                        "music_id": 3
                    }
                },
                {
                    "id": 5,
                    "name": "Электро",
                    "pivot": {
                        "visitor_id": 1,
                        "music_id": 5
                    }
                }
            ]
        },
        {
            "id": 4,
            "bar_id": 1,
            "name": "Prof. Cathryn Lesch MD",
            "action_name": "Танцует",
            "musics": [
                {
                    "id": 1,
                    "name": "Рок",
                    "pivot": {
                        "visitor_id": 4,
                        "music_id": 1
                    }
                },
                {
                    "id": 3,
                    "name": "Джаз",
                    "pivot": {
                        "visitor_id": 4,
                        "music_id": 3
                    }
                },
                {
                    "id": 5,
                    "name": "Электро",
                    "pivot": {
                        "visitor_id": 4,
                        "music_id": 5
                    }
                }
            ]
        }
    ],
    "music": {
        "id": 1,
        "name": "Рок"
    }
}
```



