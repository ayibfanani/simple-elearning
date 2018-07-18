# Step to run this web app in local
1). Clone or download this repo to your local machine

2). copy `.env.example` to `.env`

3). run command `composer install` in your Terminal / Bash

4). run command `php artisan key:generate`

5). change permission of `bootstrap/cache` and `storage` directory to `-R 777` if using UNIX

6). run command `php artisan migrate --seed`

7). and you're done.
