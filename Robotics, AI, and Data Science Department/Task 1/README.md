# Task 1: Happy vs Sad Face Detection

### What is this task?
This project builds a machine learning model that can tell if a person in a photo looks **happy** or **sad**.

### How it works
1. Take a photo of a person's face
2. The AI model looks at the photo
3. It tells you: "This person looks Happy" or "This person looks Sad"
4. It also gives a confidence score (how sure it is)

### Files in this project
- `keras_model.h5` - The trained AI model
- `labels.txt` - Labels for emotions (0=Happy, 1=Sad)
- `test_model.py` - Script to test the model with your photos

### How to use it
1. Install required libraries:
   ```
   pip install tensorflow pillow numpy
   ```

2. Put your photo in the folder

3. Change the photo name in `test_model.py`:
   ```python
   image = Image.open("your_photo.jpg").convert("RGB")
   ```

4. Run the test:
   ```
   python test_model.py
   ```

### Example result
```
Class: Happy
Confidence Score: 0.92
```
This means the model thinks the person is happy and is 92% confident about it.

### What I learned
- How to build emotion detection models
- Using TensorFlow and Keras for AI
- Image processing and classification
- Testing machine learning models

---
*Part of Smart Methods Journey - Learning AI and Robotics*
