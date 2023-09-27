<h1>Laravel and firebase </h1>
<p>
Step 1: 
create a laravel project
-> laravel new project_name

step 2:
install a package 
-> composer require kreait/firebase-php
-> php artisan vendor:publish --provider="Kreait\Laravel\Firebase\ServiceProvider" --tag=config
->keep this in config/app.php->providers = 
    provider="Kreait\Laravel\Firebase\ServiceProvider::class,


step 3: 
download  new generated key from thr firebase in js file type. 
from the firebase= projectname -> project settings and click generate new private key, 
a file will be downloaded. 

step 4: 
place the downloaded file in the root directory where composer.json exists
step 5:
some changes in the .env
FIREBASE_CREDENTIALS="firebase_creadientals.json" this is the download file 
FIREBASE_DATABASE_URL="table name from the firebase realtime database"




</p>
<p> after this go through the operations as per in the repo->
namespace App\Http\Controllers\firebase;
</p> 