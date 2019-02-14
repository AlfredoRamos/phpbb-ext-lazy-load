### About

Lazy Load extension for phpBB

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
