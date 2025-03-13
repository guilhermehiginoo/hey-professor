[![CI Main](https://github.com/guilhermehiginoo/hey-professor/actions/workflows/laravel.yml/badge.svg?branch=develop)](https://github.com/guilhermehiginoo/hey-professor/actions/workflows/laravel.yml)
[![CI Develop](https://github.com/guilhermehiginoo/hey-professor/actions/workflows/laravel.yml/badge.svg?branch=develop)](https://github.com/guilhermehiginoo/hey-professor/actions/workflows/laravel.yml)

## About Hey Professor
>>>>>>> develop

<<<<<<< feature/HEY-2-setup-de-desenvolvimento
# Laravel Environment Setup

This repository follows an organized workflow with branches, code analysis tools, and Git hooks to maintain code quality and efficient development.

## 🛠️ Tools Used

### 🚀 Husky - Git Hooks
**Husky** has been set up to ensure commit messages follow a specific format. All commits must begin with **HEY-2**. [Learn more](https://typicode.github.io/husky/)

### 🧹 Laravel Pint - Code Formatting
**Laravel Pint** is used to ensure clean and standardized code by checking the code's indentation. [Learn more](https://laravel.com/docs/12.x/pint)

#### Run Pint to fix code:
```sh
./vendor/bin/pint

#### Rodar Pint para corrigir código:
```sh
./vendor/bin/pint
```

### 🧐 Larastan - Static Code Analysis
**Larastan** is an extension of PHPStan for Laravel, ensuring that our project has no errors. [Learn More](https://github.com/larastan/larastan)

#### Run **Larastan** to check for errors:
```sh
./vendor/bin/phpstan analyse
```
