#!/bin/bash
set -ex

rm -rf .env*

GETENV=`/usr/bin/php /docker/getenv.php`

if [ "$GETENV" = "ok" ];then
  npm run build
else
  echo "Error occured when trying to get env from heroku"
fi
