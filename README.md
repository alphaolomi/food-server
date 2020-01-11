# FoodApp Engine [![Software License][ico-license]](LICENSE) [![Build Status][ico-travis]][link-travis] [![PRs Welcome][ico-pr]][link-pr] ![Maintained:yes][ico-maintained]

An backend server for simple food delivery, application based on Flutter.

### ✨Features

-   Laravel 6.0
-   Json web token Auth
-   REST Api

## 🚀Getting started

Composer and Yarn/NPM are required

#### Installation

Via Git

-   Fork, Clone fork

```bash
git clone https://github.com/alphaolomi/foodapp-backend.git

cd foodapp-backend

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
```

## Development

#### API Response Schema

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "image": "fd80ecec48eba2a9adb76e4133905879.png",
            "title": "Chicken Soup",
            "subTitle": "A very cool suop in town",
            "thumbnail": "a.jpg",
            "price": 2500,
            "comments": 2,
            "rating": 4,
            "description": "A very long bio",
            "showHome": true,
            "created_at": "2019-08-10 10:45:15",
            "updated_at": "2019-08-10 10:45:15",
            "deleted_at": null
        }
    ],
    "message": "Foods retrieved successfully"
}
```

## Contributing

Pull requests are welcome. Please see [CONTRIBUTING](./.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](./.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email [hello@alphaolomi.com](mailto:hello@alphaolomi.com) instead of using the issue tracker.

## Credits

-   [@gordonnchy](https://github.com/gordonnchy/) **Gordon Nchy**
-   [@alphaolomi](https://github.com/alphaolomi/) **Alpha Olomi**
-   [All Contributors][link-contributors]

## License

The Apache 2 License. Please see [License File](LICENSE) for more information.

[ico-license]: https://img.shields.io/badge/license-BSD_2_Clause-green.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/com/alphaolomi/food-server?style=flat-square
[link-travis]: https://travis-ci.com/alphaolomi/food-server
[link-repo]: https://github.com/gordonnchy/dotify-server
[link-contributors]: ../../contributors
[ico-maintained]: https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square
[link-pr]: http://makeapullrequest.com
[ico-pr]: https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square
