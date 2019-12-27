<?php  
$output = '';  
$id = '';  
sleep(1);  
$connect = mysqli_connect("localhost", "root", "", "qnushare");  
$sql = "SELECT * FROM document WHERE id < ".$_POST['last_video_id']." ORDER BY id DESC LIMIT 2";  
$result = mysqli_query($connect, $sql);  
if(mysqli_num_rows($result) > 0)  
{  
     while($row = mysqli_fetch_array($result))  
     {  
          $id = $row["id"];  
          $output .= '  
               <div class="col-md-4">                   
                    <div class="card card-blog">
                      <div class="card-header card-header-image crop-image">
                        <a href="http://localhost/qnushare/post/'.$row['slug'].'">
                          <img src="http://localhost/qnushare/image/'.$row['image'].'">
                        </a>
                      </div>
                      <div class="card-body">
                        <h6 class="card-category text-warning">'.$row['categories'].'</h6>
                        <h4 class="card-title">
                          <a href="http://localhost/qnushare/post/'.$row['slug'].'">'.$row['name'].'</a>
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
                    </div>';  
     }  
     $output .= '  
               <tbody><tr id="remove_row">  
                    <td><button type="button" name="btn_more" data-vid="'. $id .'" id="btn_more" class="btn btn-success form-control">more</button></td>  
               </tr></tbody>  
     ';  
     echo $output;  
}  
?>