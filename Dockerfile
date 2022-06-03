FROM php:7.3-apache

LABEL maintainer="Leanderson Souza <leandersonssouza1@gmail.com>"

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif
RUN docker-php-ext-install calendar
RUN docker-php-ext-install intl
RUN apt-get -y install --fix-missing zip unzip
RUN apt-get -y install --fix-missing git
RUN a2enmod rewrite

RUN printf "#!/bin/bash\n/usr/sbin/apache2ctl -D FOREGROUND" > /startScript.sh
RUN chmod +x /startScript.sh

RUN cd /var/www/html
    
EXPOSE 80
VOLUME ["/var/www/html", "/var/log/apache2", "/etc/apache2"]

CMD ["bash", "/startScript.sh"]
