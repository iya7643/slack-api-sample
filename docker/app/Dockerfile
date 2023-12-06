FROM amazonlinux:2

# phpの設定ファイル
COPY ./php/www.conf /etc/php-fpm.d/www.conf
COPY ./php/override.ini /etc/php.d/override.ini

# nginxの設定ファイル
COPY ./nginx/php.conf /etc/nginx/default.d/php.conf
COPY ./nginx/nginx.conf /etc/nginx/nginx.conf

RUN yum -y update
RUN amazon-linux-extras install -y php8.1 nginx1

RUN yum install -y gcc jq tar.x86_64 sudo vim wget procps make \
    php-gd php-mbstring php-process php-xml php-devel php-pear

# xdebug
RUN pecl install xdebug-3.1.6

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    chmod +x /usr/local/bin/composer

# node
RUN sudo yum install https://rpm.nodesource.com/pub_16.x/nodistro/repo/nodesource-release-nodistro-1.noarch.rpm -y
RUN sudo yum install nodejs -y --setopt=nodesource-nodejs.module_hotfixes=1

WORKDIR /var/www
