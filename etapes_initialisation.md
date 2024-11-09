# Les étapes d'initialisation d'un projet


1. initialiser composer
    ```bash
    $: composer init
    ```
1. Mise en place de l'autoloader 
    Bien renseigner l'autoloader dans composer.jsoncomposer et actualiser la config
    ```bash
    $: composer dump-autoload
    ```

1. Installation des paquets de dev var-dumper et phpunit
    ```bash
    $: composer require --dev symfony/var-dumper
    $: composer require --dev phpunit/phpunit 
    ```
1. on isole le l'index.php dans un dossier /public 
1. on crée les dossier App/{Controller, Model, View} 
1. on met dans le .gitignore : vendor; composer.lock et les fichiers confidentiels 

