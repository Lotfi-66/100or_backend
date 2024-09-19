# Recipe Docker PHP Symfony
## 🔩 Configuration du fichier .htaccess

Une fois votre projet monté, le point d'entrée de l'application sera dans /public/index.php :
Récupérer le .htaccess à la racine et placé le dans le dossier public.

## 🚀 Démarrage de Docker

Pour démarrer les conteneurs Docker, exécutez :

```bash
docker-compose up
```
## ⚙️ Configuration du fichier d'alias

1. Ouvrez le fichier de configuration de votre terminal :

```bash
nano ~/.bashrc
```
1. Ajoutez le script suivant pour charger les alias dynamiquement :

```bash
load_aliases() {
  if [ -f "$(pwd)/aliases.sh" ]; then
      . "$(pwd)/aliases.sh"
  fi
}
# Appeler la fonction chaque fois que le répertoire est changé
cd() {
  builtin cd "$@" && load_aliases
}

# Charger les alias au démarrage du shell si le fichier existe dans le répertoire actuel
load_aliases
```

1. Rechargez votre fichier \`.bashrc\` :

```bash
source ~/.bashrc
```

1. Configurez le fichier \`.bash_profile\` (ou \`.profile\`) :

```bash
nano ~/.bash_profile
```

1. Ajoutez cette ligne si elle n'existe pas :

```bash
if [ -f ~/.bashrc ]; then
    source ~/.bashrc
fi
```

1. Rechargez le fichier \`.bash_profile\` :

```bash
source ~/.bash_profile
```

1. Dans le fichier \`aliases.sh\`, redéfinissez les alias comme souhaité.
## 🛠 Technologies utilisées

- ![PHP](https://img.shields.io/badge/PHP-8.x-787CB5?logo=php) PHP 8.x
- ![Symfony](https://img.shields.io/badge/Symfony-7-black?logo=symfony) Symfony 7
- ![MySQL](https://img.shields.io/badge/MySQL-5.7-4479A1?logo=mysql) MySQL
- ![Composer](https://img.shields.io/badge/Composer-2.x-885630?logo=composer) Composer pour la gestion des dépendances
- ![Node.js](https://img.shields.io/badge/Node.js-20.x-339933?logo=node.js) Node pour la gestion des librairies

## Installation du projet Symfony

```bash
ccomposer install
```

```bash
cconsole d:m:m
```

⚠️ **Attention** : Vérifiez votre .env avec les valeurs de vos variables d'environnement définies précédemment.

## ENJOY :)

docker exec -it apache_100 php bin/console make:entity

docker exec -it apache_100 php bin/console make:migration
docker exec -it apache_100 composer require easycorp/easyadmin-bundle

docker exec -it apache_100 php bin/console make:entity

docker exec -it apache_100 php bin/console make:migration

composer require easycorp/easyadmin-bundle

docker exec -it apache_100 php bin/console make:admin:dashboard

docker exec -it apache_100 composer require symfony/security-bundle