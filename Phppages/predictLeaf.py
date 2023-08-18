import torch
import torch.nn as nn
import cv2
import torchvision.transforms as transforms
from PIL import Image
import tensorflow as tf
import keras as keras
import os

device = "cpu"

leaf_data = ['Apple___Apple_scab', 'Apple___Black_rot', 'Apple___Cedar_apple_rust', 'Apple___healthy', 'Blueberry___healthy', 
             'Cherry_(including_sour)___Powdery_mildew', 'Cherry_(including_sour)___healthy', 
             'Corn_(maize)___Cercospora_leaf_spot Gray_leaf_spot', 'Corn_(maize)___Common_rust_', 
             'Corn_(maize)___Northern_Leaf_Blight', 'Corn_(maize)___healthy', 'Grape___Black_rot', 
             'Grape___Esca_(Black_Measles)', 'Grape___Leaf_blight_(Isariopsis_Leaf_Spot)', 
             'Grape___healthy', 'Orange___Haunglongbing_(Citrus_greening)', 'Peach___Bacterial_spot', 
             'Peach___healthy', 'Pepper,_bell___Bacterial_spot', 'Pepper,_bell___healthy', 'Potato___Early_blight', 
             'Potato___Late_blight', 'Potato___healthy', 'Raspberry___healthy', 'Soybean___healthy', 'Squash___Powdery_mildew',
               'Strawberry___Leaf_scorch', 'Strawberry___healthy', 'Tomato___Bacterial_spot', 'Tomato___Early_blight', 
               'Tomato___Late_blight', 'Tomato___Leaf_Mold', 'Tomato___Septoria_leaf_spot', 
               'Tomato___Spider_mites Two-spotted_spider_mite', 'Tomato___Target_Spot', 
               'Tomato___Tomato_Yellow_Leaf_Curl_Virus', 'Tomato___Tomato_mosaic_virus', 'Tomato___healthy']

# base class for the model
class ImageClassificationBase(nn.Module):
    def demo():
        return 1
    

def ConvBlock(in_channels, out_channels, pool=False):
    layers = [nn.Conv2d(in_channels, out_channels, kernel_size=3, padding=1),
             nn.BatchNorm2d(out_channels),
             nn.ReLU(inplace=True)]
    if pool:
        layers.append(nn.MaxPool2d(4))
    return nn.Sequential(*layers)


class ResNet9(ImageClassificationBase):
    def __init__(self, in_channels, num_diseases):
        super().__init__()
        
        self.conv1 = ConvBlock(in_channels, 64)
        self.conv2 = ConvBlock(64, 128, pool=True) # out_dim : 128 x 64 x 64 
        self.res1 = nn.Sequential(ConvBlock(128, 128), ConvBlock(128, 128))
        
        self.conv3 = ConvBlock(128, 256, pool=True) # out_dim : 256 x 16 x 16
        self.conv4 = ConvBlock(256, 512, pool=True) # out_dim : 512 x 4 x 44
        self.res2 = nn.Sequential(ConvBlock(512, 512), ConvBlock(512, 512))
        
        self.classifier = nn.Sequential(nn.MaxPool2d(4),
                                       nn.Flatten(),
                                       nn.Linear(512, num_diseases))
        
    def forward(self, xb): 
        out = self.conv1(xb)
        out = self.conv2(out)
        out = self.res1(out) + out
        out = self.conv3(out)
        out = self.conv4(out)
        out = self.res2(out) + out
        out = self.classifier(out)
        return out  


def to_device(data, device):
    
    if isinstance(data, (list,tuple)):
        return [to_device(x, device) for x in data]
    return data.to(device, non_blocking=True)

def predict_image(img, model):
   
    xb = to_device(img.unsqueeze(0), device)
    
    yb = model(xb)
    _, preds  = torch.max(yb, dim=1)

    return preds[0].item()

model = ResNet9(3,38)
model.load_state_dict(torch.load("D:/xampp/htdocs/HELPMATE/Models/TrainedModels/plant_disease_model2.pth", map_location=torch.device('cpu')))
model.eval()

#This is sample image taken for testing 
img = Image.open("D:/xampp/htdocs/HELPMATE/Models/Data/LeafData/corn_rust.jpg")


#To get the uploaded images

# for image in os.listdir("D:/xampp/htdocs/HELPMATE/Crop_Images"):
#     #img = Image.open("D:/xampp/htdocs/HELPMATE/Models/Data/LeafData/corn_rust.jpg")
#     img = image
#     break
    
resize = transforms.Resize(size = (256,256))
img = resize(img)

#print(img.size)

convert_tensor = transforms.ToTensor()
img = convert_tensor(img)



print(leaf_data[predict_image(img,model)])