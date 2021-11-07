
Project Title
Ads Management

1- clone by run this command line git clone https://github.com/ahmedrefaat93/reach_ads.git

2- run this query "create database ads"

3- open .env file then change database to be "ads"

4- run this command line "php artisan migrate"

5- run this command line "php artisan db:seed"

6- import Reach-Ads.postman_collection.json

7- change base_url to your then try apis

8- please for run sechule task email please change email confirguration in env file

9- if you wan't to wait to 8pm please uncomment
$schedule->command('remainder:email')->everyMinute();
and comment
$schedule->command('remainder:email')->dailyAt('20:00');
in app/Console/Kernel.php also you can run this command php artisan schedule:run to run in moment

