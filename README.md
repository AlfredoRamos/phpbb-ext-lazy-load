### About

Lazy Load extension for phpBB

[![Build Status](https://img.shields.io/travis/com/AlfredoRamos/phpbb-ext-lazy-load.svg?style=flat-square)](https://travis-ci.com/AlfredoRamos/phpbb-ext-lazy-load)
[![Latest Stable Version](https://img.shields.io/github/tag/AlfredoRamos/phpbb-ext-lazy-load.svg?style=flat-square&label=stable)](https://github.com/AlfredoRamos/phpbb-ext-lazy-load/releases)
[![Code Quality](https://img.shields.io/codacy/grade/13a13c2aaf71468b9480cf7fb722b138?style=flat-square)](https://app.codacy.com/manual/AlfredoRamos/phpbb-ext-lazy-load)
[![License](https://img.shields.io/github/license/AlfredoRamos/phpbb-ext-lazy-load.svg?style=flat-square)](https://raw.githubusercontent.com/AlfredoRamos/phpbb-ext-lazy-load/master/license.txt)

### Dependencies

- PHP 5.6 or greater
- phpBB 3.2 or greater

### Installation

- Download the [latest release](https://github.com/AlfredoRamos/phpbb-ext-lazy-load/releases)
- Decompress the `*.zip` or `*.tar.gz` file
- Copy the files and directories inside `{PHPBB_ROOT}/ext/alfredoramos/lazyload/`
- Go to your `Administration Control Panel` > `Customize` > `Manage extensions`
- Click on `Enable` and confirm

### Usage

It will prevent unnecessary image and iframe loading to optimize bandwidth usage, as it will load content only when needed.

### Configuration

- Go to your `Administration Control Panel` > `Extensions` > `Lazy Load`
- Change settings as needed
- Click on `Submit`

### Uninstallation

- Go to your `Administration Control Panel` > `Customize` > `Manage extensions`
- Click on `Disable` and confirm
- Go back to `Manage extensions` > `Lazy Load` > `Delete data` and confirm

### Upgrade

- Uninstall the extension
- Delete all the files inside `{PHPBB_ROOT}/ext/alfredoramos/lazyload/`
- Download the new version
- Install the extension
