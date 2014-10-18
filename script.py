import dhtreader,re,MySQLdb,BDD

TYPE = 22
PIN = 4

mesures = None

while mesures is None:
	dhtreader.init()
	mesures = re.findall("[0-9]{2}\.[0-9]{1}",str(dhtreader.read(TYPE, PIN)))
	
temperature = mesures[0]
humidite = mesures[1]

db = MySQLdb.connect(HOTE,DB, LOGIN, PASS)

cursor = db.cursor()

cursor.execute("INSERT INTO historique(entite,valeur)VALUES ('Tint',"+temperature+" ),('Hint',"+humidite+")")

db.commit()
db.rollback()
db.close()

		


