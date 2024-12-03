import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="SiteTemperature_HT_EB"
)

print(mydb)
print("Fin")