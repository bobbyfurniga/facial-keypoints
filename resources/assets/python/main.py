from tensorflow.python.tools import freeze_graph
from keras.models import load_model
from PIL import Image
import numpy as np
import cv2
import matplotlib.pyplot as plt

jpgfile = Image.open("Images/main-cropped2.jpg")
image = np.array(jpgfile)
gray = cv2.cvtColor(image, cv2.COLOR_RGB2GRAY)
[x,y,w,h] = [0,0,96,96]

image_with_detections = np.copy(image)
cv2.rectangle(image_with_detections, (x,y), (x+w,y+h), (255,0,0), 3)

face_region = gray[y:y+h,x:x+w]
resized_face_region = cv2.resize(face_region, (96, 96))
reshape_img = np.reshape(resized_face_region, (96,96,1)) / 255


predicted_points=[]
predicted_points.append(reshape_img)
predicted_points = np.array(predicted_points)

#TODO define path 
path ='face_model2.h5' # 'Networks/my_model.h5'
model = load_model(path, compile=False)
#gray array of 96x96
res = model.predict(predicted_points)
print(res)

pts_x = res[0][0::2] #* w/2 + w/2+x  # odd 
pts_y = res[0][1::2] #* h/2 + h/2+y  # even
print(pts_x)l
# Open the Display
# fig = plt.figure(figsize = (10, 10))
# ax1 = fig.add_subplot(111)
# ax1.set_xticks([])
# ax1.set_yticks([])

# ax1.scatter(pts_x,pts_y, marker='o', c='lawngreen', s=10) 
# ax1.set_title('Image with Face Detection')
# ax1.imshow(image)

for i in range(0,len(pts_x)-1):
	cv2.circle(image_with_detections,(int(pts_x[i]),int(pts_y[i])),1,(0,0,255),1) # draw circle
plt.imshow(image_with_detections, cmap='gray')

plt.show()