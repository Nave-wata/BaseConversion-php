FROM php:8.0

WORKDIR /usr/app

RUN \
    apt-get update ; \
    apt-get install -y --no-install-recommends \
        git \
        zip \
        unzip \
        sudo \
    ; \
    apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* \
    ; \
    \
    docker-php-ext-install bcmath \
    ; \
    \
    useradd -m -s /bin/bash -u 1000 user ; \
    usermod -aG sudo user ; \
    \
    echo "user ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers.d/user;

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

USER user