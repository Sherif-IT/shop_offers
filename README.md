# Istruzioni per l'Installazione e la Configurazione del Progetto Laravel

## Prerequisiti

Assicurati di avere i seguenti pacchetti installati sul tuo sistema:

```sh
sudo apt-get install php-xml
sudo apt-get install php-pdo-sqlite
sudo apt-get install php-mbstring
```

## Installazione e Configurazione

1. Clona il repository:
git clone <URL_DEL_REPOSITORY>
cd <NOME_DELLA_CARTELLA>


2.Inizializza il database eseguendo lo script initdb.sh:

```sh
./initdb.sh
```

3.Rinomina il file .env.local in .env:

```sh
mv .env.local .env
```

4.Installa le dipendenze del progetto usando Composer:

```sh
composer install
```

5.Esegui le migrazioni del database:

```sh
php artisan migrate
```

6.Avvia il server di sviluppo di Laravel:

```sh
php artisan serve
```

7.Test delle Rotte

Puoi testare le seguenti rotte per verificare che l'applicazione funzioni correttamente:

v1/offers/{shopId} [GET]: Restituisce tutte le offerte per un determinato shop.

v1/offers/{countrycode} [GET]: Restituisce tutte le offerte per un determinato codice paese.

Assicurati che l'applicazione sia in esecuzione e utilizza un tool come Postman, Curl o il tuo browser per inviare richieste GET alle rotte sopra indicate.
