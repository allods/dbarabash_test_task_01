
# Web App Setup Guide

This guide will walk you through setting up the development environment for the web app using Docker.

## Prerequisites

Make sure you have the following installed:
- Docker

## Setting Up the Environment

To set up the development environment, follow these steps:

1. Clone this repository.
2. Navigate to your project directory.
3. Start the Docker environment by running the following command:

   ```bash
   sudo docker-compose up -d
   ```
4. Find the container ID by running:
    ```bash
    sudo docker ps -a
    ```
5. Access the app container with the following command:
    ```bash
    sudo docker exec -it {container_id} bash
    ```
    Replace `{container_id}` with the actual container ID you found in the previous step.
6. Once inside the container, run the migration script to set up the database table(s):
    ```bash
    php public/migration.php
    ```
7. After completing the above steps, you can access the app by navigating to: `http://localhost`