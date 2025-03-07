# Веб-приложение для управления товарами и заказами  

## Описание проекта  

Данное веб-приложение создано с использованием фреймворка Laravel и предоставляет функционал для управления товарами и заказами в интернет-магазине.  

## Функциональные возможности  

### 1. Управление товарами  

- Добавление, редактирование, удаление и просмотр товаров.  
- Просмотр списка товаров с сокращенной информацией (название, цена, категория).  
- Просмотр полной информации о товаре.  

### 2. Управление заказами  

- Создание заказа с возможностью добавления одного наименования товара в количестве 1 штуки или более.  
- Заказ включает:  
  - ФИО покупателя (обязательное поле)  
  - Дата создания (обязательное поле)  
  - Статус заказа (новый или выполнен; по умолчанию новый)  
  - Комментарий покупателя.  
- Просмотр списка заказов с отображением:  
  - Номера заказа (ID)  
  - Даты создания  
  - ФИО покупателя  
  - Статуса заказа  
  - Итоговой цены.  
- Просмотр заказа с полной информацией и возможность изменения статуса на "выполнен".  

### 3. Категории для товаров  

- Создание миграции для таблицы `categories`, содержащей:  
  - ID (первичный ключ)  
  - Название (строка)  
  
Заполнение таблицы следующими данными: легкий, хрупкий, тяжелый.  

### 4. Связи между таблицами  

- Товары привязаны к категориям (один ко многим).  
- В заказе может быть только один товар (одно наименование) (один ко многим).  

### 5. Требования к товарам  

Каждый товар должен иметь:  
- Название (обязательное поле)  
- Категория (обязан привязываться к одной категории)  
- Описание  
- Цена (в рублях, с учетом копеек; обязательное поле)  

## Административный интерфейс  

- Управление товарами доступно по адресу: `/admin/products`  
- Управление заказами доступно по адресу: `/admin/orders`  
- Возможность заказа доступна по корневому адресу: `/`  

## Технологии  

- PHP  
- Laravel (https://laravel.com/docs/9.x)  
- Git для контроля версий  

## Установка  

1. Клонируйте репозиторий:  
   ```bash
   git clone <ссылка на репозиторий>  
   cd <папка проекта>
   ```

2. Установите зависимости:
```bash
composer install
```
Создайте файл .env на основе .env.example и настройте параметры подключения к базе данных.

3. Выполните миграции:
```bash
php artisan migrate
```

4. Запустите сервер:
```bash
php artisan serve
```