import sounddevice as sd
import vosk
import queue
import json
import pyttsx3
import cohere
import os
import time
import shutil

# === CONFIG ===
COHERE_API_KEY = "DARVHKnW7ZkeDXywbMKSpGHvYrhCUaJPY1Q0XTMq"  # Replace with your actual key
VOSK_MODEL_PATH = "vosk-model-small-en-us-0.15"  # Replace with your model folder
SAMPLERATE = 16000

# === INIT ===
engine = pyttsx3.init()
q = queue.Queue()
co = cohere.Client(COHERE_API_KEY)

# === UTILS ===
def print_banner():
    columns = shutil.get_terminal_size().columns
    print("=" * columns)
    print("VOICE CHATBOT - VOSK + COHERE + TTS".center(columns))
    print("=" * columns)

def print_message(label, message):
    print(f"\n[{label}]".ljust(12), message)

# === LIST MICROPHONES ===
print_banner()
print("Available Microphones:\n")
for i, device in enumerate(sd.query_devices()):
    if device['max_input_channels'] > 0:
        print(f"  [{i}] {device['name']}")
mic_index = int(input("\nSelect a microphone index: "))

# === LOAD VOSK MODEL ===
if not os.path.exists(VOSK_MODEL_PATH):
    print("\nModel not found.")
    print("Download from: https://alphacephei.com/vosk/models")
    exit(1)

model = vosk.Model(VOSK_MODEL_PATH)
recognizer = vosk.KaldiRecognizer(model, SAMPLERATE)

# === RECORDING CALLBACK ===
def callback(indata, frames, time, status):
    q.put(bytes(indata))

# === MAIN LOOP ===
print_banner()
print("Start speaking. Press Ctrl+C to stop.\n")

try:
    with sd.RawInputStream(samplerate=SAMPLERATE, blocksize=8000, dtype='int16',
                           channels=1, callback=callback, device=mic_index):
        while True:
            data = q.get()
            if recognizer.AcceptWaveform(data):
                result = json.loads(recognizer.Result())
                user_input = result.get("text", "").strip()

                if user_input:
                    print_message("You", user_input)

                    # Send to Cohere
                    print_message("Bot", "Generating response...")
                    response = co.chat(message=user_input)
                    bot_reply = response.text.strip()
                    print_message("Bot", bot_reply)

                    # Speak the response
                    engine.say(bot_reply)
                    engine.runAndWait()
except KeyboardInterrupt:
    print("\n\nChat ended by user. Goodbye.")
