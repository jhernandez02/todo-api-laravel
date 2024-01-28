<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# TASKS REST API

Following we have a sequence of instructions to install and run the app.  
You need to configure database conection first, you need to configure it in the .env file.

## How to install data base
    composer install
    php artisan migrate
    php artisan db:seed

## Run the app
    php artisan serve

# REST API
Following we have a sequence of requests that will be used to test the API.

## User Login

### Request

`POST /api/v1/login`

    curl --request POST \
        --url http://localhost:8000/api/v1/login \
        --header 'Content-Type: application/json' \
        --data '{"user": "jsmith@mail.com","password": "123456"}'

### Response

    {
        "user": {
            "id": 1,
            "name": "Jhon Smith",
            "email": "jsmith@mail.com",
            "email_verified_at": null,
            "created_at": null,
            "updated_at": null
        },
        "token": "1|XUe9oQHGD2HeasUHOdI1xFl0kpFV5KTRjAJkTp71831a2f56"
    }

## Get list of Tasks

### Request

`GET /api/v1/tasks`

    curl --request GET \
        --url 'http://localhost:8000/api/v1/tasks' \
        --header 'Authorization: Bearer 1|kQ3srQniIUo0814uekjUJekAT644W7E0Axkrkc7q'

### Response

    [
        {
            "id": 1,
            "title": "Diseño Web",
            "description": "Diseño de las interfaces Web",
            "completed": 1
        },
        {
            "id": 2,
            "title": "Diseño de base de datos",
            "description": "Analisis y diseño del digrama entidad relación",
            "completed": 1
        },
        {
            "id": 3,
            "title": "Implementación de la base de datos",
            "description": "Instalación de la base de datos y esquema propuesto",
            "completed": 1
        }
    ]

## Create a new Task

### Request

`POST /api/v1/tasks`

    curl --request POST \
        --url http://localhost:8000/api/v1/tasks \
        --header 'Authorization: Bearer 1|XUe9oQHGD2HeasUHOdI1xFl0kpFV5KTRjAJkTp71831a2f56' \
        --header 'Content-Type: application/json' \
        --data '{
            "title":"New Task",
            "description":"Task description"
        }'

### Response

    {
        "title": "New Task",
        "description": "Task description",
        "id": 4
    }

## Get detail Task

### Request

`GET /api/v1/tasks/4`

    curl --request GET \
        --url 'http://localhost:8000/api/v1/tasks/4' \
        --header 'Authorization: Bearer 1|XUe9oQHGD2HeasUHOdI1xFl0kpFV5KTRjAJkTp71831a2f56'

### Response

    {
        "id": 4,
        "title": "New Task",
        "description": "Task description",
        "completed": 0
    }

## Update Task

### Request

`UPDATE /api/v1/tasks/4`

    curl --request UPDATE \
        --url http://localhost:8000/api/v1/tasks/4 \
        --header 'Authorization: Bearer 1|XUe9oQHGD2HeasUHOdI1xFl0kpFV5KTRjAJkTp71831a2f56' \
        --header 'Content-Type: application/json' \
        --data '{
            "title":"New Task update",
            "description":"Task description update",
            "completed": 1
        }'

### Response

    {
        "id": 4,
        "title": "New Task update",
        "description": "Task description update",
        "completed": 1
    }

## Delete Task

### Request

`DELETE /api/v1/tasks/4`

    curl --request DELETE \
        --url 'http://localhost:8000/api/v1/tasks/4' \
        --header 'Authorization: Bearer 1|XUe9oQHGD2HeasUHOdI1xFl0kpFV5KTRjAJkTp71831a2f56'

### Response

    {
        "message": "Task deleted successfull"
    }
