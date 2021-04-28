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

    cd docker

**Настройка .env приложения**

Скопируйте файл .env.example в .env

    cp .env.example .env

Найдите блок, задающий DB_CONNECTION и обновите его для отражения особенностей настройки вашей системы. Вы измените следующие поля:

    - DB_HOST будет вашим контейнером базы данных db.
    - DB_DATABASE будет базой данных laravel.
    - DB_USERNAME будет именем пользователя для вашей базы данных. В этом случае мы будем использовать laraveluser.
    - DB_PASSWORD будет защищенным паролем для этой учетной записи пользователя.

Сконфигурируйте параметры FB_CLIENT_ID и FB_SECRET_ID согласно вашим настройкам Facebook Development Oauth
[Официальная документация](https://developers.facebook.com/docs/graph-api/)

    FB_CLIENT_ID=client_id
    FB_SECRET_ID=secret_id

Разверните докер-контейнер командой:  

    docker-compose up -d

Следующая команда будет генерировать ключ и скопирует его в файл .env, гарантируя безопасность сеансов пользователя и шифрованных данных

    docker-compose exec app php artisan key:generate

Установите все зависимости, используя composer

    docker-compose exec app composer install

Чтобы создать нового пользователя, запустите интерактивную оболочку bash в контейнере db с помощью команды docker-compose exec

    docker-compose exec db bash

Выполните внутри контейнера вход в административную учетную запись MySQL root:

    mysql -u root -p

Затем создайте учетную запись пользователя, которой будет разрешен доступ к этой базе данных. Как пример используем имя пользователя laraveluser, но вы можете заменить его любым предпочитаемым именем. Просто убедитесь, что имя пользователя и пароль соответствуют заданным в файле .env на предыдущем шаге:

    GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY 'your_laravel_db_password';

Обновите привилегии, чтобы уведомить сервер MySQL об изменениях:

    FLUSH PRIVILEGES;

Закройте MySQL и выйдите из контейнера поочередно вводя команду exit
    
    EXIT

Запустите миграцию базы данных (вместе с seed's) (**Установите соединение с базой данных в .env перед миграцией**)

    docker-compose exec app php artisan migrate:fresh --seed

Сборка фронтенда (Laravel Mix)

    npm install && npm run development

## API Спецификация

Это приложение имеет REST API для получения текущего состояния бара с его посетителями

    Пример api-запроса : https://host/api/bar?api_token=5of1CgNeLd8gMdkKoBUxzfn3mbdukBWkPU7rwF2l8hDBZFa196CAdF31vP1VfzmkCwfZkZENjL42LAaU

***Примечание*** : Api был сделан на "скорую руку" с опущением соблюдения требований безопасности и токен хранится в открытом виде для демонстрации функционала.


----------

# Code overview

## Папки

- `app/Models` - Содержит все модели Eloquent
- `app/Http/Controllers/Api` - Содержит Api контроллер
- `app/Services` - Содержит сервисы для обработки логики 
- `database/factories` - Содержит фабрику моделей для всех моделей
- `database/migrations` - Содержит все миграции базы данных
- `database/seeds` - Содержит seeds базы данных
- `routes` - Содержит все маршруты приложения

## Переменные среды

- `.env` - В этом файле можно установить переменные среды

***Примечание***: Вы можете задать информацию о базе данных и другие переменные в этом файле, и приложение будет полностью работать.

----------

# Тестирование API

Список пользователей можно получить по адресу

    http://localhost:8080/api/users

***Примечание***: acceskey хранится в .env. Для доступа к api его необходимо передвать в header запроса с ключом 'ACCESSKEY'

##Пример ответа сервера

```json
[
    {
        "id": 2,
        "register_at": "2021-04-26T16:00:35.000000Z",
        "bonusName": "Кружка с логотипом BioData"
    }
]
```



