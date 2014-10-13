PHP >= 5.4
MCrypt PHP Extension
Modulo gd (imagem)


bootstrap => http://getbootstrap.com/

complemento => http://magazine.softerize.com.br/tutoriais/php/laravel/iniciando-um-novo-projeto-laravel

Eloquente (Active Records do Laravel) =>http://laravel.com/docs/4.2/eloquent
Blade (manipulador de templates -views do Laravel ) =>http://laravel.com/docs/4.2/templates
Blade => http://magazine.softerize.com.br/tutoriais/php/laravel/templates-com-blade-e-bootstrap-laravel


1 - Instalação
2 - Configurando vhosts localmente
3 - Criando Helpers files


[[ INSTALANDO LARAVEL - http://laravel.com/docs/4.2/quick#installation ]]

<strong>1 - Instalação</strong>

- Instalação via composer (http://laravel.com/docs/4.2/installation#install-composer)

Primeira coisa, instalar o composer (http://getcomposer.org/)
<code>$ curl -sS https://getcomposer.org/installer | php</code>

ele vai baixar um arquivo PHPAR ( PHP Archive), renomeio para apenas "composer"

<code>$ sudo mv composer.phar composer</code> (ponha na pasta WWW ou PUBLIC_HTML para executar o comando de fora da pasta do projeto)

Execute em seguida o comando para baixar e instalar o laravel (através do composer)

<code>$ php composer create-project laravel/laravel <primeiro-laravel></code> (e aguarde baixar o framework e suas dependencias )

If you prefer, you can alternatively download a copy of the Laravel repository from GitHub manually. Next run the composer install command in the root of your manually created project directory. This command will download and install the framework's dependencies.

Depois de instalado você deve conferir o arquivo "app/config/app.php" para as configurações e documentações

A pasta "app/storage" precisa ter permissão de escrita (recursiva)

<code>$ sudo chmod 77 -R <pasta storage></code>

Alguns diretorios de frameworks são configuraveis, para mudar a localização dos mesmos, acesse bootstrap/paths.php

O framework utiliza .htaccess, para esconder o "index.php" das URLS, se for usar no apache, conferir se o mod_rewrite está habilitado.
Se o .htaccess nao funcionar no Laravel, tente com esse trecho de código :
<code>
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
</code>

Server com laravel

Se for utilizar um  servidor normal com PHP, basta digitar no terminal o comando 
<code>$ php artisan serve</code>

O artisan é o nome da interface de linha de comandos inclusa no laravel

Estrutura de diretorios

A pasta "app" conterá items como as views, controllers e models. A maior parte do seu codigo ficará nessa área.
Outra área a ser observada é a app/config, lá contem todas as configuracoes disponiveis para voce editar

=> Criando Migrations

Migrations Permite com que voce defina todas as alteracoes no seu banco de dados e possa compartilhar com sua equipe.
Primeiro voce define as configuracoes de acesso ao banco em : app/config/database.php
Vamos agora criar um migration utilizando o Artisan.
<code>$ php artisan migrate:make <create_users_table> </code>( informacao da tabela e tabela para boas praticas)

Agora va ate a pasta  app/database/migrations
La sera criado um arquivo com uma classe com 2 metodos, up() e down().
Em up(), toda a alteracao que voce deseja ser feita em seu banco, ja em down(), tudo o que voce quer que seja revertido, ex : 
<code>
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
</code>

para finalmente rodar o migrate :

<code>$ php artisan migrate</code>

Caso queira voltar atras :

<code>$ php artisan migrate:rollback</code> 

o rollback chama a funcao down() automaticamente


===========================================================================

<strong> 2- CONFIGURACAO NO PROPRIO SERVIDOR SEM A NECESSIDADE DO ARTISAN</strong>

Caso queira configurar no proprio apache instalado, será necessário :

Criar um host
Criar um virtual host

Para criar um host

<code>$ sudo nano /etc/hosts </code>

e adicionar a endereço

Para criar um virtual host , vá para pasta do apache2 e crie um novo arquivo com o nome da url no /sites-available

<code>$ sudo nano <url>.com.br</code>

Lá configure o seguinte código (básico) :

<code>
NameVirtualHost <url>.com.br:80

<VirtualHost <url>.com.br:80>
    ServerName      <url>.com.br
    ServerAdmin webmaster@localhost

    DocumentRoot <caminho-fisico-completo>/public/

    ErrorLog <caminho-fisico-completo>//public/_logs/error.log
    LogLevel warn
    CustomLog <caminho-fisico-completo>/public/_logs/access.log combined
</VirtualHost>
</code>

A pasta Public é a área de acesso publico (obviamente) do laravel, portanto lá é a parte exposta.


<strong>3 - Helper Files fonte </strong> (http://laravel-recipes.com/recipes/50/creating-a-helpers-file)

Crie a pasta helpers ( nao é uma regra, apenas melhores praticas), dentro de APP e crie o arquivo dentro dela.
Depois chame esse arquivo, no console.json e o programe no autoload

<code>
{
    "autoload": {
        "files": [
            "app/helpers.php"
        ]
    }
}
</code>

E em seguida, chame o composer para efetuar essa alteração

<code> $ composer dump-auto </code>

Você pode tambem chamar o arquivo helper direto, sem a necessidade de deixa-lo no autoload, dessa forma :

<code>require app_path().'/helpers/arquivo.php';</code>


