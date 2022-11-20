<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원검색</title>
    <link rel="stylesheet" href="hg_cs.css">
</head>
<body>
<h1>회원 검색</h1>
<form action="search_server.php" method="GET">
    <div class="search">
      <input type="text" placeholder="검색어 입력" name="mb_id" value="">
      <button type="submit">검색</button>
    </div>
</form>
<div class="search-mode">
    <input type="text" >

    <div class="icon">
      <div class="search">
        <i class="fas fa-search"></i>
      </div>

      <div class="plus-option">
        <i class="fas fa-keyboard"></i>
        <i class="fas fa-microphone"></i>
      </div>
    </div>

    </div>
    </div>


</body>
</html>