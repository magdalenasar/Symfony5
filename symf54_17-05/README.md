Les van 17-05-2022
1) Installing API Platform -> composer require api
2) Entity:  Teacher ->  php bin/console make:entity   2.1) Swagger:controller panel for the  api test it -> /api/teachers
3) Migration - DB teacher tabel cr-> 
3.1)php bin/console make:migra
3.2)   php bin/console doctrine:migrations:migrate
4) Entity with API Platform com-> @ApiResource()  + import USE statement
5)Geboortedatum  ?string
   return $this->geboortedatum->format("Y-m-d");
5) composer require api-platform/api-pack
