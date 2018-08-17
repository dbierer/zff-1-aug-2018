# Zend Framework Fundamentals -- Aug 2018

NOTE TO SELF: add instructions for developer tools

## Lab Notes for Mon 20 Aug 2018
* LAB: Forms, Filters and Validators
  * Step #14 in PostController::indexAction() *do not* use the `else` clause and *do not* do a 	`redirect()`!!!
  * Probably good idea to know structure of the database table:
```
CREATE TABLE `listings` (
  `listings_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` char(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expires` timestamp NULL DEFAULT NULL,
  `description` varchar(4096) DEFAULT NULL,
  `photo_filename` varchar(1024) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(32) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country` char(2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `delete_code` char(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`listings_id`),
  KEY `title` (`title`),
  KEY `category` (`category`),
  KEY `delete_code` (`delete_code`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8
```

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

## Class Notes Fri 17 Aug
* Link for Zend\Filter docs: https://docs.zendframework.com/zend-filter/
* Link for Zend\Validator: https://docs.zendframework.com/zend-validator/
