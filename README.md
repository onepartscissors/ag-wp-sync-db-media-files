# AG WP Sync DB Media Files

An addon for [AG WP Sync DB](https://github.com/onepartscissors/ag-wp-sync-db) that syncs media libraries between WordPress installations during a push or pull.

Forked from [wp-sync-db/wp-sync-db-media-files](https://github.com/wp-sync-db/wp-sync-db-media-files).

## Why this fork exists

The original addon is no longer maintained. This fork exists to:

1. **Fix the errors** on current PHP and WordPress versions.
2. **Improve sync speed where we can.**
3. **Make minor improvements.**

How the addon works has not changed.

## What's faster

- **Working out which files to copy.** The original compared every attachment against every other attachment, which slowed down sharply on large media libraries. It now uses a lookup by file path.
- **Smaller file listings.** Only files are listed, not folders.
- **Parallel downloads on pull.** Each batch of files is downloaded at the same time instead of one after another. Turn this off with the `ag_wpsdb_parallel_media_downloads` filter.

## Compatible with WP Sync DB Media Files

It reports the same protocol version (1.1.4b1) as WP Sync DB Media Files, so a site using this addon can sync media with a site still on the original. Activating it deactivates WP Sync DB Media Files.

## Requirements

- [AG WP Sync DB](https://github.com/onepartscissors/ag-wp-sync-db) 2.0.0 or later, active on both sites
- PHP 7.4 or later
- WordPress 5.6 or later

## Installation

```
git submodule add https://github.com/onepartscissors/ag-wp-sync-db-media-files.git web/wp-content/plugins/ag-wp-sync-db-media-files
wp plugin activate ag-wp-sync-db ag-wp-sync-db-media-files
```

Then tick "Media Files" on the Migrate DB screen when you push or pull.

## Credits

- Original addon: [WP Sync DB Media Files](https://github.com/wp-sync-db/wp-sync-db-media-files) by Sean Lang, based on the WP Migrate DB Pro Media Files addon by Delicious Brains.
- This fork: [Ash Glover](https://www.ashglover.co.za).

## License

GPL v2 or later. See [LICENSE](LICENSE).
