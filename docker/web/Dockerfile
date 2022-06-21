FROM php:8.1-apache

RUN a2enmod rewrite
# Since we are using laravel project, index.php file is inside public folder
# To change apache documentroot, check https://hub.docker.com/_/php
ENV APACHE_DOCUMENT_ROOT /var/www/html/public/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# As mentioned in Configuration section of https://hub.docker.com/_/php
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Install xdebug for step debugging
# when installed with pecl, we need to explicitely add extension in php.ini file
RUN pecl install xdebug

# Install Composer - the documentation way
#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
#RUN php composer-setup.php
#RUN php -r "unlink('composer-setup.php');"

# Install Composer - using docker image (multistaged builder)
# what following command does is fetch the composer binary located at /usr/bin/composer from the composer docker image.
#COPY --from=composer /usr/bin/composer /usr/bin/composer

# As mentioned in sail project
#php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \

# Install Composer - by using installer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update