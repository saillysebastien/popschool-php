<?php
$url = '';
$tag1 = '';
$tag2 = '';
$tag3 = '';
 ?>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>title</title>


</head>

<body>

<form  action="form-02b.php" method="post">

  <input type="text" name="url" value="" placeholder="url" /><br />

  <input type="text" name="tags[]" value="" placeholder="tag 1" /><br />

  <input type="text" name="tags[]" value="" placeholder="tag 2" /><br />

  <input type="text" name="tags[]" value="" placeholder="tag 3" /><br />

  <input type="submit" name="" value="envoyer" /><br />
</form>


</body>

</html>
