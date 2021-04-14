<p align="center"><img src="public/img/cover.png"></p>
<br>
<h1 align="center">Food App Backend👋</h1>
<br>

[![Build Status][ico-travis]]([link-travis])
[![Documentation](https://img.shields.io/badge/documentation-yes-brightgreen.svg)](https://food-engine.herokuapp.com/api/documentation)
[![License: BSD 3--Clause](https://img.shields.io/badge/License-BSD_3--Clause-yellow.svg)](#)
[![Twitter: alphaolomi](https://img.shields.io/twitter/follow/alphaolomi.svg?style=social)](https://twitter.com/alphaolomi)
![Maintained:yes][ico-maintained]
[![PRs Welcome][ico-pr]][link-pr]
[![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https%3A%2F%2Fgithub.com%2Falphaolomi%2Ffoodapp-backend&count_bg=%2379C83D&title_bg=%23555555&icon=codeigniter.svg&icon_color=%23E7E7E7&title=hits&edge_flat=true)](https://hits.seeyoufarm.com)

<br>
An elegant backend server for simple food delivery application built with Laravel.

<br>


### 🏠 Homepage [food-engine.herokuapp.com](https://food-engine.herokuapp.com/)

### 📄 [Documentation](./docs/README.md)


<br>

## Technologies and Features Used

-   Laravel 8.0
-   JWT Auth via [Laravel Sanctum](https://laravel.com/docs/master/sanctum)
-   REST API
-   [API Docs with OpenAPI](https://food-engine.herokuapp.com/api/documentation)

<br>

##  Modules involved

- Landing Website
- Front Menu + Ordering Website
- Web Dashboard
- REST API 
- OpenAPI Docs 

<br>

## 🚀 Development

Composer and Yarn/NPM package manager are required

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


<br>

## Run tests

```sh
composer test
```


<br>

## ✍ Author

-   👤 **Alpha Olomi** -   Twitter: [@alphaolomi](https://twitter.com/alphaolomi) -   Github: [@alphaolomi](https://github.com/alphaolomi)


<br />

## 🤝 Contributing

Pull requests are most welcome, Contributions, issues and feature requests are welcome too!

Feel free to check [issues page](https://github.com/alphaolomi/food-app/issues). You can also take a look at the [contributing guide](https://github.com/alphaolomi/food-app/issues).


<br />

## 🔒 Security

If you discover any security related issues, please email [alphaolomi@gmail.com](mailto:alphaolomi@gmail.com) instead of using the issue tracker.

<br />


## 📄 License

BSD 3-Clause License. Please see [License File](LICENSE.md) for more information.

<br />

## Show your support

Give a ⭐️ if this project helped you! <img alt="GitHub stars" src="https://img.shields.io/github/stars/alphaolomi/food-server?logo=github&logoColor=github&style=for-the-badge">

<a href="https://www.linkedin.com/in/alphaolomi/">
    <img src="https://img.shields.io/badge/Support-Recommed%2FEndorse%20me%20on%20Linkedin-yellow?style=for-the-badge&logo=linkedin" alt="Recommend me on LinkedIn" /></a>

---

<br />

_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_

[ico-license]: https://img.shields.io/badge/license-BSD_3_Clause-green.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/com/alphaolomi/food-server?style=flat-square
[link-travis]: https://travis-ci.com/alphaolomi/food-server
[link-repo]: https://github.com/alphaolomi/food-server
[link-contributors]: ../../contributors
[ico-maintained]: https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square
[link-pr]: http://makeapullrequest.com
[ico-pr]: https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square
