    bootstrap/    Бутстрам
    db/           Підключення до бз
    function/     Функції
    style/        Папкі зі стилями
    templates/    Папки з темплейтами
    .htaccess     Настройка апаче
    README.md     Цей файл  
    index.php     Індексний файл
    medvedev.sql  Експортована база даних
У файлі за адресою `db/connect.php` замінити значення констант:	<br>
***
	define('hostname', '127.0.0.1');    Адрес хостінга
	define('login', 'root');            Логін
	define('password', '1111');         Пароль
Для підключення бази даних імпортуйте файл `medvedev.sql` на ваший хостинг, або у `phpmyadmin`.
Логін і пароль адміністратора:<br>
***
      login: admin
      password: 123321123
