Typical portfolio project. Base Laravel way. Docker environment. Only backend + simple script in js. 
I didn't make a correct frontend here yet. 
I assumed that somebody used this project works with unix systems. If not and You have problems with configure, 
please contact with me.
To make this project simplier for recrutation purposes docker-compose.yml has passwords inside.
To start project correctly first time:
1. Install docker and needed dependencies https://docs.docker.com/install/
2. https://docs.docker.com/compose/install/
3. For recrutation purposes I added .env file to git project. 
4. Go to project directory and type "docker-compose up --build -d" or "sudo docker-compose up --build -d".
5. type: "bash deployprod.sh" or "sudo bash deployprod.sh" (typing sudo it's bad but only for recrutating purposes).
6. docker exec -it app-recrutation-blog php artisan storage:link
7. App should work on 127.0.0.1:82

Typical workflow. Go to project directory and type:
1. docker-compose start
2. bash deployprod.sh

Main feature to check:
app/Http/Controllers/TaskController.php method store
