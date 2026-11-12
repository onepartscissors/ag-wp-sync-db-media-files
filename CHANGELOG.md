# Changelog

All notable changes to AG WP Sync DB Media Files. Versions follow [semver](https://semver.org/).

## [2.1.0] - 2026-11-12

### Added
- Media sync for the `wp agsdb pull/push --media` command in AG WP Sync DB 2.1.0.
- AGENTS.md and CLAUDE.md.

### Fixed
- Command-line media sync sent a growing batch once per file, so files were uploaded or downloaded many times. It now sends proper batches.

### Security
- Data received from the other site is unserialized with `allowed_classes => false`.

## [2.0.0] - 2026-11-12

First release of the fork, based on [wp-sync-db-media-files](https://github.com/wp-sync-db/wp-sync-db-media-files) 1.1.4b1.

### Changed
- Renamed to AG WP Sync DB Media Files (folder and main file `ag-wp-sync-db-media-files/ag-wp-sync-db-media-files.php`, text domain `ag-wp-sync-db-media-files`).
- Loads only after AG WP Sync DB has loaded, never alongside the original WP Sync DB.
- Activating the addon deactivates WP Sync DB Media Files.
- Still reports protocol version 1.1.4b1 to remote sites. The real version is sent as `ag_media_files_version`.

### Performance
- Deciding which files to migrate uses a lookup by file path instead of a nested loop.
- Media listings contain files only, not folders or dot entries.
- Pull downloads each batch of files in parallel.

### Fixed
- Removing remote media that doesn't exist locally returned no response.
- Undefined index and null-argument warnings on PHP 8.
