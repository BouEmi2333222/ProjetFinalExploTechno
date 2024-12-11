sudo systemctl start mysql
sudo systemctl start apache2
xterm -e "cd basic; php yii serve"&
python ProjetFinal.py