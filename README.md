# Hommy® app

O aplicativo mobile Hommy® tem como principal objetivo divulgar anuncios de repúblicas para estudantes. A aplicacao comtempla usuários locadores e locatários.

Front-end desenvolvido com a Framework Ionic 6.9.2 e back-end desenvolvido com a Framework Laravel 7.22.4

Para rodar esse projeto na sua máquina local, faca no seu terminal ou no git bash:

> git clone https://github.com/naccaratocarolina/hommy.git

## Back-end

Isto feito, para servir o Back-end, primeiro voce deve criar uma database local. Voce pode fazer isso atraves do phpmyadmin ou do proprio bash do MySQL.

Para criar uma database chamada hommy com o MySQL:
> mysql -u root -p

> CREATE database hommy;

Em seguida, voce deve configurar as credenciais do BD no arquivo /back-end/.env do Laravel preenchendo tais campos:
> DB_DATABASE=hommy

> DB_USERNAME=root

> DB_PASSWORD=*senha do root*

E, por fim, para servir o projeto, certifique-se que o XAMPP/WAMP/LAMP/MAMP esteja ligado e digite tais comandos:

> cd hommy/back-end/

> composer install

> php artisan key:generate

> php artisan migrate

> php artisan serve
 
 ## Front-end
 
 Para servir o Front-end basta digitar tais comandos:
 
 > cd hommy/front-end/
 
 > npm install
 
 >ionic serve
