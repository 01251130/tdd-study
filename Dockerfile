# FROM php:7.4-cli
FROM php:7.4-cli

RUN apt-get update && apt-get install -y zip

ARG INSTALL_PATH=/usr/local/bin

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
 && php composer-setup.php --install-dir=$INSTALL_PATH --filename=composer \
 && php -r "unlink('composer-setup.php');"

RUN /usr/local/bin/composer -v 
