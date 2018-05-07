from PIL import Image
import numpy as np
import cv2
from Services.NetworkService import loadNetworks
from Services.NetworkService import getFaces
from Services.NetworkService import getKeypoints
from Services.ImageProcessor import preProcessFaces
from Services.ImageProcessor import drawResults

class NetworkApi:
	def __init__(self):
		[self.model,self.face_cascade] = loadNetworks()

	def feedImage(self,image):
		self.inputImage = image;
		self.grayImage = cv2.cvtColor(image, cv2.COLOR_RGB2GRAY)	

	def fetchFaces(self,image = None):
		#Detect faces from the gray image
		self.faces = getFaces(self.grayImage,self.face_cascade)	
		#print('Number of faces detected:', len(faces))
		return self.faces

	def fetchKeyPoints(self,image = None):
		# Predict the keypoints for the faces
		predicted_faces = preProcessFaces(self.faces,self.grayImage)	
		self.predicted_points = getKeypoints(predicted_faces,self.model)
		#print(self.predicted_points)
		return self.predicted_points

	def drawResult(self):
		#Draw to test the ouput	
		drawResults(self.predicted_points,self.faces,self.inputImage)

def test():
	jpgfile = Image.open("Images/paar.jpg")
	image = np.array(jpgfile)
	network = NetworkApi()
	network.feedImage(image)
	faces = network.fetchFaces()
	results = network.fetchKeyPoints()
	#Test
	network.drawResult()

test()