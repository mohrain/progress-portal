##  Suchi Darta
Dedicated for managing the suchi registration process.

### Installation
```bash
git clone https:/github.com/jamesbhatta/suchi-darta.git
```

```bash
cd suchi-darta
```

```bash
composer install
```

```bash
cp .env.example .env
```

Now, set the environment variables in ``` .env ``` file .

Generate application keys:
```bash
php artisan key:generate
```

Make sure you have configured database details.

Additionally add the ***google drive credentials*** and ***slack webhook url***.


Now migrate  database using:

```bash
php artisan migrate 
```

Seed the database with some defaults values:
```bash
php artisan db:seed
```

Create symbolic link for storage
```bash
php artisan storage:link
```

Optionally you can migrate and seed in single command: ```php artisan migrate --seed``` . This command will first migrate the database and then run the `DatabaseSeeder>` class , which will be used to call other seed classes. 

If you are using google drive backup option, you only need to add the following Cron entry to your server:
```php
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
This Cron will call the Laravel command scheduler every minute. When the `schedule:run` command is executed, Laravel will evaluate your scheduled tasks and run the tasks that are due.


### Implementing hash id to a model

- Create a new connection in `config/hashids.php`
- Add the `Hashidable` trait to your model
- Create a new binding in the boot method for the model in ``app/Providers/RouteServiceProvider.php``

** Details: https://sampo.co.uk/blog/masking-ids-in-urls-using-hash-ids-in-laravel
