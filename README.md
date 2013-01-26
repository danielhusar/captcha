# Captcha

Simple class for generate captcha image.

Sample usage:

```php
  	file: image.php
		$captcha = new Captcha;
		$captcha -> image();

		file: guestbook.php
		<img src="image.php" alt="captcha">
		...
		$captcha = new Captcha;
		if ($captcha->compare($_POST['textfield'])){
			..continue
		} else {
			echo "wrong captcha";
		}
```
