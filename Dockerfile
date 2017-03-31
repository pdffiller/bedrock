FROM pdffiller/php-nginx:ubuntu-16.04
ARG BUILD_ID=1

#install WordPress
RUN  curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && sudo mv wp-cli.phar /usr/local/bin/wp

COPY . ./var/www/blog
COPY config/*.conf /opt/docker/etc/supervisor.d/
COPY blog.conf /opt/docker/etc/nginx/vhost.common.d/11-blog.conf

RUN ln -s /var/www/blog/web/ /app

RUN /usr/bin/consul-template \
    -consul-addr "$CONSUL_HOST" \
    -consul-retry \
    -template "/usr/src/app/config/consul/main_template.ctmpl:/var/www/blog/.env"

WORKDIR /var/www/blog
