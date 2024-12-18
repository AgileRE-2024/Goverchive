## Tutorial Instalasi

1. Buat sebuah folder baru kemudian buka folder tersebut di terminal
2. lakukan Git Clone kemudian buka file yang di clone pada vscode
3. Seluruh step selanjutnya akan dilakukan pada terminal vscode
4. Pada vscode buat new terminal dan lakukan Composer install
5. php artisan migrate
6. php artisan key:generate
7. buat user admin manual
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
8. php artisan serve
9. login dengan email admin@gmail.com dan password123
