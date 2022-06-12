les 12-05: Doctrine

1) .env.local database credentials instellen
2) php bin/console doctrine:database:create
3) Databese connectie voor Doctrine aangepast: environment vars in service.yaml & .env.local: DATATBASE_... verv door DBMANAGER_...;
4) php bin/console make:migration
5) php bin/console doctrine:migra:migra
6) entity unique index : unique=true