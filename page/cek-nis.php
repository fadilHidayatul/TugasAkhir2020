<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-body">
                    
                    <!-- Default form nis -->
                    <form class="p-5" method="POST" enctype="multipart/form-data">
                        
                        <p class="h2 mb-5">Cek NIS</p>
                        <!-- matpel -->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Kelas</p>
                            </div>
                            <div class="col-md-9">
                                <!-- opt matpel -->
                                <select name="chk-nis" class="browser-default custom-select mb-4" required>
                                    <option selected>Pilih Kelas</option>
                                    <option value="1">Kelas 1</option>
                                    <option value="2">Kelas 2</option>
                                    <option value="3">Kelas 3</option>
                                    <option value="4">Kelas 4</option>
                                    <option value="5">Kelas 5</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Sign up button -->
                        <button class="btn btn-danger my-4 btn-block" type="submit" name="btnCheckSoal">Cek NIS</button>
                    </form>
                    <!--End  Default form -->
<?php
    include_once 'aksi/get-nis.php';
?>
                </div>
            </div>
            
        </div> 
            <!-- card get soal--> 

       
            <table class="table">
                <thead class="red ligthen-1 white-text text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    
                  </tr>
                </thead>
                
                <tbody class="text-center">
                <tr>
<?php
$count = 0;
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
?> 
                <th scope = "row"> <?php $count++; echo $count; ?> </th>
                    
                    <td> <?php echo $row['nis']?> </td>
                    <td> <?php echo $row['nama_siswa']?> </td>
                    
                </tr> 
<?php
}
?>
                </tbody>
            </table>

            
    </div>
</div>
