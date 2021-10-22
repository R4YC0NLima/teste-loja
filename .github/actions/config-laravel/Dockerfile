FROM php:7.4-cli-alpine

# Configurar o Laravel
ADD entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
