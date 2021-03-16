FROM node:10.23.1-stretch

RUN npm install --global cross-env react-app-rewired
RUN apt update -y && apt -y install php php-curl

COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
COPY docker/getenv.php /docker/getenv.php
RUN chmod +x /docker/getenv.php

ENTRYPOINT ["/entrypoint.sh"]
