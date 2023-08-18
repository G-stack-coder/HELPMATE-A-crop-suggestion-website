
import pandas as pd
from pandas import DataFrame
import numpy as np
from sklearn.metrics import classification_report
from sklearn import metrics
from joblib import Parallel, delayed
import pickle
import sys
from sklearn.naive_bayes import GaussianNB
from sklearn.model_selection import train_test_split
from sklearn.model_selection import cross_val_score



model = pickle.load(open("D:/xampp/htdocs/HELPMATE/Models/TrainedModels/randomforest.pickle", "rb"))
# crop = dTree.predict(inp)


months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC']
reqMonths = []

ph = int(sys.argv[1])
npk = sys.argv[2]
n,p,k = npk.split(':')
n = int(n)
p = int(p)
k = int(k)
state = sys.argv[3]
district = sys.argv[4]
smonth = (sys.argv[5])
emonth = (sys.argv[6])

smonth = smonth.upper()
emonth = emonth.upper()


flag = 0
for x in months:
    if flag==1:
        reqMonths.append(x)
    if(x == smonth):
        reqMonths.append(x)
        flag =1 
    elif(x == emonth):
        reqMonths.append(x)
        flag = 0
        break


df = pd.read_csv("D:/xampp/htdocs/HELPMATE/Models/Data/pastDataRainfall3.csv")
df = df[df['INDIAN_STATES_NAME'] == state]
df = df[df['DISTRICTS_NAME'] == district]

avgRfall = []



for x in reqMonths:
    df2 = df.loc[df['X.DATE']==x]
    rfalls = df2['VALUE'].tolist()
    for vals in rfalls:
        avgRfall.append(vals)
avg_temp_calc = 70
avg_hum_calc = 26
rfall = sum(avgRfall) / len(avgRfall)

# print(rfall)

#print(n,p,k,ph,rfall)



data = np.array([[n,p ,k, avg_hum_calc,avg_temp_calc, ph,rfall]])

crop = model.predict(data)
#print("dfv")
#crop = crop[0]
print(crop[0])

