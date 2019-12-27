<?php
	include './config.php';
	//https://www.webslesson.info/2016/02/how-to-load-more-data-using-ajax-jquery.html
	$output = '';  
	$video_id = '';  
	sleep(1);  
 
	$sql = "SELECT * FROM DOCUMENT WHERE id > ".$_POST['last_id']." LIMIT 3";  
	$result = mysqli_query($conn, $sql);  
	if(mysqli_num_rows($result) > 0)  
	{  
	    while ($data = mysqli_fetch_array($query_show_all))
	    {
                    '<div class="col-md-4">                   
                    <div class="card card-blog">
                      <div class="card-header card-header-image crop-image">
                        <a href="http://localhost/qnushare/post/'.$data['slug'].'">
                          <img src="http://localhost/qnushare/image/'.$data['image'].'">
                        </a>
                      </div>
                      <div class="card-body">
                        <h6 class="card-category text-warning">'.$data['categories'].'</h6>
                        <h4 class="card-title">
                          <a href="http://localhost/qnushare/post/'.$data['slug'].'">'.$data['name'].'</a>
                        </h4>
                        <div class="card-footer justify-content-center">
                          <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                            <i class="fa fa-dribbble"></i>
                          </a>
                          <a href="#pablo" class="btn btn-just-icon btn-link btn-instagram">
                            <i class="fa fa-instagram"></i>
                          </a>
                        </div>                    
                      </div>
                    </div>
                    </div>'
        }
	     $output .= '  
	              <div class="col-md-3 ml-auto mr-auto">
	                <button type="button" class="btn btn-rose btn-round" data-vid="'.$video_id.'" name="btn_more" id="btn_more">Load more...</button>
	              </div>  
	     ';  
	     echo $output;  
	}  
?>