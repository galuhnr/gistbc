#!/usr/bin/python

DB_NAME = "gisdb"
DB_USER = "postgres"
DB_PASS = "postgres"

import psycopg2
import json
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.datasets import load_boston
from scipy import stats
from scipy.cluster.hierarchy import dendrogram, fcluster
from scipy.cluster import hierarchy
from sklearn.metrics import silhouette_samples, silhouette_score

#tersambung ke database postgresql
conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS)
cur = conn.cursor()

#perintah sql
cur.execute("SELECT jml_faskes, jml_kasus, jml_rumahts, jml_kp FROM data_kriterias where tahun_id=0 order by kecamatan_id asc;")

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

#preprosesing cek correlation 
correlation = abs(df.corr())
# correlation.plot(kind='bar')
# plt.show()

#menampilkan nilai korelasi
# print(correlation)

#cek outlier dan menampilkan data yang oulier terletak dikolom mana
df_1 = df[['jml_faskes', 'jml_kasus', 'jml_rumahts', 'jml_kp']]
# ax = sns.boxplot(data=df_1, orient="h")
# plt.show()

def detect_outliers(dx, x):
    Q1 = dx[x].describe()['25%']
    Q3 = dx[x].describe()['75%']
    IQR = Q3-Q1
    return dx[(dx[x] < Q1-1.5*IQR) | (dx[x] > Q3+1.5*IQR)]

#menampilkan data yang outlier
print(detect_outliers(df,'jml_kasus'))

#menampilkan titik titik data outlier dikolom kasus
ax = sns.boxplot(x=df["jml_kasus"])
plt.show()

#data normalisasi
Z = hierarchy.linkage(df, 'centroid')
numpy_data = np.array(fcluster(Z, t=3, criterion='maxclust'))
hasil = pd.concat([df, pd.DataFrame({'cluster':numpy_data})], axis=1)

for ind, row in hasil.iterrows():
    hasil.loc[hasil['cluster'] == 1 , 'kategori'] = 'Rendah' 
    hasil.loc[hasil['cluster'] == 2 , 'kategori'] = 'Sedang' 
    hasil.loc[hasil['cluster'] == 3 , 'kategori'] = 'Tinggi' 

# data nama kecamatan
cur.execute("SELECT nama_kecamatan from kecamatans order by id_kecamatan asc;")
datakec = cur.fetchall()
kec = pd.DataFrame(datakec, columns=["nama_kecamatan"])

data_new = pd.concat([kec,hasil], axis=1)
# print(data_new)

#json = data_new.to_json(orient='records')
# print(json)

# cluster analys dgn silhouette
#cek avg keseluruhan kluster
nilai_silhouette= silhouette_score(df,numpy_data)

#cek silhouette tiap data
sample_silhouette = silhouette_samples(df,numpy_data)

num_clust = [1,2,3]
list_mean = []

#cek tiap kluster 1,2,3 cara1
for n_clusters in num_clust:
      list_mean.append(sample_silhouette[n_clusters==numpy_data].mean())

# print(list_mean)

#cek tiap kluster 1,2,3 cara2
dataframe = pd.DataFrame(sample_silhouette, columns=['silhouette'])
datas = pd.DataFrame(numpy_data, columns=['cluster'])
dataxx = pd.concat([datas,dataframe], axis=1)
for n_cluster in num_clust:
      means = dataxx[(dataxx['cluster']==n_cluster)].mean()
      # print(means)

cur.close()
conn.close()