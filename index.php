 <?php
	
	include("inc/header.php");
	 if($run_user['perm'] == "1"){
	?>
<div class="col-12 col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">دخول اليوم</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">

                   


						<thead>
							<th>#</th>
							<th>الرقم الأكاديمي</th>
							<th>الاسم</th>
							<th>التخصص</th>
							<th>الوقت</th>
              <th>وقت الخروج</th>
						</thead>




            <html dir="rtl">
<body>



<button onclick="myFunction()">طباعة سجل دخول اليوم</button>

<script>
function myFunction() {
  window.print();
}
</script>

</body>
</html>


                      <tbody>
						  <?php
		 $enter_qu = "SELECT * FROM `enter` where `date` = '$today'";
		 $enter_qu = mysqli_query($con , $enter_qu);
		 $stu_num = 1 ;
		 while($run_enter = mysqli_fetch_array($enter_qu)){
			 $stu_id = $run_enter['stu_id'];
       $time_in = $run_enter['time_in'];
			 $stu_qu = "SELECT * FROM `stu`,`enter` where `ac_id` = '$stu_id' and `time_in` ='$time_in' ";   
     	 $stu_qu = mysqli_query($con , $stu_qu);
			 $run_stu = mysqli_fetch_array($stu_qu);
			 $time = date ("H:i:s");


		 ?>
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $stu_num; ?></th>
                          <td class="border-top-0"><?php echo $run_stu['ac_id']; ?></td>
                          <td class="border-top-0"><?php echo $run_stu['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_stu['major']; ?></td>
                          <td class="border-top-1"><?php echo $run_stu['time_in'],"<br>",$run_stu['date']; ?></td>
                          <td class="border-top-0"><?php echo $run_stu['time_out']; ?></td>
                          <td class="border-top-0"><?php echo $run_stu['id']; ?></td>

                         
                        </tr>
						  <?php

		 $stu_num++;
		 }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


 <?php
	 }

   else if($run_user['perm'] == "2"){
	?>
<div class="col-12 col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">حجوزاتي</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
						<thead>
							<th>#</th>
							<th>المعمل</th>
							<th>اليوم</th>
							<th>الوقت</th>
						</thead>
                      <tbody>
						  <?php
		 $labs_qu = "SELECT * FROM `labs_sch` where `tech_id` = '$user_id'";
		 $labs_qu = mysqli_query($con , $labs_qu);
		 $lab_num = 1 ;
		 while($run_labs = mysqli_fetch_array($labs_qu)){
			 $lab_id = $run_labs['lab_id'];
			 $lab_qu = "SELECT * FROM `labs` where `id` = '$lab_id'";
     	 $lab_qu = mysqli_query($con , $lab_qu);
			 $run_lab = mysqli_fetch_array($lab_qu);
		 ?>
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $lab_num; ?></th>
                          <td class="border-top-0"><?php echo $run_lab['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_labs['date']; ?></td>
                          <td class="border-top-0"><?php echo $times[$run_labs['time_num']-1]; ?></td>
                        </tr>
						  <?php
		 $lab_num++;
		 }  ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">إستعاراتي</h4>  
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
            <thead>
              <th>#</th>
              <td> رقم الكتاب </td>
              <th>الكتاب</th>
              <th>الكاتب</th>
              <th>تاريخ الإستعاره</th>
              <th>تاريخ الاستعادة</th>
            


            </thead>
                      <tbody>
              <?php
     $brow_qu = "SELECT * FROM `brow_book` where `tech_id` = '$user_id' ";
     $brow_qu = mysqli_query($con , $brow_qu);
     $brow_num = 1 ;
     while($run_brow = mysqli_fetch_array($brow_qu))
     {
      
       $book_id = $run_brow['book_id'];
       $book_qu = "SELECT * FROM `books` where `id` = '$book_id' ";
       $book_qu = mysqli_query($con , $book_qu);
       $run_book = mysqli_fetch_array($book_qu);
     //  $time = date ("H:i:s");
     ?>
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $brow_num; ?></th>
                         
                          
                          <td class="border-top-0"><?php echo $run_book['id']; ?></td>
                          <td class="border-top-0"><?php echo $run_book['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_book['auth']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['brow_date']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['brow_date']; ?></td>
                        </tr>
              <?php
     $brow_num++;
     }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <?php
   }

   else if($run_user['perm'] == "3"){
  ?>

<div class="col-12 col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">المستعيرين</h4>  
              </div>
              <div class="card-content collapse show">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0">
						<thead>
							<th>#</th>
              <td> رقم الكتاب </td>
							<th>الكتاب</th>
							<th>الكاتب</th>
							<th>تاريخ الإستعاره</th>
              <th>تاريخ الاستعادة</th>
              <th>رقم المستعير</th>
						


						</thead>
                      <tbody>
						  <?php
		 $brow_qu = "SELECT * FROM `brow_book` #WHERE `brow_date`  BETWEEN '2019-11-25' and '$today' ";
		 $brow_qu = mysqli_query($con , $brow_qu);
		 $brow_num = 1 ;
		 while($run_brow = mysqli_fetch_array($brow_qu))
     {
      
			 $book_id = $run_brow['book_id'];
			 $book_qu = "SELECT * FROM `books` where `id` = '$book_id' ";
     	 $book_qu = mysqli_query($con , $book_qu);
			 $run_book = mysqli_fetch_array($book_qu);
       //$time = date ("H:i:s");
		 ?>
                        <tr>
                          <th scope="row" class="border-top-0"><?php echo $brow_num; ?></th>
                         
                          
                          <td class="border-top-0"><?php echo $run_book['id']; ?></td>
                          <td class="border-top-0"><?php echo $run_book['name']; ?></td>
                          <td class="border-top-0"><?php echo $run_book['auth']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['brow_date']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['back_date']; ?></td>
                          <td class="border-top-0"><?php echo $run_brow['tech_id']; ?></td>
                        </tr>
						  <?php
		 $brow_num++;
		 }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


 <?php
	 }
	include("inc/footer.php");
	
	?>