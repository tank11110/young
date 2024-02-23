#!/usr/bin/env python
# coding: utf-8

# In[1]:


import numpy as np
import pandas as pd

from sklearn import tree
from sklearn.model_selection import train_test_split
from sklearn.metrics import confusion_matrix, accuracy_score, precision_score, recall_score, f1_score,classification_report

import matplotlib.pyplot as plt
import seaborn as sns


# In[2]:


# 讀取資料
df_train=pd.read_csv("C:/Users/young/OneDrive/桌面/side_project/train.csv")

feature_names = df_train.iloc[:,:-1].columns.tolist()

df_train


# In[3]:


# 切割訓練、測試資料
X=df_train.iloc[:,:-1].values #從第一行取到倒數第二行
y=df_train.iloc[:,-1].values #取倒數第一行
X_train,X_test,y_train,y_test = train_test_split(X,y,test_size=0.2,random_state=0)


# In[4]:


from sklearn.tree import DecisionTreeRegressor
from sklearn.model_selection import GridSearchCV
dt_regressor = DecisionTreeRegressor()

# 定義參數的範圍
param_grid = {
    'random_state':[1,3,5,7,9],
    'max_depth': [None,3,5,7,9],
    'min_samples_split': [2,3,5],
    'min_samples_leaf': [2,3,5]
}

grid_search = GridSearchCV(dt_regressor, param_grid, cv=5, scoring='neg_mean_squared_error')
grid_search.fit(X_train, y_train)

print("最佳參數組合:", grid_search.best_params_)

# 使用最佳模型預測測試集
# GS_tree=grid_search.best_estimator_.score(X_train,y_train)
# print("決策樹_train_score",GS_tree)


# In[5]:


# 最佳參數 Tree
B_tree=tree.DecisionTreeClassifier(criterion='gini',min_samples_leaf = 5,
                                   min_samples_split=2,random_state=7)
B_tree.fit(X_train,y_train)
print("tree score",B_tree.score(X_train,y_train))
print("")
feature_importance = B_tree.feature_importances_
feature_importance_dict = dict(zip(feature_names, feature_importance))
print("特徵重要程度：")
for feature, importance in sorted(feature_importance_dict.items(), key=lambda x: x[1], reverse=True):
    print(f"{feature}: {importance:.4f}")


# In[6]:


# 決策樹模型視覺化

import graphviz

dot_data = tree.export_graphviz(B_tree,
                                feature_names=feature_names,class_names=['0','1','2','3'],
                                out_file=None,filled=True,rounded=True)
graph=graphviz.Source(dot_data)
graph


# In[7]:


# 預測測試集
# y_pred = grid_search.best_estimator_.predict(X_test)
y_pred = B_tree.predict(X_test)


# In[8]:


# 預測結果

result = pd.DataFrame({'y_test': y_test.squeeze(), 'y_Pred': y_pred.squeeze()})

num_columns=len(result)
equal = 0
for index, row in result.iterrows():
    if row['y_test'] == row['y_Pred']:
        equal+=1

print("預測成功：",equal,"筆")
print("預測準確率：",equal/num_columns)
print("")

result


# In[9]:


# 均方誤差

from sklearn.metrics import mean_squared_error

mse = mean_squared_error(y_test, y_pred,squared=False)
print("均方誤差（MSE）:", mse)


# In[10]:


# Over fitting驗證

import matplotlib.pyplot as plt
test=[]
for i in range(1,20):
    DS_test=tree.DecisionTreeRegressor(max_depth=i,random_state=10)
    DS_test.fit(X_train,y_train)
    train_score=DS_test.score(X_train,y_train)
    test_score=DS_test.score(X_test,y_test)
    test.append([i,train_score,test_score])

test=pd.DataFrame(data=test)
plt.plot(test[0],test[1],label="train_score")
plt.plot(test[0],test[2],label="test_score")
plt.legend
plt.show


# In[11]:


from sklearn.metrics import confusion_matrix, accuracy_score, precision_score, recall_score, f1_score,classification_report

print("Accuracy:", accuracy_score(y_test, y_pred))
print("")
print("Classification Report:")
print(classification_report(y_test, y_pred))


# In[13]:


import matplotlib.pyplot as plt
import seaborn as sns
conf_matrix = confusion_matrix(y_test, y_pred)

# 視覺化混淆矩陣
plt.figure(figsize=(8, 6))
sns.heatmap(conf_matrix, annot=True, fmt='d', cmap='Blues', xticklabels=B_tree.classes_, yticklabels=B_tree.classes_)
plt.xlabel('Predicted')
plt.ylabel('True')
plt.title('Confusion Matrix')
plt.show()


# In[14]:


# 預測 test.csv結果

df_test=pd.read_csv("C:/Users/young/OneDrive/桌面/side_project/test.csv")
test=df_test.iloc[:,1:].values
print("總共：",len(test),"筆")
test_pred = B_tree.predict(test)

test_result = pd.DataFrame({'test': test_pred.squeeze()})
test_result


# In[ ]:




