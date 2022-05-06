const app = {
	news: {
		init: function () {
			$.ajax({
			    url: `api.php/news/getnews`,
			    type: 'GET',
			    success: function(res) {
			    	app.news.populate_data(res);
			    },
			    error: function(data){
			    }
			});
		},
		populate_data: function (data) {
			$('#news_containter').html('');

			$.each(data, function( index, value ) {
			  	let comments = ``;
			  	$.each(value['comments'], function( index, comm ) {
          			console.log(comm['body']);

          			comments += `</br><small class="text-muted">${comm['body']} at ${comm['created_at']} </small>`;
          		});
			  	let row = ` 
				  	<div class="col news-block" data-id='${value['id']}' >
			          <div class="card shadow-sm">
			            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">${value['title']}</text></svg>

			            <div class="card-body">
			              <p class="card-text">${value['body']}</p>

			              <small class="text">comments</small>
			              `+comments+`
			              </br>
			              <div class="btn-group">
		                      <button data-id='${value['id']}' type="button" class="delete-news btn btn-sm btn-outline-secondary">Delete News</button>
		                      <!-- <button data-id='${value['id']}' type="button" class="view-news btn btn-sm btn-outline-secondary">Edit</button> -->
		                    </div>
			            </div>
			          </div>
			        </div>`;

			    $('#news_containter').append(row);
			});
		},
		init_delete: function () {
			$(document).delegate(".delete-news", "click", function(e){
				e.preventDefault();
				let id = $(this).data('id');
				$.ajax({
				    url: `api.php/news/delete/${id}`,
				    type: 'DELETE',
				    success: function(res) {
				    	app.news.init();
				    },
				    error: function(data){
				    	alert('Delete Failed');
				    }
				});
			});
		},
		init_upsert_news: function () {
			$("#news-form").submit(function(e){
                e.preventDefault(e);

                let payload = {
		            title: $("#titleInput").val(),
		            body:$("#bodyArea").val(),
		        }

                $.ajax({
				    url: `api.php/news/upsertnews`,
				    type: 'POST',
				    dataType: 'json',
				    data: JSON.stringify(payload),
				    success: function(res) {
				    	app.news.init();
				    	$('#newsModal').modal('toggle');
				    	$('#newsModal input, #newsModal textarea').val('');
				    },
				    error: function(data){
				    	alert('Delete Failed');
				    }
				});
            });
		}
	}
}

$(document).ready(function () {
	app.news.init();
	app.news.init_delete();
	app.news.init_upsert_news();
})