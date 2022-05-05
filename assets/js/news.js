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
			$.each(data, function( index, value ) {
			  
			  	let comments = ``;
			  	$.each(value['comments'], function( index, comm ) {
          			console.log(comm['body']);

          			comments += `</br><small class="text-muted">${comm['body']} at ${comm['created_at']} </small>`;
          		});
			  	let row = ` 
				  	<div class="col">
			          <div class="card shadow-sm">
			            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">${value['title']}</text></svg>

			            <div class="card-body">
			              <p class="card-text">${value['body']}</p>

			              <small class="text">comments</small>
			              `+comments+`
			            </div>
			          </div>
			        </div>`;

			    $('#news_containter').append(row);
			});

		}
	}
}

$(document).ready(function () {
	app.news.init();
})