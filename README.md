# servicio
•	Assurez-vous d'avoir Docker Desktop et Git installés sur votre ordinateur.
•	Cloner le projet depuis le dépôt Git.
•	Tout d'abord, vous devez récupérer le projet en clonant le dépôt Git. Pour cela, ouvrez votre terminal (ou Git Bash) et exécutez la commande suivante :
git clone https://github.com/fabien1981/servicio.git
Cela va télécharger le projet sur votre machine.
•	Se rendre dans le dossier du projet.
Une fois le projet cloné, vous devez naviguer dans le dossier du projet pour y travailler. Utilisez la commande suivante pour entrer dans le répertoire du projet :
cd servicio
•	Construire les conteneurs
Maintenant, nous devons construire les conteneurs Docker qui contiendront les différentes 
parties de l'application (PHP, MySQL). Exécutez la commande suivante :
docker-compose build
Cette commande va créer les images nécessaires pour les conteneurs.
•	Vérifier que les conteneurs sont bien en cours d'exécution
Vérifiez que tout fonctionne correctement en vérifiant l'état des conteneurs. Utilisez la commande suivante :
docker ps
•	Ouvrir l'application dans votre navigateur
Une fois que les conteneurs sont démarrés et fonctionnent, ouvrez votre navigateur et allez à l'adresse suivante :
http://localhost:8080

