# Potato API

### Send Information to Server
This allows you to send information to me. If you wish to apply for authorization, use the category `application`. Response code should be `204` if successful.
```http
POST http://baked.potatoheads.net/api/post.php HTTP/1.1
Authorization: {epicAccountId}
Category: {category}

{infoToSendToServer}
```

### Get hero information
This will return json with information about a hero.
Bot: PotatoBot
```http
GET http://baked.potatoheads.net/api/hero.php HTTP/1.1
Authorization: {epicAccountId}
Content-Type: application/json

{heroName}
```

### Get an image
This will return a png of any image. `imageCategory` must be an item from this list:
- backblings
- banners
- bundles
- classes
- contrails
- emotes
- emoticons
- gliders
- heroes
- loading-screens
- music
- outfits
- perks
- pickaxes
- resources
- shop_bg
- sprays
- toys
- weapons
- wraps
Bot: PotatoBot

```http
GET http://baked.potatoheads.net/api/image.php HTTP/1.1
Content-Type: image/gif
Category: {imageCategory}

{imageName}
```

### Get an image without headers
This will return a png of any image. `imageCategory` must be an item from the previous list.
Bot: PotatoBot

```http
GET http://baked.potatoheads.net/api/imagenh.php?category={imageCategory}&name={imageName} HTTP/1.1
```

### Get User-Friendly names from a Template ID
This will return a json object with template IDs as keys and their user-friendly names as values. Credit to `amrsatrio` for helping with turning this into a full list.
Bot: Fortnite Daily

```http
GET http://baked.potatoheads.net/api/items.php HTTP/1.1
Authorization: {epicAccountId}
```