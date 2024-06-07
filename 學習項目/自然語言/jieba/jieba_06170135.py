import jieba
import jieba.posseg as pseg
sen='楓之谷伺服器每週例行維護時間是什麼時候呢?'
print("輸入："+sen)
words = jieba.cut(sen, cut_all=False)
print("分詞結果：")
print(' '.join(words))
