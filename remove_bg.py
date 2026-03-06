from PIL import Image
img = Image.open("public/img/Logo.jpg").convert("RGBA")
pixels = img.load()
w, h = img.size
threshold = 240
for y in range(h):
    for x in range(w):
        r, g, b, a = pixels[x, y]
        if r > threshold and g > threshold and b > threshold:
            pixels[x, y] = (255, 255, 255, 0)
img.save("public/img/Logo.png", "PNG")
print("Logo.png creado")
