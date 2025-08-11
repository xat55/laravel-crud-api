А. Порядок разворачивания проекта.
1. make up
2. В контейнере php запустить команду:
   - composer install,
   - php artisan migrate --seed
3. Либо из корня проекта выполнить:
    - docker exec laravel-crud-api_app_1 composer install,
    - docker exec laravel-crud-api_app_1 php artisan migrate --seed,

Б. ТЕСТЫ

Запуск тестов:
В контейнере php запустить команду: php artisan test
или
из корня проекта выполнить: docker exec laravel-crud-api_app_1 php artisan test

В. ДОКУМЕНТАЦИЯ

Генерация документации API (Swagger):
В контейнере php запустить команду: php artisan l5-swagger:generate
или
из корня проекта выполнить: docker exec laravel-crud-api_app_1 php artisan l5-swagger:generate

Просмотр документации по ссылке (контейнеры должны быть запущены):
http://localhost:8080/api/documentation


ТЕСТОВОЕ ЗАДАНИЕ

Цель:
Разработать CRUD API для управления пользователями, постами и комментариями, используя Laravel.

Требования к стеку:
Язык программирования: PHP
Фреймворк: Laravel
База данных: MySQL
Будет плюсом:
Контейнеризация: Docker
Веб-сервер: Nginx

Описание:
Создайте три модели: User, Post, Comment и миграции для них. Приблизительная структура полей:
Модель: User
- id
- name

Модель: Post
- id
- user_id
- body

Table Name: Comment
- id
- post_id
- user_id
- body

Обеспечьте поддержку всех основных CRUD операций с валидацией данных для вышеуказанных моделей, а также запросы для получения:
Всех постов пользователя по его id
Всех комментариев пользователя по его id
Всех комментариев поста по его id
Используйте Laravel Resource для формирования ответов.
Покажите работу API запросов (Postman, swagger, etc).

Дополнительно (будет плюсом):
Использование FormRequest для валидации входных данных при создании и обновлении записей.
Написание тестов для контроллеров и FormRequest классов.
Документация API (например, с использованием Swagger).

