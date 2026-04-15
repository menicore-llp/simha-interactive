### To configure the project
> For clone your repository
1. Generate your classic token
2. Run `git clone https://oauth2:[YOUR_TOKEN]@github.com/your-username/your-repo.git` to clone the repository.
3. Once clone the repository, Navigate to repository folder and run the following commands:
```bash
git config user.name "FirstName LastName"
git config user.email "Your menicore email"
```

> Note: Start MySQL server on xampp, and create database `dev_madhu`

1. Run `composer install` to install the dependencies.
2. Run `php artisan migrate` to migrate the database.
3. Run `php artisan db:seed` to seed the database.
4. Run `php artisan storage:link` to create the storage link.
5. Run `php artisan serve` to start the development server.

### To login into the admin panel
1. Run `php artisan serve` to start the development server.
2. Go to `http://localhost:8000/admin/login` to login into the admin panel.
3. Use the following credentials to login into the admin panel:
   - Email: `admin@maadhucreatives.com`
   - Password: `password`