#!/bin/bash
set -ex

rm -rf .env*

pwd

GETENV=`/usr/bin/php getenv.php`

if [ "$GETENV" = "ok" ];then
  npm run build
else
  echo "Error occured when trying to get env from heroku"
fi
