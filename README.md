Cara Instalasi
1. clone terlebih dahulu dengan perintah git clone https://github.com/agungkusaeri9/template-laravel9-stisla.git
2. setelah berhasil masuk ke directorinya lalu ketika cd template-laravel9-stisla
3. ketikan di terminal composer install
4. copy file .env.example dan rename jadi .env
5. buat terlebih dahulu databasenya di localhost/phpmyadmin dengan nama latihanlaravel
6. buka file .env dan sesuaikan koneksi databasenya
    APP_URL=http://localhost:8000
    DB_DATABASE=latihanlaravel
    DB_USERNAME=root
    DB_PASSWORD=
    
7. ketikan di terminal php artisan key:generate
8. ketika di terminal php artisan migrate --seed
9. ketikan di terminal npm install
10. ketikan di terminal npm run dev
11. jalankan di browser localhost:8000 atau 127.0.0.1:8000
