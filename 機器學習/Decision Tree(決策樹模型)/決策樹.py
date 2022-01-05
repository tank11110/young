#!/usr/bin/env python
# coding: utf-8

# In[1]:


import numpy as np
import pandas as pd
import matplotlib.pyplot as plt


# In[6]:


names=['age','work-class','fnlwgt','education','educatio-num','marital-status',
      'occupation','relationship','race','sex','capital-gain','capital-loss',
      'hours-per-week','native-country','income']
data=pd.read_csv("C:/Users/young/Desktop/機器學習/決策樹/adult.csv",header=None,names=names)
df=data[['age','sex','hours-per-week','education','income']]
data.info()
data.describe()
df.head()


# In[17]:


from sklearn.tree import DecisionTreeClassifier
data_dummies=pd.get_dummies(df,drop_first=True) #dummies把類別轉成數值
X=data_dummies.iloc[:,:-1].values
y=data_dummies.iloc[:,-1].values
tree=DecisionTreeClassifier(criterion='gini',random_state=1,max_depth=5)
tree.fit(X,y)


# In[ ]:




