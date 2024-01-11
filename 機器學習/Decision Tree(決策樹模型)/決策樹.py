#!/usr/bin/env python
# coding: utf-8

# In[1]:


import numpy as np
import pandas as pd


# In[2]:


names=['age','work-class','fnlwgt','education','educatio-num','marital-status',
      'occupation','relationship','race','sex','capital-gain','capital-loss',
      'hours-per-week','native-country','income']
data=pd.read_csv("C:/Users/young/OneDrive/桌面/個人/機器學習/決策樹/adult.csv",header=None,names=names)
df=data[['age','sex','hours-per-week','education','income']]
data.info()
data.describe()
df.head()


# In[3]:


pip install -U scikit-learn scipy matplotlib


# In[4]:


from sklearn import tree
data_dummies=pd.get_dummies(df,drop_first=True) #dummies把類別轉成數值
X=data_dummies.iloc[:,:-1].values
y=data_dummies.iloc[:,-1].values
DS_tree=tree.DecisionTreeClassifier(criterion='gini',random_state=1,max_depth=5)
DS_tree=DS_tree.fit(X,y)


# In[5]:


DS_tree.score(X,y)


# In[6]:


pip install graphviz


# In[7]:


import graphviz
feature_names = data_dummies.columns.tolist()
dot_data = tree.export_graphviz(DS_tree,
                                feature_names=len1,class_names=['income_ >50K','income_ <=50K'],
                                out_file=None,filled=True,rounded=True)
graph=graphviz.Source(dot_data)
graph






