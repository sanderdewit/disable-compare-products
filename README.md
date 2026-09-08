# Sander_DisableCompareProducts

Adds a store-view config toggle that removes Magento 2's Compare Products feature everywhere it
appears:

* Category view sidebar and product list
* Product view
* Search results product list
* Cross-sell, up-sell and related blocks
* My Account sidebar

## Origin

This is a Sander-maintained fork of [galacticlabs/disable-compare-products](https://github.com/galacticlabs/disable-compare-products)
(MIT), re-namespaced under `Sander\DisableCompareProducts` so it is owned in-house rather than
depending on an unmaintained external package. Behaviour is unchanged; the original MIT licence and
copyright are retained in `LICENSE.txt`. It now declares support for PHP 8.3 / 8.4 / 8.5.

## Installation

```bash
composer require sander/module-disable-compare-products
php bin/magento module:enable Sander_DisableCompareProducts
php bin/magento setup:upgrade
```

### Migrating from the GalacticLabs module

The config path is unchanged (`catalog/recently_products/disable_compare`), so any existing setting
carries over. Disable the old module in the same deploy:

```bash
php bin/magento module:disable GalacticLabs_DisableCompareProducts
php bin/magento module:enable Sander_DisableCompareProducts
php bin/magento setup:upgrade
```

## Usage

**Stores > Configuration > Catalog > Catalog > Recently Viewed/Compared Products >
Disable Compare Products** → Yes, then flush caches.

![Catalog Options Screenshot](docs/catalog-options-screenshot.png)
