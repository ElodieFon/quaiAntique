# Le Quai Antique

## Ceci est une application Symfony destinée à une évaluation de compétance. Elle est basée sur le framework Symfony 6 et une version PHP 8.1

## Installer l'application ':'

### 1. Cloner le dépot git avec la comande ':'

` git clone https://github.com/ElodieFon/quaiAntique.git `

### 2. Installer les dépandances PHP avec la comande ':'

`composer install`

### 3. Configurer la base de donnée avec les comande ':'

`php bin/console doctrine:database:create`

`php bin/console doctrine:migrations:migrate`

### 4. Lancer le serveur avec la comande ':'

`symfony server:start` ou

`symfony server:start -d` si vous voulais reprendre directementy la main sur le terminal sans avoir a en changer.

### 5. Accédez à l'application en utilisant l'URL suivante ':'

`http://localhost:8000`
