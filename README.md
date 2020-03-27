# FoodApp Engine  [![Software License][ico-license]](LICENSE) [![Build Status][ico-travis]][link-travis] [![PRs Welcome][ico-pr]][link-pr] ![Maintained:yes][ico-maintained]

An backend server for simple food delivery, application based on Flutter.

### ✨Features

-   Laravel 7.0
-   JWT Auth via Laravel Sanctum
-   REST Api 
-   Swagger Open API Docs

## 🚀Getting started

Composer and Yarn/NPM package manager are required

#### Installation

Via Git

-   Fork, then Clone

```bash
git clone https://github.com/alphaolomi/foodapp-server.git

cd foodapp-server

composer install --no-interaction
yarn install
```

-   Edit `.env` and set your database connection details

```bash
cp .env.example .env
```

-   Genrate keys and migrate tables

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```


## Contributing

Pull requests are welcome. Please see [CONTRIBUTING](./.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](./.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email [alphaolomi@gmail.com](mailto:alphaolomigmail.com) instead of using the issue tracker.

## Credits

-   [@gordonnchy](https://github.com/NchyG/) **Gordon Nchy**
-   [@alphaolomi](https://github.com/alphaolomi/) **Alpha Olomi**
-   [All Contributors][link-contributors]

## License

 BSD 3-Clause License. Please see [License File](LICENSE) for more information.

[ico-license]: https://img.shields.io/badge/license-BSD_3_Clause-green.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/com/alphaolomi/food-server?style=flat-square
[link-travis]: https://travis-ci.com/alphaolomi/food-server
[link-repo]: https://github.com/alphaolomi/food-server
[link-contributors]: ../../contributors
[ico-maintained]: https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square
[link-pr]: http://makeapullrequest.com
[ico-pr]: https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square
