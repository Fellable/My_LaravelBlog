#!/bin/bash

set -e

while ! nc -z rabbitmq 5672; do
  echo "Waiting for RabbitMQ..."
  sleep 1
done

echo "RabbitMQ is up and running"

# Start Supervisor
exec "$@"
