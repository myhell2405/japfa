Background image for login

Place the image you provided (Pasted Image.png) at this location with the exact filename expected by the login page:

  /assets/login-bg.png

So copy the file into the repo like:

  cp "/path/to/Pasted Image.png" ./assets/login-bg.png

Alternatively rename the file to login-bg.png and put it in the assets folder when you deploy.

The login page (public/login.html) expects that path for the background image. The page uses a slight blur overlay so the image does not interfere with the form UI.
