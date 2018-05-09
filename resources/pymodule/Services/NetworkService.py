from keras.models import load_model
from PIL import Image
import numpy as np
import cv2

def loadNetworks():
	keypointsNet = './Networks/my_model.h5'
	faceNet = './Networks\haarcascade_frontalface_default.xml'
	model = load_model(keypointsNet)
	face_model = cv2.CascadeClassifier(faceNet)
	return model,face_model

def getFaces(image,face_model):
	return face_model.detectMultiScale(image, 1.25, 6)
	
def getKeypoints(images,model):
	images = np.array(images)
	return model.predict(images)