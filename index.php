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
  	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsModal">Create News</button>
  	<div id="news_containter" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    </div>

    <!-- Modal -->
		<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="NewsModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="NewsModalLabel">Create News</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <form class="needs-validation" id="news-form">
			      <div class="modal-body">
				      	<input type="hidden" id="news-id-input">
				        <div class="mb-3">
								  <label for="titleInput" class="form-label">Title</label>
								  <input type="input" required class="form-control" id="titleInput" placeholder="Title">
								</div>
								<div class="mb-3">
								  <label for="bodyArea" class="form-label">Body</label>
								  <textarea class="form-control" id="bodyArea" required rows="3"></textarea>
								</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" id="save-news" >Save</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/js/news.js?v=<?=date('YmdHi')?>"></script>
  </body>
</html>