#!/bin/sh

### ICONS
grep -qxF '/public/vendor/icons' .gitignore || echo '/public/vendor/icons' >> .gitignore
rm -rf public/vendor/icons &> /dev/null
composer --dev require ryangjchandler/blade-tabler-icons
php artisan vendor:publish --tag=blade-tabler-icons --force
mv public/vendor/blade-tabler-icons public/vendor/icons
