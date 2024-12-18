## Tutorial Instalasi

1. Buat sebuah folder baru kemudian buka folder tersebut di terminal
2. lakukan Git Clone kemudian buka file yang di clone pada vscode
3. Pada vscode buat new terminal dan lakukan Composer install
4. Cari file .env.example kemudian copy dan paste file tersebut, rename file hasil copy menjadi .env
5. Pastikan anda telah membuat database baru pada phpmyadmin (misal: goverchive)
6. Ubah DB_DATABASE menjadi nama database yang baru anda buat (misal: goverchive)
   ```
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=gover
    DB_USERNAME=root
    DB_PASSWORD=   
   ```
8. Kemudian kembali pada terminal
   ```
   php artisan migrate
   ```
10. lakukan generate key juga
    ```php artisan key:generate```
12. buat user admin manual pada terminal
	php artisan make:seeder UserSeeder
    kemudian pada file Goverchive\database\seeders\UserSeeder.php masukan syntax berikut
    ```php
    <?php
    
    namespace Database\Seeders;
    
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    
    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            DB::table('users')->insert([
                [
                    'name' => 'admin',
                    'posisi' => 'manajer',
                    'divisi' => 'manajer',
                    'unit-kerja' => 'manajer',
                    'email' => 'admin@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password123'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]]);
        }
    }
    ```
    kemudian pada terminal php artisan db:seed --class=UserSeeder
14. php artisan serve
15. login dengan email admin@gmail.com dan password123
