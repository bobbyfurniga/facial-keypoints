from NetworkApi import NetworkApi
import sys
from pathlib import Path
from PIL import Image
import numpy as np

def main(argv):
	#print ('Number of arguments:', len(sys.argv), 'arguments.')
	
	if(len(sys.argv) <= 1):
		print('No input file received')
	else:	
		file_path = sys.argv[1]
		file = Path(file_path)		
		
		if file.is_file():
			#print(file_path)
			get_result(file_path)
		else:
			print('There is no file at the provided path') # doesn't exist
		
			
def get_result(file):
	jpgfile = Image.open(file)
	image = np.array(jpgfile)
	
	network = NetworkApi()
	
	network.feedImage(image)
	
	faces = network.fetchFaces()
	results = network.fetchKeyPoints()
	print(faces)
	print(results)
	
if __name__ == "__main__":
   main(sys.argv[1:])
   
 #Usage: python main.py "Images/paar.jpg"