import cv2
import numpy as np
import matplotlib.pyplot as plt

def processInputImage(image):
	#Make gray image
	#https://docs.opencv.org/2.4/modules/imgproc/doc/miscellaneous_transformations.html
	#color = 0.299*R+0.587*G+0.114*B
	gray = cv2.cvtColor(image, cv2.COLOR_RGB2GRAY)	

def preProcessFaces(faces,gray):
	face_rectangles = [] #Bounding boxes, maybe i'll need them
	predicted_faces = []
	for (x,y,w,h) in faces:
		face_rectangles.append([(x,y),(x+w,y+h)])	
		face = gray[y:y+h, x:x+w] #Ia doar regiunea		
		resized_face = cv2.resize(face, (96, 96)) #Elimina a 3a dimensiune
		reshaped_face = np.reshape(resized_face, (96,96,1)) / 255 #Adauga o dimensiune in plus si muta pe [0,1] imaginea
		predicted_faces.append(reshaped_face) #Add the face to the faces list
	return predicted_faces

def drawResults(predicted_points,faces,image):
	fig = plt.figure(figsize = (10, 10))
	ax1 = fig.add_subplot(111)
	ax1.set_xticks([])
	ax1.set_yticks([])
	#image2 = image
	for i in range(len(faces)):
		x,y,w,h = faces[i]
		cv2.rectangle(image, (x,y), (x+w,y+h), (255,0,0), 3)# Add a red bounding box to the detections image
		x_ax = predicted_points[i][0::2] * w/2 + w/2 + x # odd 
		y_ax = predicted_points[i][1::2] * h/2 + h/2 + y # even
		#for j in range(0,14):
		#	cv2.circle(image2,(int(x_ax[j]),int(y_ax[j])),10,(0,0,255),1) # draw circle
		ax1.scatter(x_ax,y_ax, marker='o', c='lawngreen', s=10) 
	ax1.set_title('Image with Face Detection')
	ax1.imshow(image)	
	#plt.imshow(image2, cmap='gray')
	plt.show()