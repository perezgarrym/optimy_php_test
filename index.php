<?php
# load bootstrap
require __DIR__ . "/bootstrap/bootstrap.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Garry Perez Optimy Test</title>
  </head>
  <body>
  	<h1>NEWS</h1>

  	<div id="news_containter" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    </div>
  	

  	<table id="news_table" class="table table-striped table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Details</th>
	      <th scope="col">Comments</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  </tbody>
	</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/js/news.js?v=<?=date('YmdHi')?>"></script>
  </body>
</html>