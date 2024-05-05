FROM php:8.1-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && \
	apt-get install -y libcurl3-dev \
		git \
		unzip \
		wget \
		zip

# Install Composer latest
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer