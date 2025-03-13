# Configuração do Ambiente Laravel

Este repositório segue um fluxo de trabalho organizado com branches, ferramentas de análise de código e hooks de Git para manter a qualidade do código e o desenvolvimento eficiente.

## 🛠️ Ferramentas Utilizadas

### 🚀 Husky - Git Hooks
O **Husky** foi configurado para garantir que as mensagens de commit sigam um padrão específico. Todos os commits devem começar com **HEY-2**. [Saiba mais](https://typicode.github.io/husky/)

### 🧹 Laravel Pint - Formatação de Código
O **Laravel Pint** é usado para garantir um código limpo e padronizado, checando a indentação do código. [Saiba mais](https://laravel.com/docs/12.x/pint)

#### Rodar Pint para corrigir código:
```sh
./vendor/bin/pint
```

### 🧐 Larastan - Análise Estática de Código
O **Larastan** é uma extensão do PHPStan para Laravel, garantindo que nosso projeto não tenha erros. [Saiba mais](https://github.com/larastan/larastan)

#### Rodar Larastan para verificar erros:
```sh
./vendor/bin/phpstan analyse
```

Agora, o ambiente está pronto para um desenvolvimento mais organizado e com qualidade! 🚀
