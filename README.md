# Zend Framework Fundamentals -- Aug 2018

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
