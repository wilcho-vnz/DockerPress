# DockerPress

Docker configuration to create WordPress themes.
Docker services:
- Wordpress
- MySQL
- Mailhog

### Getting Started
```bash
git clone https://github.com/wilcho-vnz/dockerpress.git
cd dockerpress
cp .env.example .env
composer install # available plugins ( optional )
docker-compose up
```
### How to catch emails with MailHog
The file mailhog.php included in this repo allows you to test mails sending, so you can use Contact From 7 plugin for example, to send test mails.

### How to access Mailhog UI
With the container up you can access the Mailhog UI in:
- http://localhost:8025/

**NOTE:** This use the port set in you .env file

### Local Database Backup
Here's how to dump your local database with Docker into a `.sql` file
```bash
docker exec -it dockerpress_db_1 /usr/bin/mysqldump -u username -ppassword database_name > backup.sql
```

### Local Database Restore
Restore a previous database backup
```bash
docker exec -i dockerpress_db_1 /usr/bin/mysql -u username -ppassword database_name < backup.sql
```
### How to solve possible errors when you try to startup the container

**Error:**
MySQL Connection Error: (1130) Host '172.31.0.4' is not allowed to connect to this MariaDB server

**Solution;**
Delete the .data folder

 ### Author
Wilhelm Siso [@wilcho\_](https://twitter.com/wilcho_)

---
MIT
