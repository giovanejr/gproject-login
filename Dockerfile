FROM eboraas/apache-php

MAINTAINER Giovane Japa Jr <giovanejr@gmail.com>

RUN sed -i 's:Listen 80:Listen 8080:g' /etc/apache2/ports.conf && sed -i 's/VirtualHost *:80/VirtualHost *:8080/g' /etc/apache2/sites-enabled/000-default.conf


RUN rm /var/www/html/index.html

COPY apache2.conf /etc/apache2/
COPY other-vhosts-access-log.conf /etc/apache2/conf-enabled/

ADD login /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

