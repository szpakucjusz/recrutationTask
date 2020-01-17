To make this project simplier for technician guy docker-compose.yml has direct passwords.
I assumed that somebody used this project works with unix systems. If not and You have problems with configure, please contact with me.
To start project correctly first time:
1. Install docker and needed dependencies https://docs.docker.com/install/
2. Next copy env.example as .env. (this case You don't need change anything
3. Go to project directory and type "docker-compose build" or "sudo docker-compose build".
4. After all is done type: "docker-compose start"
5. Go to the project directory and type:
bash deployprod.sh

Typical workflow. Go to project directory and type:
1. docker-compose start
2. bash deployprod.sh
