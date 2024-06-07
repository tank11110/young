#!/usr/bin/env python
# coding: utf-8

# In[1]:


import numpy as np
import pandas as pd
from sklearn.datasets import load_iris

iris = load_iris()

feature = pd.DataFrame(iris['data'],columns=iris['feature_names'])
target = pd.DataFrame(iris['target'],columns=['class'])

data = pd.concat([feature,target],axis=1)
df = data[data['class'] != 2]


# In[6]:


import matplotlib.pyplot as plt
import seaborn as sns
plt.style.use('ggplot')
g = sns.FacetGrid(df,hue='class',size=5)
g.map(plt.scatter,"sepal length (cm)","sepal width (cm)")
g.add_legend()


# In[3]:


#標準化
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler

X=df.iloc[:,:2].values
y=df.iloc[:,4].values

sc = StandardScaler()
sc.fit(X)
X_std = sc.transform(X)


# In[4]:


from sklearn.linear_model import LogisticRegression
from matplotlib.colors import ListedColormap

lr = LogisticRegression(C=100.0,random_state=1)
lr.fit(X_std,y)
r_squared = lr.score(X,y)
r_squared_std = lr.score(X_std,y)

print(lr.coef_) #印出係數
print(lr.intercept_)  #印出截距
print(r_squared_std) #score







