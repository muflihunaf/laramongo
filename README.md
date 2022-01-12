## Laravel Mongodb



- Dokumentasi API Postman: [inosoft.postman_collection.json]
- File Enviroment Postman: inosoft.postman_enviroment.json

## Cara Install
1. Clone Project Terlebih Dahulu
2. Setelah terclone lakukan perintah composer install di terminal project
3. copy file .env.example dan rename menjadi .env
4. Lalu lakukan perintah php artisan key:generate
5. Lalu lakukan perintah php artisan jwt:secret
6. Sesuaikan Nama database,username & password di file .env
7. php artisan migrate
8. php artisan serve
