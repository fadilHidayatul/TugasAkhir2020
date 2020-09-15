<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-body">
                    
                    <!-- Default form nis -->
                    <form class="p-5" method="POST" enctype="multipart/form-data">
                        
                        <p class="h2 mb-5">Cek Nilai</p>
                        <!-- matpel -->
                        <div class="form-row">
                            <div class="col-md-3 pt-2">
                                <p class="text-justify text-danger">Kelas</p>
                            </div>
                            <div class="col-md-9">
                                <!-- opt matpel -->
                                <select name="nilai-kelas" class="browser-default custom-select mb-4" required>
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
                        <button class="btn btn-danger my-4 btn-block" type="submit" name="btnCheckSoal">Cek Nilai</button>
                    </form>
                    <!--End  Default form -->
<?php
    include_once 'aksi/get-nilai.php';
?>
                </div>
            </div>
            <h2 class="text-center mt-5">Bahasa Indonesia</h2>
        </div> 
            <!-- card get soal--> 

            <!-- Tabel B.indo-->
            <table class="table">
                <thead class="red ligthen-1 white-text text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                
                <tbody class="text-center">
                <tr>
<?php
$no = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope = "row"> <?php $no++; echo $no ?> </th>
                    
                    <td> <?php echo $row['username']?> </td>
                    <td> <?php echo $row['nis']?> </td>
                    <td> <?php echo $row['nilai']?> </td>
                    
                </tr> 
<?php } ?>
                </tbody>
            </table>

                <!-- Tabel B.ing-->
                <h2 class="text-center">Bahasa Inggris</h2>
                <table class="table">
                <thead class="red ligthen-1 white-text text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                    
                  </tr>
                </thead>
                
                <tbody class="text-center">
                <tr>
<?php
$no = 0;
while ($row_ing=$statement_bing->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope = "row"> <?php $no++; echo $no ?> </th>
                    
                <td> <?php echo $row_ing['username']?> </td>
                <td> <?php echo $row_ing['nis']?> </td>
                <td> <?php echo $row_ing['nilai']?> </td>

                </tr> 
<?php } ?>
                </tbody>
            </table>

            <!-- Tabel MM-->
            <h2 class="text-center">Matematika</h2>
            <table class="table">
                <thead class="red ligthen-1 white-text text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                    
                  </tr>
                </thead>
                
                <tbody class="text-center">
                <tr>
<?php 
$no = 0;
while ($row_mm = $statement_mm->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope = "row"> <?php $no++; echo $no?> </th>
                    
                    <td> <?php echo $row_mm['username']?> </td>
                    <td> <?php echo $row_mm['nis']?> </td>
                    <td> <?php echo $row_mm['nilai']?> </td>

                </tr> 
<?php } ?>
                </tbody>
            </table>

            <!-- Tabel IPA-->
            <h2 class="text-center">IPA</h2>
            <table class="table">
                <thead class="red ligthen-1 white-text text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nilai</th>
                    
                  </tr>
                </thead>
                
                <tbody class="text-center">
                <tr>
<?php 
$no = 0;
while ($row_ipa = $statement_ipa->fetch(PDO::FETCH_ASSOC)) {
?>
                <th scope = "row">  <?php $no++; echo $no ?>  </th>
                    
                    <td> <?php echo $row_ipa['username']?> </td>
                    <td> <?php echo $row_ipa['nis']?> </td>
                    <td> <?php echo $row_ipa['nilai']?> </td>
                    
                </tr> 
<?php } ?>
                </tbody>
            </table>
            
    </div>
</div>
