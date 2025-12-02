# Start from the official PHP image with Apache (8.1 is a common modern version)
FROM php:8.1-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the core application file and the state persistence file
# Note: Ensure count.txt exists in your repo and contains "0"
COPY index.php .
COPY count.txt .

# CRITICAL FIX 🔒: Grant write permission to the PHP process for the count file.
# This fixes the "Permission denied" warning shown earlier.
RUN chmod 777 count.txt

# The default CMD of this base image runs Apache, so we don't need a specific CMD line.
