import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="SiteTemperature_HT_EB"
)

mycursor = mydb.cursor()

sql = "INSERT INTO Temperature (tempCelc, tempFahr, tempKelv) VALUES (%s, %s, %s, %s)"
val = (69, 69, 69)
mycursor.execute(sql, val)
print("Fin")