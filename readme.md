Запуск:

1. Скачать. 
2. В скачаной папке открыть терминал. Ввести команду: docker-compose build && docker-compose up -d
3. Вводим: composer install
4. Вводим: composer dump-autoload
5. Вводим: docker-compose exec php ./artisan migrate
6. Вводим: docker-compose exec php ./artisan db:seed
7. Вводим в браузере: localhost:8088
8. phpMyAdmin: localhost:8008 (log: homestead, pas: secret)
