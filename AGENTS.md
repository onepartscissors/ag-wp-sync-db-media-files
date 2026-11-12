# AGENTS.md

This is the media files addon for [AG WP Sync DB](https://github.com/onepartscissors/ag-wp-sync-db). Read that repo's AGENTS.md for how to run syncs (`wp agsdb ... --media`) and for the compatibility rules. In short:

- Never change the AJAX action names (`wpsdbmf_*`), the POST field names used in signatures, or the reported protocol version (`$GLOBALS['wpsdb_meta']['wp-sync-db-media-files']['version']` = 1.1.4b1). Sites running this addon sync media with sites still on wp-sync-db-media-files.
- Command-line media syncs go through `cli_migration()`, hooked to `wpsdb_cli_finalize_migration`.
- Bump the version in `ag-wp-sync-db-media-files.php` and `AG_WPSDB_MF_VERSION` in `version.php` (semver), and add a `CHANGELOG.md` entry for every change.
- Test media pull and push between a local site and a remote development site (never production): delete a few files on the side being overwritten, sync with media, check they come back.
