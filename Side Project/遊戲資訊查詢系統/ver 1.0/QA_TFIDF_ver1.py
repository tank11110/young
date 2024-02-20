#!/usr/bin/env python
# coding: utf-8

# In[1]:


import jieba
import numpy as np
import pandas as pd


# In[2]:


csv_path='C:/Users/young/OneDrive/桌面/QAlist.csv'
df = pd.read_csv(csv_path)
df_process = df.copy()
df_process.head()


# In[3]:


all_terms = []

#收集字詞
def preprocess(item):
    terms = [t for t in jieba.cut(item, cut_all=False)]  #全切分模式
    all_terms.extend(terms)
    return terms

#處理題庫中的Q
df_process["title_process"] = df_process["title"].apply(preprocess)
df_process.head()


# In[4]:


# 建立termindex
termindex = list(set(all_terms))  #set將list中重複的部分去除


# In[5]:


# IDF 處理
Doc_Length = len(df_process)
Idf_vector = []

for term in termindex:
    num_of_doc = 0
    for terms in df_process["title_process"]:
        if term in terms:
            num_of_doc += 1
    idf = np.log(Doc_Length/num_of_doc)
    Idf_vector.append(idf)


# In[6]:


# TF 處理
def terms_vector(terms):
    vector = np.zeros_like(termindex, dtype=np.float32)
    for term in terms:
        if term in termindex: #尋找第一次出現的字詞
            idx = termindex.index(term)
            vector[idx] += 1  #計算term frequency
    vector = vector * Idf_vector #建立TF-IDF向量
    return vector

df_process["vector"] = df_process["title_process"].apply(terms_vector)
df_process


# In[7]:


#cosine相似度
from numpy.linalg import norm

def cosine_similarity(vector1, vector2):
    score = np.dot(vector1, vector2)  / (norm(vector1) * norm(vector2))
    return score


# In[8]:


#QA搜索引擎
def FAQsystem(testing_sentence, return_num=3):
    testing_vector = terms_vector(preprocess(testing_sentence)) #處理使用者的問題
    score_dict = {}  #紀錄Q題庫和使用者Q的cosine分數
    for idx, vec in enumerate(df_process['vector']):
        score = cosine_similarity(testing_vector, vec)
        score_dict[idx] = score
    idxs = np.array(sorted(score_dict.items(), key=lambda x:x[1], reverse=True))[:return_num, 0]  
    #排序出最相關的前N個問題
    return df_process.loc[idxs, ["title", "content"]]


# In[9]:


question = input("請輸入想搜尋的內容：")
print("相關的搜尋結果：")
FAQsystem(question)


# In[ ]:




