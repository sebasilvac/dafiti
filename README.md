# Prueba Técnica Dafiti

1 - para hacer le build del docker
```
docker-compose build
```

2 - para correr el sistema en **localhost:8080**
```
docker-compose up -d
```

3 - entrar al contenedor
```
docker-compose exec app bash
```

4 - instalar dependencias
```
composer install
```

5 - una vez dentro podemos ejecutar las pruebas
```
./vendor/bin/phpunit
```