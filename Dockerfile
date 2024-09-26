# Use the official PHP image with Apache
FROM php:8.1.19-apache
# Install the mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# Other necessary extensions can also be installed here
