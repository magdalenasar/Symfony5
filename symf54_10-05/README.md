Les 10/05/2022  (reinstall PHP to 7.3 ~4) Dit is een test om de versie te proberen
Commands:
1) composer create-project symfony/skeleton:"5.4.99" symf54_10-05
    -- Steven: composer create-project symfony/skeleton:"5.4.99" new_symf54composer
2) composer require annotations 
3) composer require twig
4) composer require profiler --dev
5) composer require debug 
6) composer require symfony/asset 
7) composer require maker

een Command aanmaken: 
   php bin/console make:command -> app:randompw
die commando oproepen:
php bin/console app:randompw

composer require orm

een Entity aanmaken:
    - php bin/console make:entity 
    - Student 
    - naam, string, 255, verplicht
    - voornaam, string, 255, niet verplicht 
    - geboortedatum, date, niet verplicht
    - punten, integer, niet verplicht

de applicatie opstarten, old school:

    php -S localhost:8000 -t public   = werkt beter als problemen er heeft

    symfony serve (-d)
