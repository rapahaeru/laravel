PHP >= 5.4
MCrypt PHP Extension
Modulo gd (imagem)


bootstrap => http://getbootstrap.com/

complemento => http://magazine.softerize.com.br/tutoriais/php/laravel/iniciando-um-novo-projeto-laravel

Eloquente (Active Records do Laravel) =>http://laravel.com/docs/4.2/eloquent
Blade (manipulador de templates -views do Laravel ) =>http://laravel.com/docs/4.2/templates
Blade => http://magazine.softerize.com.br/tutoriais/php/laravel/templates-com-blade-e-bootstrap-laravel


[[ INSTALANDO LARAVEL - http://laravel.com/docs/4.2/quick#installation ]]

- Instalação via composer (http://laravel.com/docs/4.2/installation#install-composer)

Primeira coisa, instalar o composer (http://getcomposer.org/)
$ curl -sS https://getcomposer.org/installer | php

ele vai baixar um arquivo PHPAR ( PHP Archive), renomeio para apenas "composer"

$ sudo mv composer.phar composer (ponha na pasta WWW ou PUBLIC_HTML para executar o comando de fora da pasta do projeto)

Execute em seguida o comando para baixar e instalar o laravel (através do composer)

$ php composer create-project laravel/laravel <primeiro-laravel> (e aguarde baixar o framework e suas dependencias )

If you prefer, you can alternatively download a copy of the Laravel repository from GitHub manually. Next run the composer install command in the root of your manually created project directory. This command will download and install the framework's dependencies.

Depois de instalado você deve conferir o arquivo "app/config/app.php" para as configurações e documentações

A pasta "app/storage" precisa ter permissão de escrita

Alguns diretorios de frameworks são configuraveis, para mudar a localização dos mesmos, acesse bootstrap/paths.php

O framework utiliza .htaccess, para esconder o "index.php" das URLS, se for usar no apache, conferir se o mod_rewrite está habilitado.
Se o .htaccess nao funcionar no Laravel, tente com esse trecho de código :

Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]


Server com laravel

Se for utilizar um  servidor normal com PHP, basta digitar no terminal o comando 
$ php artisan serve

O artisan é o nome da interface de linha de comandos inclusa no laravel

Estrutura de diretorios

A pasta "app" conterá items como as views, controllers e models. A maior parte do seu codigo ficará nessa área.
Outra área a ser observada é a app/config, lá contem todas as configuracoes disponiveis para voce editar

=> Criando Migrations

Migrations Permite com que voce defina todas as alteracoes no seu banco de dados e possa compartilhar com sua equipe.
Primeiro voce define as configuracoes de acesso ao banco em : app/config/database.php
Vamos agora criar um migration utilizando o Artisan.
$ php artisan migrate:make <create_users_table> ( informacao da tabela e tabela para boas praticas)

Agora va ate a pasta  app/database/migrations
La sera criado um arquivo com uma classe com 2 metodos, up() e down().
Em up(), toda a alteracao que voce deseja ser feita em seu banco, ja em down(), tudo o que voce quer que seja revertido, ex : 

public function up()
{
    Schema::create('users', function($table)
    {
        $table->increments('id');
        $table->string('email')->unique();
        $table->string('name');
        $table->timestamps();
    });
}

public function down()
{
    Schema::drop('users');
}


para finalmente rodar o migrate :

$ php artisan migrate

Caso queira voltar atras :

$ php artisan migrate:rollback

o rollback chama a funcao down() automaticamente
