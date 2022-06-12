les 12-05: Doctrine

1) .env.local database credentials instellen
2) php bin/console doctrine:database:create
3) Databese connectie voor Doctrine aangepast: environment vars in service.yaml & .env.local: DATATBASE_... verv door DBMANAGER_...;   server versie wegdoen van datasseurl
4) php bin/console make:migration
5) php bin/console doctrine:migra:migra
6) entity unique index : unique=true
7) StudentController aanmaken en newStudent()
- DInj van EntityManagerInterface: persist(), flush()
8) rest: coderen
9) date,ago filters: module installeren -> composer require knplabs/knp-time-bundle
- |date("m/d/Y")