# Zend Framework Fundamentals -- Aug 2018

NOTE TO SELF: controller plugin for Test module

## Lab Notes for Fri 17 Aug 2018
* LAB: Creating and Accessing a Service
* LAB: Manipulating Views and Layouts

## Lab Notes for Wed 15 Aug 2018
* LAB: Built-in controller plugin
* LAB: Custom Controller Plugin
  * Path to create s/be: `Market\src\Controller\Plugin`
* LAB: New Controllers

## Lab Notes for Mon 13 Aug 2018
* Be sure to identify the controller under the `controllers` key in `module.config.php`
* Use `Module::getConfig()` to return the contents of `module.config.php`
* Only need this for the view:
```
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
```

## Class Notes from Mon 13 Aug
* The reason why the controller plugin did not work was because in the `module.config.php` file, under the `controller_plugins` key, the alias had to be defined in the `aliases` key (note plural!)  ARGHHHH
* In general, for any service container sub-keys, in the  `module.config.php` file, use the plural form.  Thus you'll see keys like `services`, `factories`, `aliases` etc.  The only exception is `shared`.

## Class Notes from Wed 15 Aug
* Command line tool to create skeleton factory code for any class:
```
cd /path/root/of/project
vendor/bin/generate-factory-for-class
```
* Here is an example:
```
vendor/bin/generate-factory-for-class Market\\Controller\\IndexController
```
