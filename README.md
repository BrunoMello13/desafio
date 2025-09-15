Passo a passo para funciamento do desafio no terminal Ubuntu da AWS sandbox (Copie por numero)
1- sudo apt update && sudo apt upgrade -y 
2- sudo apt install -y apache2 wget php-fpm php-mysql php-json php php-dev 
3- sudo apt install -y mariadb-server 
4- sudo systemctl start apache2 
5- sudo systemctl enable apache2 
6- systemctl is-enabled apache2 

7- sudo usermod -a -G www-data $USER 
8-  groups 
9-  sudo chown -R $USER:www-data /var/www 
10- sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;  
11- find /var/www -type f -exec sudo chmod 0664 {} \; 


Iniciar e configurar MariaDB (sera necessario criar uma senha nova aperte enter, digite y quando for pedido e crie a senha quando solicitado)
12- sudo systemctl start mariadb 
13- sudo mysql_secure_installation 


---Ativar HTTPS com certificado self-signed ---
14- sudo apt install -y openssl 
15- sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \ 
-keyout /etc/ssl/private/apache-selfsigned.key \ 
-out /etc/ssl/certs/apache-selfsigned.crt 
16- sudo systemctl restart apache2 


17- sudo apt install -y php-mbstring php-xml 
18- sudo systemctl restart apache2 
19- sudo systemctl restart php8.3-fpm 

--- Puxar projeto do git---
20- sudo apt install -y git 

21- cd /var/www/html 
22- sudo git clone https://github.com/BrunoMello13/desafio.git 

23- sudo chown -R www-data:www-data /var/www/html/desafio 
24- sudo chmod -R 755 /var/www/html/desafio 

25- sudo apt install -y openssl 

26- sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \ 
-keyout /etc/ssl/private/apache-selfsigned.key \ 
-out /etc/ssl/certs/apache-selfsigned.crt 



27- sudo apt update  
28- sudo apt install -y openssl 

29- sudo a2enmod ssl 
30- sudo a2ensite default-ssl 

31- sudo chown -R www-data:www-data /var/www/html/desafio
32- sudo chmod -R 755 /var/www/html/desafio

33- sudo systemctl restart apache2
34- sudo systemctl restart php8.3-fpm

--- Organizar bancos de dados---

35- sudo mysql -u root -p

36- CREATE DATABASE site_php;

(comando no BANCO DE DADOS)
CREATE USER 'site_user'@'localhost' IDENTIFIED BY 'atv123';
GRANT CREATE, INSERT, SELECT ON site_php.* TO 'site_user'@'localhost';
FLUSH PRIVILEGES;


37- USE site_php;

38- CREATE TABLE mensagens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  mensagem TEXT,
  data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

39- exit;
---Teste para o banco de dados---
40- mysql -u site_user -p use site_php

41-INSERT INTO mensagens (nome, email, mensagem) VALUES ('Teste', 'teste@email.com', 'Olá do PHP!');
42-SELECT * FROM mensagens;

43- exit;
44- sudo apt install libapache2-mod-php php-mysql -y
45- sudo a2enmod php8.3
46- sudo systemctl restart apache2
