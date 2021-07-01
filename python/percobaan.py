import json
import pandas as pd
import numpy as np
from scipy.cluster.hierarchy import dendrogram, fcluster
from scipy.cluster import hierarchy

coba = [[54,156],[57,155],[92,189],[50,154],[90,197]]

df = pd.DataFrame(coba, columns=["BB","TB"])

total_bb= df['BB'].sum()
total_tb = df['TB'].sum()

for ind, row in df.iterrows():
  df.loc[ind, "BB"] = row['BB'] / total_bb
  df.loc[ind, "TB"] = row['TB'] / total_tb

# #melihat data normalisasi
Z = hierarchy.linkage(df, 'centroid')
numpy_data = np.array(fcluster(Z, t=2, criterion='maxclust'))
hasil = pd.concat([df, pd.DataFrame({'cluster':numpy_data})], axis=1)

for ind, row in hasil.iterrows():
    hasil.loc[hasil['cluster'] == 1 , 'kategori'] = 'Rendah' 
    hasil.loc[hasil['cluster'] == 2 , 'kategori'] = 'Sedang' 
    hasil.loc[hasil['cluster'] == 3 , 'kategori'] = 'Tinggi' 

print(Z)