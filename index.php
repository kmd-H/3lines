<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>掲示板</title>
<link rel="stylesheet" href="css/style.css">
</head>
    
<body>
    
<form method="post">            
<p>名前</p>
<input type="text" name="a">
<p>コメント</p>
<textarea name="b"></textarea>
<input type="submit" value="送信">
<br><br>
</form>
 
<?php
 
$a = htmlspecialchars($_POST["a"], ENT_QUOTES);
$b = htmlspecialchars($_POST["b"], ENT_QUOTES);
 
$db = new PDO("mysql:host=localhost;dbname=keiji", "root", "");
    
$db->query("INSERT INTO tb1 (no,name,messege,time)
            VALUES (NULL,'$a','$b',NOW())");
    
$n = $db -> query("SELECT * FROM tb1 ORDER BY no DESC");
while ($i = $n -> fetch()) {
print "{$i['no']}: {$i['name']} {$i['time']}<br>"
        .nl2br($i['messege'])."<hr>";
                           }
?>
</body>
 
</html>
