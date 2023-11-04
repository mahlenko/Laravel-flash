# Laravel flash messages

Этот пакет, предлагает простой способ отображения пользовательских сообщений
и ошибок валидации.

Laravel Flash - имеет достаточно простую и гибкую настройку.

### Отличия от альтернативных пакетов

- Namespace сообщений
- Замена и настройка шаблона под себя
- Не зависит от CSS framework.

По-умолчанию используются TailwindCSS, но вы с легкостью можете заменить классы на свои.

## Использование

Добавьте провайдер в `config/app.php`
```php
'providers' => ServiceProvider::defaultProviders()->merge([
    /*
    * Package Service Providers...
    */
    \Makhlenko\LaravelFlash\LaravelFlashServiceProvider::class,
]);
```

✅ Настройка завершена.

### Пример использования

```php
flash()->success('Message successful.');
flash()->error('Message error.');
flash()->warning('Message warning.');
flash()->info('Message info.');
```

## Показ сообщений на странице

Я подготовил несколько компонентов, чтобы показать сообщения:

- `<x-flash::all />` Все сообщения и ошибки валидации
- `<x-flash::messages />` Только сообщения
- `<x-flash::validations/>` Только ошибки валидации

### Namespace

Обычно сообщения показаны в шаблоне в одном месте. 
Но как показать сообщения **отдельно от основных** сообщений?
Используйте `namespace`, чтобы отобразить сообщения в разных местах страницы:

```php
// short and easy
flash("your_namespace")->info('Your second message is in namespace your_namespace.')
// or set via attribute
flash(namespace: "your_namespace")->success('Your message is in a different namespace.')
```

### Как показать сообщения из namespace в шаблоне? Очень просто! 

Укажите нужный namespace в компоненте:

- `<x-flash::all namespace="your_namespace" />`
- `<x-flash::messages namespace="your_namespace" />`

Это же круто, и очень просто! 🎉

You can thank me by transferring TONcoin to my wallet: `UQCr_GPOjU2SZZ2ujrGdTt5x_wCr5E5bIowqpsKIbuJXdlH8`
