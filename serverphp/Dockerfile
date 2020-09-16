FROM php:7.3-apache

#install yarn repository
# libfreetype6-dev \
#    libjpeg62-turbo-dev \


RUN apt-get update && apt-get install -y libmcrypt-dev
RUN pecl install mcrypt && docker-php-ext-enable mcrypt
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxml2-dev \
    nano \
    mc \
    vim \
    curl \
    zlib1g-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd soap iconv mysqli pdo pdo_mysql exif bcmath mbstring


#install yarn and nodejs
RUN apt-get -y install nodejs npm
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN npm install -g yarn

RUN apt-get -y install \
    libzip-dev \
    libmagickwand-dev \
    --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick


RUN /usr/local/bin/docker-php-ext-install mysqli
RUN /usr/local/bin/docker-php-ext-install pdo
RUN /usr/local/bin/docker-php-ext-install pdo_mysql
RUN /usr/local/bin/docker-php-ext-install zip
RUN /usr/local/bin/docker-php-ext-install xmlwriter
#RUN apt-get install php7.3-intl

RUN apt-get install libssl-dev -y

RUN a2enmod rewrite
RUN a2enmod ssl
RUN usermod -u 1000 www-data
RUN usermod -G staff www-data

ENV TERM xterm
