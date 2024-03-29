#!/bin/bash

# Configuration de base: datestamp e.g. YYYYMMDD

DATE=$(date +"%Y%m%d")

# Dossier o� sauvegarder les backups (cr�ez le d'abord!)

BACKUP_DIR="/backup/mysql"

# Identifiants MySQL

MYSQL_USER="root"
MYSQL_PASSWORD="toto"

# Commandes MySQL (aucune raison de modifier ceci)

MYSQL=/usr/bin/mysql
MYSQLDUMP=/usr/bin/mysqldump

# Bases de donn�es MySQL � ignorer

SKIPDATABASES="Database|information_schema|performance_schema|mysql"

# Nombre de jours � garder les dossiers (seront effac�s apr�s X jours)

RETENTION=90

# ---- NE RIEN MODIFIER SOUS CETTE LIGNE ------------------------------------------
#
# Create a new directory into backup directory location for this date

mkdir -p $BACKUP_DIR/$DATE

# Retrieve a list of all databases

databases=`$MYSQL -u$MYSQL_USER -p$MYSQL_PASSWORD -e "SHOW DATABASES;" | grep -Ev "($SKIPDATABASES)"`

# Dumb the databases in seperate names and gzip the .sql file

for db in $databases; do
echo $db
$MYSQLDUMP --force --opt --user=$MYSQL_USER -p$MYSQL_PASSWORD --skip-lock-tables --events --databases $db | gzip > "$BACKUP_DIR/$DATE/$db.sql.gz"
done

# Remove files older than X days

find $BACKUP_DIR/* -mtime +$RETENTION -delete