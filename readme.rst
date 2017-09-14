
************
Installation
************
1. Buka folder testDOT1
2. edit file .env dan edit bagian dibawah ini sesuai pengaturan yang anda miliki :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testDOT
DB_USERNAME=root
DB_PASSWORD=yud1st1r4

3. Pada direktori ini, buka CMD dan ketikkan "php artisan migrate" untuk migrate database yang ada di folder database/migrations
4. Tetap di dalam direktori testDOT1, buka CMD lalu ketikkan perintah "php artisan serve" 
5. Lalu buka browser anda lalu ketikkan "localhost:8000/blog"

By : Yudistira Sugandi (14/09/2017)
