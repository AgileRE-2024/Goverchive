1. Git Clone
2. Composer install
3. php artisan migrate
4. php artisan key:generate
5. php artisan serve
6. buat user admin manual
	php artisan make:seeder UserSeeder

	use Illuminate\Support\Facades\DB;

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

	php artisan db:seed --class=UserSeeder

7. login
