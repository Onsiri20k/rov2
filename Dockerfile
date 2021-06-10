FROM debian:stretch

ENV DEBIAN_FRONTEND noninteractive
ENV php_conf /etc/php/7.3/fpm/php.ini
ENV fpm_conf /etc/php/7.3/fpm/pool.d/www.conf

# Install Basic Requirements
RUN apt-get update \
    && apt-get install --no-install-recommends --no-install-suggests -q -y gnupg2 dirmngr wget apt-transport-https lsb-release ca-certificates nodejs \
    && wget -qO - http://nginx.org/keys/nginx_signing.key | apt-key add --no-tty - \
    && echo "deb http://nginx.org/packages/mainline/debian/ stretch nginx" >> /etc/apt/sources.list \
    && wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
    && apt-get update \
    && apt-get install --no-install-recommends --no-install-suggests -q -y \
            cron \
            apt-utils \
            curl \
            nano \
            zip \
            unzip \
            python-pip \
            python-setuptools \
            git \
            nginx \
            php7.3-fpm \
            php7.3-cli \
            php7.3-dev \
            php7.3-common \
            php7.3-json \
            php7.3-opcache \
            php7.3-readline \
            php7.3-mbstring \
            php7.3-curl \
            php7.3-memcached \
            php7.3-imagick \
            php7.3-mysql \
            php7.3-zip \
            php7.3-pgsql \
            php7.3-intl \
            php7.3-xml \
            php7.3-redis \
            php7.3-mongodb \
            composer \
            supervisor \
            htop \
    && echo "#!/bin/sh\nexit 0" > /usr/sbin/policy-rc.d \
    && rm -rf /etc/nginx/conf.d/default.conf \
    && mkdir -p /run/php \
    && sed -i -e "s/upload_max_filesize\s*=\s*2M/upload_max_filesize = 100M/g" ${php_conf} \
    && sed -i -e "s/post_max_size\s*=\s*8M/post_max_size = 100M/g" ${php_conf} \
    && sed -i -e "s/www-data/nginx/g" ${fpm_conf} \
    && sed -i -e "s/worker_processes  1/worker_processes 8/" /etc/nginx/nginx.conf \
    && apt-get clean && rm -rf /var/lib/apt/lists/*# Add nginx.conf

RUN wget -qO - https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update -qq \
    && apt-get install -y yarn \
    && apt update \
    && apt install curl

RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh \
    && bash nodesource_setup.sh \
    && apt install nodejs
