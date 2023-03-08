FROM wordpress:6.1.1-php8.0-apache

RUN apt-get update && apt-get -y install gnupg2
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs
