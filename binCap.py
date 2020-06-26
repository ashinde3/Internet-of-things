#!/usr/bin/env python
import mysql.connector
import urllib2
import time

db = mysql.connector.connect(host='localhost',    # your host, usually localhost
                     user='root',         # your username
                     password='',  # your password
                     database='swm')        # name of the data base


cur = db.cursor()
while 1:
    response = urllib2.urlopen("http://192.168.0.14/") #ip address fetched from arduino code
    page_source = response.read()
    id = page_source.split('|')[0]
    distance = page_source.split('|')[1]
    intdist = int(distance)
    if (19-intdist)<0:
        level=0
    else:
        level = str((100.0*(float)(18-intdist))/18.0)
    try:
        cur.execute("""UPDATE bins set bins_cap_fill = %s where bins_id = %s""",(level, id))
        db.commit()
        print("Data Commited")
        print(level)
        print(intdist)

    except:
        print("Rollback")
    time.sleep(10)

db.close()

