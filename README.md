# devsign.studio landing page template v4.0.0
## Run the project
1. Open a terminal
2. Go to the folder in terminal: ```cd ruta_carpeta```
3. Copy and paste this: ```php -S localhost:8000```
4. Open ```localhost:8000``` in your browser.
5. Open another terminal tab
6. Paste this ```sass --watch index.scss:css/index.css --style compressed```

## Start creating
Open theses files to setup your site
1. ```google_fonts.php```
2. ```_vars.scss```
3. ```_colors.scss```
4. ```_buttons.scss```
5. ```brand_info.php```
6. Export your assets
7. Edit navbar content: ```use/body/navbar.php```
8. Edit navbar style: ```components/navbar/index.scss```
9. ```use/body/hero.php```



## Configuración en Nginx
1. ```sudo nano /etc/nginx/sites-available/[DOMINIO]```
2. Watch server.conf.example
3. ```sudo ln -s /etc/nginx/sites-available/[DOMINIO] /etc/nginx/sites-enabled/```
4. ```sudo nginx -t```
5. ```sudo systemctl restart nginx```
6. ```sudo certbot --nginx -d [DOMINIO]```
