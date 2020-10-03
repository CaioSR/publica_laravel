# Disponível em crshimada.com/publica_laravel/public
### Alternativamente você pode baixar esse projeto.

### Esse é uma versão do projeto no padrão MVC com Laravel

### Para instalar as dependências você vai precisar do NPM e do Composer.
### Caso não tenha eles instalados, baixe por aqui: 
- NPM : https://nodejs.org/en/download/
- Composer : https://getcomposer.org/download/

### Com eles instalados, rodar os comandos no terminal no diretório do projeto:

- Instalar dependências :
    - npm install
    - composer install.

### Outras configurações

- Configurar arquivo env. Copie o env.example para en
- Define as variáveis do banco de dados
- Para criar as tables do banco, no terminal rode:
    - php artisan migrate

### Para testes

- Troque para o env de testes com:
    - php artisan config:cache --env=testing
- Execute vendor/bin/phpunit --filter {{nome do arquivo de teste}}
