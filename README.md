ixudra/toggl
================

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ixudra/toggl.svg?style=flat-square)](https://packagist.org/packages/ixudra/toggl)
[![license](https://img.shields.io/github/license/ixudra/toggl.svg)]()
[![Total Downloads](https://img.shields.io/packagist/dt/ixudra/toggl.svg?style=flat-square)](https://packagist.org/packages/ixudra/toggl)

Custom PHP library to connect with the Toggl API - developed by [Ixudra](https://ixudra.be).

This package can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.



## Installation

Pull this package in through Composer.

```js

    {
        'require': {
            'ixudra/toggl': '0.*'
        }
    }

```



### Laravel Integration

Add the service provider to your `config/app.php` file

```php

    'providers'         => array(

        //...
        Ixudra\Toggl\TogglServiceProvider::class,

    ),

```

Add the facade to your `config/app.php` file:

```php

    'aliases'           => array(

        //...
        'Toggl'         => Ixudra\Toggl\Facades\Toggl::class,

    ),

```

Add workspace ID and your personal API token to your `.env` file:

```

TOGGL_WORKSPACE=123
TOGGL_TOKEN=your_toggl_api_token

```

Add the following lines of code to your `config/services.php` file:

```php

    'toggl' => [
        'workspace'     => env('TOGGL_WORKSPACE'),
        'token'         => env('TOGGL_TOKEN'),
    ],

```

 > Currently, the package only supports one workspace, which will be sufficient for most users. You can override this behaviour by using the `Config::set('services.toggl.workspace', 456)` method. Support for multiple workspaces will be added in the near future.


### Lumen 5.* integration

In your `bootstrap/app.php`, make sure you've un-commented the following line (around line 26):

```
$app->withFacades();
```

Then, register your class alias:
```
class_alias('Ixudra\Toggl\Facades\Toggl', 'Toggl');
```

Finally, you have to register your ServiceProvider (around line 70-80):

```
/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register('App\Providers\AppServiceProvider');

// Package service providers
$app->register(Ixudra\Toggl\TogglServiceProvider::class);
```


### Integration without Laravel

Create a new instance of the `TogglService` where you would like to use the package:

```php

    $workspaceId = 123;
    $apiToken = 'your_toggl_api_token';
    $togglService = new \Ixudra\Toggl\TogglService( $workspaceId, $apiToken );

```



## Usage

The package provides an easy interface for sending requests to the Toggl API. For the full information regarding the API,
all available methods and all possible parameters, I would refer you to the official Toggl API documentation on 
[Github](https://github.com/toggl/toggl_api_docs). The package provides a (nearly) exact match of (almost) all of functions 
that are described in the API documentation. The exact function definitions can be found in the `src/Traits` directory.

For your convenience, the package will automatically add several required parameters so you don't have to worry about 
doing so. These parameters include the workspace ID and the API token. These parameters should not be included in any
of the requests. Additionally, the package also provides several utility methods for the 


### Laravel usage

```php

    // Return an overview of what users in the workspace are doing and have been doing
    $response = Toggl::dashboard();

    // Create a client
    $response = Toggl::createClient( array( 'name' => 'Test company' ) ) );

    // Get a summary information of this month for all user 
    $response = Toggl::summaryThisMonth();

    // Get a summary information of last month for one specific user 
    $response = Toggl::summaryLastMonth( array( 'user_ids' => '123' ) ) );

```


### Non-laravel usage

```php

    $workspaceId = 123;
    $apiToken = 'your_toggl_api_token';
    $togglService = new \Ixudra\Toggl\TogglService( $workspaceId, $apiToken );

    // Return an overview of what users in the workspace are doing and have been doing
    $response = $togglService->dashboard();

    // Create a client
    $response = $togglService->createClient( array( 'name' => 'Test company' ) );

    // Get a summary information of this month for all user 
    $response = $togglService->summaryThisMonth();

    // Get a summary information of last month for one specific user 
    $response = $togglService->summaryLastMonth( array( 'user_ids' => '123' ) );

```




## Planning

- Add missing API methods
- Improve usability of existing API methods
- Add additional convenience method
- Update and improve documentation
- Support for multiple workspaces




## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57
