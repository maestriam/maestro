<p align="center">
    <img width="256" src="imgs/samurai.png">
</p>

<p align="center"><b>Create awsome themes for your Laravel projects.</b></p>


# 🔴 Maestriam/Maestro

* [Facades methods](#facades-methods)
* [Facades methods](#facades-methods)
* [Facades methods](#facades-methods)
    * [Facades methods](#facades-methods)
        * [Facades methods](#facades-methods)
* [Facades methods](#facades-methods)

## Facades methods

**Create a new module.**
```php
Maestro::module('Bloomberg')->create(); // returns Module instance 
```

**Check if a module exists.**
```php
Maestro::module('Bloomberg')->exists(); // returns bool
```

**Find a module in vendor folder.**
```php
Maestro::module('Bloomberg')->find(); // returns Module instance or null
```

**Search a module with specific name. If doesn't find, create module.***
```php
Maestro::module('Bloomberg')->findOrCreate(); // returns Module instance
```

**Search a module with specific name. If doesn't find, create module.***
```php
Maestro::module('Bloomberg')->findOrFail(); // returns Module instance or throw exeception
```

**Enable specific module.**
```php
Maestro::module('Bloomberg')->enable(); // returns bool
```

**Disable specific module.**
```php
Maestro::module('Bloomberg')->disable(); // returns bool
```

**Returns all modules created in project**
```php
Maestro::all(); // returns array
```
