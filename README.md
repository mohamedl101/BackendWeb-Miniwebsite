# BackendWeb-Miniwebsite

## Waarover gaat mijn app?
Dit is een webapplicatie rond motoren. Bezoekers kunnen publieke pagina’s (zoals soorten, merken, onderhoud) en motoren bekijken in de catalogus.
Een ingelogde gebruiker kan een testrit aanvragen en zijn eigen aanvragen bekijken.  
Er is ook een admin gedeelte waar een beheerder motoren en merken kan toevoegen, verwijderen of wijzigen en testrit-aanvragen kan opvolgen.

---

## Database
- Databasegegevens zitten in de `.env` file.
- Migrations zijn de structuur van de database (tabellen/kolommen), zonder data. De seeders oftewel de mockdata heb je ook nodig om de applicatie uit te testen. Je voert beiden uit met dit commando:

```bash
php artisan migrate --seed
```

- 

Of je kunt die volledig opnieuw opbouwen:

```bash
php artisan migrate:fresh --seed
```

---

## Applicatie starten

1. Download de zip file en pak hem uit in `htdocs`
2. Zorg dat je composer hebt geinstaleerd en maak vervolgens `env` aan:

```bash
composer install
copy .env.example .env
```
3. Genereer een `APP_KEY` (voor encryptie data)

```bash
php artisan key:generate
```

4. Draai vervolgens de migrations en seeders en start daarna de server:

```bash
php artisan migrate --seed
php artisan serve
```

5. Start de server met volgende link:

- `http://127.0.0.1:8000`

---

## Login

De login voor admin en medewerker zijn (hardcoded):

- admin@example.com / password
- jan@example.com / password
---

## Belangrijkste bestand
Een van de belangrijkste bestanden is `routes/web.php`, omdat daar alle web-routes en toegangsregels staan. 
In `app/Controllers` zit de logica (data ophalen, valideren, opslaan, redirecten).  
De `resources/views` vormen de frontend die de gebruiker ziet.

---
## Technologieën

- PHP 8.2+ / Laravel 12
- SQLite (staat standaard erbij)
- Blade templates
- De teksten in `pages/soorten`, `pages/merken` en `pages/onderhoud` heb ik laten genereren met chatGPT (wou vooral focussen op de framework)
- Styling en fonts zijn gegenereerd met Copilot. 
