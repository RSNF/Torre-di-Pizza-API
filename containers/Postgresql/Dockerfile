FROM postgres:bullseye

RUN cp /usr/share/zoneinfo/America/Bahia /etc/localtime && echo "America/Bahia" > /etc/timezone
RUN apt-get update && apt-get upgrade -y && apt-get install vim -y

EXPOSE 5432