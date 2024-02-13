FROM php:8.2-fpm

ARG DEVCYCLE_SDK_KEY

ENV DVC_LBP_VERSION="1.1.0"
ENV DVC_LBP_OS_PLATFORM="amd64"
ENV DVC_LBP_PACKAGE_BUILD="deb"

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y supervisor nginx

COPY ./nginx.conf /etc/nginx/sites-available/default
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY ./dvc-proxy-config.json /etc/devcycle-sdk-proxy/dvc-proxy-config.json
RUN sed -i "s/\${DEVCYCLE_SDK_KEY}/${DEVCYCLE_SDK_KEY}/" /etc/devcycle-sdk-proxy/dvc-proxy-config.json

RUN export url="https://github.com/DevCycleHQ/sdk-proxy/releases/download/v${DVC_LBP_VERSION}/devcycle-sdk-proxy_${DVC_LBP_VERSION}+git_${DVC_LBP_OS_PLATFORM}.${DVC_LBP_PACKAGE_BUILD}" \
    && echo $url && curl -L -o /tmp/dvc $url \
    && dpkg -i /tmp/dvc \
    && apt-get install -f

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
