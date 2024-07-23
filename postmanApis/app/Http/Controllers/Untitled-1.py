dd={1:"sd",2:'sdc'}
# print(sorted(dd.items(),reverse=True))
names =["Mary","John","Emma"]
heights =[180,165,170]
d={}
for i in range(len(heights)):
    d[heights[i]]=names[i]
dd={}
for i in range(len(heights)):
    dd[names[i]]=heights[i]

print(dd)
r=sorted(d.items(),reverse=True)
arr=[]
# for i in r:
#     arr.append(r[i])
for i in range(len(r)):
    arr.append(r[i][1])
print(arr)