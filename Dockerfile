FROM php:8.1-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the core application file and the state persistence file
COPY index.php .
COPY count.txt .

# CRITICAL FIX 🔒: We use two commands to guarantee writability:
# 1. Change Owner: Assigns the file to the user running Apache (www-data).
RUN chown www-data:www-data /var/www/html/count.txt

# 2. Change Permissions: Grants read/write access to everyone, just to be sure.
RUN chmod 777 /var/www/html/count.txt

# Expose the default Apache port
EXPOSE 80
