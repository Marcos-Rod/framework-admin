
## Installation

Run

```sh
git clone https://github.com/phpdevsolutions/framework-eloquent.git
```

Install dependencies

```sh
composer install
```

Create a database with file framework_eloquent.sql. By default, a user will be created with the credentials: admin@mail.mx and password 12345678.

You can directly modify the password in the database in the configurations table.

Generate an encrypted password using the following code.

```php
<?php
use App\Functions;
echo Functions::generatePassword('your_password');

```

Configure your connection keys in file config.php (the variable global FOLDER_ADMIN references to url folder admin or whatever name you choose for your managed folder)

This admin was designed following the MVC control structure.


## How to use

Like laravel. Create a controller in app folder and extends Controller class

```php
<?php
namespace App\Controllers;

class HomeController extends Controller
{
  public function index($slug = "home"){
    //Here goes the application logic
    return 'Hi, from ' . $slug . ' page';
  }
}
```

Now register you route in routes\web.php, like laravel...

The routes registered runs in dispatch() static method.

```php
<?php

use App\Controllers\HomeController;
use App\Route;

Route::get('/:slug', [HomeController::class, 'index']); //use :variable to indicate the use of get variables

Route::dispatch();
```

The controllers can return a view. The views files save in resources/views

```php
<?php
namespace App\Controllers;

class HomeController extends Controller
{
  public function index($slug = "home")
    {
    //Here goes the application logic
    return $this->view('home');
  
    //If you need to access a view inside a folder use . to access them
    // return $this->view(posts.index)
  }
}
```

If your aplication or site web use templates can call to template view and use $this->metas variable

```php
<?php
namespace App\Controllers;

class HomeController extends Controller
{
  public function index($slug = "home")
  {
    $this->metas['title'] = 'Site web title';
    $this->metas['file'] = 'contact'; //file to include in the template located in the views folder
    $this->metas['slug'] = $slug;
    $this->metas['canonical_url'] = $slug;
  
    return $this->view('assets.template');
  }

}
```

## Models

You can create models to do query from database. The models create in app\Models folder.
Use Eloquent model to easy queries.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model

{
  protected $fillable = ['name', 'email', 'password'];
}
```

Include model in controller to fetch the records

```php
<?php
namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
  public function index($slug = "home")
  {
    $user = User::where('email', 'admin@mail.mx')->first();

    return $user;

    // Or return the data to a view with compact()
    // return $this->view('assets.template', compact('user'));
  }

}
```
