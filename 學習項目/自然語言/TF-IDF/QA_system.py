#!/usr/bin/env python
# coding: utf-8

# In[1]:


get_ipython().system('pip install jieba')


# In[2]:


import jieba
import numpy as np
import pandas as pd


# In[3]:


questions = ["中國的首都是哪裡？", 
             "誰是《紅樓夢》的作者？", 
             "日本的首都是哪裡？", 
             "世界上最長的河流是什麼？", 
             "世界上最高的山峰是哪座？", 
             "誰是中國古代的哲學家兼思想家？", 
             "誰是中國古代的第一位皇帝？", 
             "誰是《論語》的作者？", 
             "中國的四大發明之一是什麼？", 
             "世界上最大的洲是哪個？"]

answers = ["北京", 
           "曹雪芹", 
           "東京", 
           "尼羅河", 
           "珠穆朗瑪峰", 
           "孔子", 
           "秦始皇", 
           "孔子", 
           "指南針", 
           "亞洲"]


df = pd.DataFrame({"Question": questions, "Answer": answers})

df_question = df[["Question", "Answer"]].copy()  #複製Dataset
# df_question.drop_duplicates(inplace=True)  # 丟掉重複的資料
df_question


# In[4]:


all_terms = []

#收集字詞
def preprocess(item):
    terms = [t for t in jieba.cut(item, cut_all=False)]  #全切分模式
    all_terms.extend(terms)
    return terms

#處理題庫中的Q
df_question["Question2"] = df_question["Question"].apply(preprocess)
df_question.head()


# In[5]:


# 建立termindex
termindex = list(set(all_terms))  #set將list中重複的部分去除
print(termindex)


# In[6]:


# IDF 處理
Doc_Length = len(df_question)
Idf_vector = []

for term in termindex:
    num_of_doc = 0
    for terms in df_question["Question2"]:
        if term in terms:
            num_of_doc += 1
    idf = np.log(Doc_Length/num_of_doc)
    Idf_vector.append(idf)


# In[7]:


# TF 處理
def terms_vector(terms):
    vector = np.zeros_like(termindex, dtype=np.float32)
    for term in terms:
        if term in termindex: #尋找第一次出現的字詞
            idx = termindex.index(term)
            vector[idx] += 1  #計算term frequency
    vector = vector * Idf_vector #建立TF-IDF向量
    return vector

df_question["Q_vector"] = df_question["Question2"].apply(terms_vector)
df_question


# In[8]:


#cosine相似度
from numpy.linalg import norm

def cosine_similarity(vector1, vector2):
    score = np.dot(vector1, vector2)  / (norm(vector1) * norm(vector2))
    return score


# In[9]:


#QA搜索引擎
def FAQsystem(testing_sentence, return_num=1):
    testing_vector = terms_vector(preprocess(testing_sentence)) #處理使用者的問題
    score_dict = {}  #紀錄Q題庫和使用者Q的cosine分數
    for idx, vec in enumerate(df_question['Q_vector']):
        score = cosine_similarity(testing_vector, vec)
        score_dict[idx] = score
    idxs = np.array(sorted(score_dict.items(), key=lambda x:x[1], reverse=True))[:return_num, 0]  
    #排序出最相關的前N個問題
    return df_question.loc[idxs, ["Question", "Answer"]]


# In[11]:


question = ("日本首都?")
FAQsystem(question)

