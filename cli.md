
Symfony
=======

### Aggiornare il db:
    php app/console doctrine:schema:update --force
    php app/console doctrine:schema:update --dump-sql

### Generare le fixtures (senza piallare il db)
    php app/console doctrine:fixtures:load --append

### Aggiornare le entita:
    php app/console doctrine:generate:entities Unifacile --no-backup

### Svuotare la cache in PROD
    php app/console cache:clear --env=prod --no-debug

### Svuotare la cache in DEV
    php app/console cache:clear --env=dev --no-debug

### Aggiornare la cache di Assetic
    php app/console assetic:dump --env=prod --no-debug

### Scaldare la cache di Symfony
    php app/console cache:warmup

### Eliminare gli access token scaduti
    php app/console fos:oauth-server:clean
    
### Compilazione SCSS senza watcher
Mettersi col terminale nella cartella dove si trova il file config.rb e lanciare ad esempio:
    
    compass compile src/Unifacile/PublicBundle/Resources/scss/_index.scss
    
Npm
===

### Scaricare le dipendenze 
    npm install
     

Git
===

### Quando dopo una commit si impanica la shell e ti chiede di scrivere un commento dal quale non si riesce ad usire digitare:
    :q!


### JS Routing Doc:
    https://github.com/FriendsOfSymfony/FOSJsRoutingBundle/blob/master/Resources/doc/index.md

### Generare la mappatura rotte per JS in un file:
    php app/console fos:js-routing:dump

### Generare link simbolici assets:
    php app/console assets:install --symlink web

### Lista dei tag presenti
    git tag

### Creare un tag
    git tag -a v1.4 -m 'my version 1.4'

### I tag non vengono pushati, quindi si puo' pushare il singolo tag oppure tutti insieme con
    git push origin [tagname] --> esempio: git push origin v1.5
    git push origin --tags

### Cancellare la cache di git:
    git rm -r --cached .
    git add .

### Resettare il branch allo stato in cui e' il repository online:
    git fetch origin master
    git reset --hard FETCH_HEAD
    git clean -df



Compass
=======

Installazione:

    gem install compass
    gem install compass-rgbapng
    
PHP
===

Aumentare la memoria dedicata all'esecuzione di php (max_allowed_memory_size):

    php -d memory_limit=1GB


PHPDoc
======
Generare la documentazione:

	php bin/phpdoc.php -d src -t docs



Script
======

Per eseguire un pull è sufficiente eseguire

	./pulla

Per eseguire una push è sufficiente eseguire, allegando una stringa di
messaggio

    ./push "messaggio per la commit"

Per cambiare il proxy c'è lo script "switch-proxy". Permette di
accendere/spegnere il proxy dell'università

	./switch-proxy

Errori
======

### Errori 403 senza un cazzo di senso
Soluzione: settare i permessi su /var/www (o l'equivalente allocazione
dei virtual host nella vostra configurazione)

    chown ilario:apache -R /var/www
    chmod 0755 -R /var/www/
    chmod g+s -R /var/www/

Dove 'ilario' e' il vostro nome utente e 'apache' e' il gruppo del
webserver (in alcuno sistemi chiamato anche www-data)


### [PDOException]  SQLSTATE[HY000] [2002] No such file or directory
Soluzione: http://stackoverflow.com/questions/6259424/troubleshooting-no-such-file-or-directory-when-running-php-app-console-doctri


### [RuntimeException]  An error occurred when executing the "'cache:clear --no-warmup'" command.
Soluzione:      1. php composer.phar update
                2. php app/console cache:clear
                2a. se il (2) restituisce un errore con FOSUserBundle, andare in vendor/ ed eliminare la cartella friendsofsimfony,cl dopodichè rilanciare il comando (2)
