#!/bin/bash
set -ex

rm -rf .env*

pwd
ls -lh

cp /docker/getenv.php ./

GETENV=`/usr/bin/php getenv.php`

if [ "$GETENV" = "ok" ];then
  rm -rf ./node_modules
  npm install
  npm run build
else
  echo "Error occured when trying to get env from heroku"
fi
