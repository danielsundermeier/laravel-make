# Laravel Make

Extended Laravel Make Commands.
Creates Tests, Views and a policy with stubs.

![Console output](https://user-images.githubusercontent.com/12516165/97105734-89b67c00-16bd-11eb-9fc8-1146dd7d6ff9.png)

## Installation

You may install the package via Composer:

```
composer require danielsundermeier/laravel-make
```

After that you may copy the stubs.

```php
php artisan make:install
```

## Usage

Use your make commands just like before.

### Make Model

```php
php artisan make:model Model -a
```

This will create additionaly:
- Unit Test
- ControllerTest
- Views
    + index
    + show
    + edit
- Policy

### Parent Option

The `parent` Option will create a nested Controller and a nested Test

```php
php artisan make:model Model -a --parent=Parent
php artisan make:test ModelTest --parent=Parent
```

### Make Views
```php
php artisan make:view model/index
```
