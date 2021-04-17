#!/usr/bin/python

DB_NAME = "gisdb"
DB_USER = "postgres"
DB_PASS = "postgres"

import psycopg2
import json
import pandas as pd
import numpy as np
from scipy.cluster.hierarchy import dendrogram, fcluster
from scipy.cluster import hierarchy

#tersambung ke database postgresql
conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS)
cur = conn.cursor()

#perintah sql
cur.execute("SELECT jml_faskes, jml_kasus, jml_rumahts, jml_kp FROM data_kriterias where tahun_id=0;")

#mengambil data
dataset = cur.fetchall()
df = pd.DataFrame(dataset, columns=["jml_faskes", "jml_kasus", "jml_rumahts", "jml_kp"])

#data di normalisasi dengan metode rasio
total_faskes = df['jml_faskes'].sum()
total_kasus = df['jml_kasus'].sum()
total_rumahts = df['jml_rumahts'].sum()
total_kp = df['jml_kp'].sum()
for ind, row in df.iterrows():
  df.loc[ind,"jml_faskes"] = 1 - (row['jml_faskes'] / total_faskes)
  df.loc[ind, "jml_kasus"] = row['jml_kasus'] / total_kasus
  df.loc[ind, "jml_rumahts"] = row['jml_rumahts'] / total_rumahts
  df.loc[ind, "jml_kp"] = row['jml_kp'] / total_kp

#melihat data normalisasi
Z = hierarchy.linkage(df, 'centroid')
numpy_data = np.array(fcluster(Z, t=3, criterion='maxclust'))
hasil = pd.concat([df, pd.DataFrame({'cluster':numpy_data})], axis=1)

for ind, row in hasil.iterrows():
    hasil.loc[hasil['cluster'] == 1 , 'kategori'] = 'Rendah' 
    hasil.loc[hasil['cluster'] == 2 , 'kategori'] = 'Sedang' 
    hasil.loc[hasil['cluster'] == 3 , 'kategori'] = 'Tinggi' 

# print(hasil)
json = hasil.to_json(orient='records')
print(json)

cur.close()
conn.close()