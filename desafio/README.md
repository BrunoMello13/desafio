Passo a passo para funciamento do desafio no terminal Ubuntu da AWS sandbox (Copie por numero)
1- sudo apt update && sudo apt upgrade -y 
2- sudo apt install -y apache2 wget php-fpm php-mysql php-json php php-dev 
3- sudo apt install -y mariadb-server 
4- sudo systemctl start apache2 
5- sudo systemctl enable apache2 
6- systemctl is-enabled apache2 

7- sudo usermod -a -G www-data $USER 
8-  groups ok
9-  sudo chown -R $USER:www-data /var/www 
10- sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;  
11- find /var/www -type f -exec sudo chmod 0664 {} \; 


Iniciar e configurar MariaDB
12- sudo systemctl start mariadb 
13- sudo mysql_secure_installation 


---Ativar HTTPS com certificado self-signed ---
14- sudo apt install -y openssl 
 sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \ 
-keyout /etc/ssl/private/apache-selfsigned.key \ 
-out /etc/ssl/certs/apache-selfsigned.crt 
sudo systemctl restart apache2 


15- sudo apt install -y php-mbstring php-xml 
16- sudo systemctl restart apache2 
17- sudo systemctl restart php8.3-fpm 

--- Puxar projeto do git---
18- sudo apt install -y git 

19- cd /var/www/html 
20- sudo git clone https://github.com/BrunoMello13/desafio.git 

21- sudo chown -R www-data:www-data /var/www/html/desafio 
22- sudo chmod -R 755 /var/www/html/desafio 

23- sudo apt install -y openssl 

24- sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \ 
-keyout /etc/ssl/private/apache-selfsigned.key \ 
-out /etc/ssl/certs/apache-selfsigned.crt 



25- sudo apt update  
26- sudo apt install -y openssl 

27- sudo a2enmod ssl 
28- sudo a2ensite default-ssl 

29- sudo chown -R www-data:www-data /var/www/html/desafio
30- sudo chmod -R 755 /var/www/html/desafio

31- sudo systemctl restart apache2
32- sudo systemctl restart php8.3-fpm

--- Organizar bancos de dados---

33- sudo mysql -u root -p

34- CREATE DATABASE site_php;

CREATE USER 'site_user'@'localhost' IDENTIFIED BY 'atv123';
GRANT CREATE, INSERT, SELECT ON site_php.* TO 'site_user'@'localhost';
FLUSH PRIVILEGES;


35- USE site_php;

36- CREATE TABLE mensagens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  mensagem TEXT,
  data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

37- exit;
---Teste para o banco de dados---
38- mysql -u site_user -p site_php

39-INSERT INTO mensagens (nome, email, mensagem) VALUES ('Teste', 'teste@email.com', 'Olá do PHP!');
40-SELECT * FROM mensagens;


41- sudo apt install libapache2-mod-php php-mysql -y
42- sudo a2enmod php8.3
43- sudo systemctl restart apache2
