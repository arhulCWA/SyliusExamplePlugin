# Création de plugin CWA

## Installation du projet

```bash
composer create-project sylius/plugin-skeleton VendorNameSyliusPluginNamePlugin
```

## Changement dans le Nommage

### Composer.json

Ajouter :
```json
{
    "name": "vendor-name/sylius-plugin-name-plugin",
    "description": "Description of plugin",
    "version": "VERSION",
// ...
```

Changer :
```json
// ...
 "autoload": {
        "psr-4": {
            "Acme\\SyliusExamplePlugin\\": "src/",
            "Tests\\Acme\\SyliusExamplePlugin\\": "tests/"
        }
    },
// ...
```
<div style="text-align: center"> 🔽 </div>

```json
// ...
 "autoload": {
        "psr-4": {
            "VendorName\\SyliusPluginNamePlugin\\": "src/",
            "Tests\\VendorName\\SyliusPluginNamePlugin\\": "tests/"
        }
    },
// ...
```

### Renomage de fichiers

**_src/AcmeSyliusExamplePlugin_** ▶️ **_src/VendorNameSyliusPluginNamePlugin_**

**_src/DependencyInjection/AcmeSyliusExampleExtension_** ▶️ **_src/DependencyInjection/VendorNameSyliusPluginNameExtention_**

### Changements dans les fichiers :

- src/DependencyInjection/Configuration.php :

    - namespace :
        ```php
        // ...
        namespace Acme\SyliusExamplePlugin;
        // ...
        ```
        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        namespace VendorName\SyliusPluginNamePlugin;
        // ...
        ```

    - treeBuilder name :

        ```php
        // ...
        public function getConfigTreeBuilder(): TreeBuilder
            {
                $treeBuilder = new TreeBuilder('iron_man_sylius_product_on_demand_plugin');
        // ...
        ```
        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        public function getConfigTreeBuilder(): TreeBuilder
            {
                $treeBuilder = new TreeBuilder('vendor_name_sylius_plugin_name_plugin');
        // ...
        ```

- src/DependencyInjection/VendorNameSyliusPluginNameExtension.php :
    - namespace :
        ```php
        // ...
        namespace Acme\SyliusExamplePlugin;
        // ...
        ```
        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        namespace VendorName\SyliusPluginNamePlugin;
        // ...
        ```
    - classname :
        ```php
        // ...
        final class AcmeSyliusExampleExtension extends AbstractResourceExtension implements PrependExtensionInterface
        // ...
        ```
        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        final class VendorNameSyliusPluginNameExtension extends AbstractResourceExtension implements PrependExtensionInterface
        // ...
        ```
    - Migration Diretory :
        ```php
        // ...
        protected function getMigrationsDirectory(): string
        {
            return '@AcmeSyliusExamplePlugin/migrations';
        }
        // ...
        ```

        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        protected function getMigrationsDirectory(): string
        {
            return '@VendorNameSyliusPluginNamePlugin/migrations';
        }
        // ...
        ```
- src/VendorNameSyliusPluginNamePlugin.php :
    - namespace :
        ```php
        // ...
        namespace Acme\SyliusExamplePlugin;
        // ...
        ```
        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        namespace VendorName\SyliusPluginNamePlugin;
        // ...
        ```
    - classname :
        ```php
        // ...
        final class AcmeSyliusExamplePlugin extends Bundle
  
        // ...
        ```
        <div style="text-align: center"> 🔽 </div>

        ```php
        // ...
        final class VendorNameSyliusPluginNamePlugin extends Bundle
  
        // ...
        ```

- tests/Application/config/bundles.php :
    ```php
    // ...
        Acme\SyliusExamplePlugin\AcmeSyliusExamplePlugin::class => ['all' => true],
    // ...
    ```

    <div style="text-align: center"> 🔽 </div>

    ```php
    // ...
        VendorName\SyliusPluginNamePlugin\VendorNameSyliusPluginNamePlugin::class => ['all' => true],
    // ...
    ```

- tests/Application/bin/console :
    ```php
    // ...
    use Tests\Acme\SyliusExamplePlugin\Application\Kernel;
    // ...
    ```

    <div style="text-align: center"> 🔽 </div>

    ```php
    // ...
    namespace Tests\Acme\SyliusExamplePlugin\Application;
    // ...
    ```

- tests/Application/Kernel.php :
    ```php
    // ...
    namespace Tests\VendorName\SyliusPluginNamePlugin\Application;
    // ...
    ```

    <div style="text-align: center"> 🔽 </div>

    ```php
    // ...
    use Tests\VendorName\SyliusPluginNamePlugin\Application\Kernel,
    // ...
    ```





## Commandes à éxécuter  :

```bash
composer dump-autoload
```

```bash
(cd tests/Application && yarn install)
(cd tests/Application && yarn build)
(cd tests/Application && APP_ENV=test bin/console assets:install public)
```




## Comment tester le plugin :

### Environement de test intégré :

### Importer les fichiers de configuration :

-Tests/Application/config/routes.yaml :
```yaml
//...
pluginName_example:
    resource: "@VendorNameSyliusPluginNamePlugin/src/Resources/config/app/routing.yaml"
//...
```

-Tests/Application/config/services.yaml :
```yaml
//...
imports:
    - { resource : '@VendorNameSyliusPluginNamePlugin/src/Resources/config/app/services.yaml'}
//...
```

#### Démararer le serveur web :

```bash
(cd tests/Application && php symfony serve:start)
```

### Depuis un projet externe :

#### Méthode git :

```json
//...
 "repositories": {
        "VendorNameSyliusPluginNamePlugin": {
            "type": "git",
            "url": "https://github.com/arhulCWA/tarteaufraise.git"
        }
    },
//...
    "require": {
//...
        "vendor-name/sylius-plugin-name-plugin" : "dev-main"
    },
//...
```
