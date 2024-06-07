#!/usr/bin/env python
# coding: utf-8

# In[1]:


import requests

def get_token():
	url=" https://account.kkbox.com/oauth2/token"

	headers={
		"Content-Type": "application/x-www-form-urlencoded",
		"Host": "account.kkbox.com"
	}

	data={
		"grant_type":"client_credentials",
		"client_id":"***************", #輸入ID
		"client_secret":"***************" #輸入Secret
	}

	access_token=requests.post(url,headers=headers,data=data)
	return access_token.json()["access_token"]
item["id"],item["title"]


# In[5]:


def get_data():

    access_token=get_token()
    
    url="https://api.kkbox.com/v1.1/charts"
    
    headers={
        
        "Authorization": "Bearer "+ access_token
    }
    
    params={
        "territory":"TW"
    }
    
    response=requests.get(url,headers=headers,params=params)
    result=response.json()["data"]
    for item in result:
        print(item)
        
get_data()


# In[3]:


def get_songs():
    access_token=get_token()
    
    url="https://api.kkbox.com/v1.1/charts/LZPhK2EyYzN15dU-PT/tracks"
    
    headers={
        "Authorization": "Bearer "+ access_token
    }
    params={
        "territory":"TW"
    }
    
    response=requests.get(url,headers=headers,params=params)
    result=response.json()["data"]
    for item in result:
        print(item["name"],item["url"])
        
get_songs()


# In[4]:


def get_data():

    access_token=get_token()
    
    url="https://api.kkbox.com/v1.1/charts"
    
    headers={
        
        "Authorization": "Bearer "+ access_token
    }
    
    params={
        "territory":"TW"
    }
    
    response=requests.get(url,headers=headers,params=params)
    result=response.json()["data"]
    for item in result:
        print(item)
        
get_data()





