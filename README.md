# TOXILAB-BI

TOXILAB-BI is an application to support decision making in clinical laboratories. It includes an integrated chat to generate informative reports by querying the database, user and test management, result tracking, and utilities for exporting reports.

<img src="mockup-toxilab-bi.png" alt="TOXILAB-BI Mockup" width="600"> 

## Features
- Integrated chat to generate data-driven reports
- User and role management
- Test and result management with PDF export
- Scheduler tasks for daily resets and maintenance
- Seeders for initial demo data

## Requirements
- PHP 8.0+ (or the project's required PHP version)
- Composer
- MySQL / MariaDB (or another database supported by Laravel)
- PHP extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, GD or Imagick (if images are used)
- Node.js & npm or yarn (only if frontend assets need building)

## Installation

1. Clone the repository

```sh
git clone git@github.com:alfargenis/toxilab-bi.git
cd toxilab-bi
```

2. Copy the environment example

```sh
cp .env.example .env
```

3. Configure .env

Update the .env file with your environment values (database, mail, keys, etc).
Example minimal variables:

```
APP_NAME=TOXILAB-BI
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toxilab
DB_USERNAME=root
DB_PASSWORD=secret
GEMINIS_API_KEY=YOUR_API_KEY
```

4. Install PHP dependencies

```sh
composer install
```

5. (Optional) Install frontend dependencies and build assets

```sh
npm install
npm run dev
# or
# yarn
# yarn dev
```

6. Generate application key

```sh
php artisan key:generate
```

7. Create storage symlink

```sh
php artisan storage:link
```

8. Run migrations

```sh
php artisan migrate
```

9. Run database seeders

```sh
php artisan db:seed
```

## Scheduler / Cron
To run scheduled tasks, add this cron entry (recommended):

```cron
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```

Note: Using `php artisan schedule:work` in cron is not recommended for most deployments.

## Run locally

```sh
php artisan serve
```

Visit: http://127.0.0.1:8000

## Default demo credentials
- Username: admin
- Password: @Admin123

Change these credentials in production.

## Security & Best Practices
- Do not commit real secrets or a filled .env to the repository.
- Use HTTPS in production and update default credentials.
- Ensure correct permissions for storage and bootstrap/cache directories.

## Contributing
1. Create a branch from main: `git checkout -b fix/readme`
2. Make your changes and open a Pull Request describing the purpose.

## License
Add your project license here (e.g., MIT). If you want, I can add a specific license file.

## Contact
Open an issue in the repository for questions or contact the repository owner.
