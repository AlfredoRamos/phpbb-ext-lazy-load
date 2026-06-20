### About

Lazy Load extension for phpBB.

[![Build Status](https://img.shields.io/github/actions/workflow/status/AlfredoRamos/phpbb-ext-lazy-load/ci.yml?style=flat-square)](https://github.com/AlfredoRamos/phpbb-ext-lazy-load/actions)
[![Latest Stable Version](https://img.shields.io/github/tag/AlfredoRamos/phpbb-ext-lazy-load.svg?style=flat-square&label=stable)](https://github.com/AlfredoRamos/phpbb-ext-lazy-load/releases)
[![License](https://img.shields.io/github/license/AlfredoRamos/phpbb-ext-lazy-load.svg?style=flat-square)](https://raw.githubusercontent.com/AlfredoRamos/phpbb-ext-lazy-load/master/license.txt)

It will prevent unnecessary image loading to optimize bandwidth usage, as it will load them only when needed.

It doesn't require any configuration.

### Dependencies

- PHP 8.1.3 or greater
- phpBB 3.3 or greater

### Installation

- Download the [latest release](https://github.com/AlfredoRamos/phpbb-ext-lazy-load/releases)
- Decompress the `*.zip` or `*.tar.gz` file
- Copy the files and directories inside `{PHPBB_ROOT}/ext/alfredoramos/lazyload/`
- Go to your `Administration Control Panel` > `Customize` > `Manage extensions`
- Click on `Enable` and confirm

### Uninstallation

- Go to your `Administration Control Panel` > `Customize` > `Manage extensions`
- Click on `Disable` and confirm
- Go back to `Manage extensions` > `Lazy Load` > `Delete data` and confirm

### Upgrade

- Go to your `Administration Control Panel` > `Customize` > `Manage extensions`
- Click on `Disable` and confirm
- Delete all the files inside `{PHPBB_ROOT}/ext/alfredoramos/lazyload/`
- Download the new version
- Upload the new files inside `{PHPBB_ROOT}/ext/alfredoramos/lazyload/`
- Enable the extension again
