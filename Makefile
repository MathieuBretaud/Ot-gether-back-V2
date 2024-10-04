
.PHONY: prepare
prepare:
	php artisan migrate:fresh --seed

.PHONY: sync
sync:
	php artisan app:sync-data

.PHONY: excel
excel:
	php artisan import:excel

.PHONY: seed
seed:
	php artisan db:seed --class=StatusSeeder

.PHONY: seed-all
seed-all:
	php artisan db:seed

.PHONY: helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -M
	php artisan ide-helper:meta
