<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regina";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $tipe = $_POST['tipe'];
  $alamat = $_POST['alamat'];
  $tlp = $_POST['tlp'];
  $sql = "INSERT INTO `users` (`id`, `nama`, `tipe`, `alamat`, `tlp`) 
  VALUES (NULL, '$nama', '$tipe', '$alamat', '$tlp');";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  // while($row = $result->fetch_array()) {
    //   echo  $row[1]."<br>";
    // }
    // while($row = $result->fetch_assoc()) {
    //   echo  $row['nama']."<br>";
    // }
    
    
  } else {
    echo "0 results";
  }
  
  // $sql2 = "SELECT * FROM users where id='2'";
  // $result2 = $conn->query($sql2);
  
  // $data = $result2->fetch_object();
  // echo $data->alamat;
  
  $conn->close();
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola User</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      body {
        font-family: Arial, sans-serif;
        background-color: #f1e8e0;
        color: #0d0d0d;
      }
      
      .container {
        display: flex;
        height: 115vh;
      }
      
      .sidebar {
        width: 250px;
        background-color: #d4b2a7;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: white;
      }
      
      .sidebar h2 {
        margin-bottom: 30px;
        font-size: 1.5rem;
        color: #0d0d0d;
      }
      
      .sidebar button {
        width: 100%;
        background-color: #5b4b47;
        color: white;
        border: none;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      
      .sidebar button:hover {
        background-color: #8dae90;
      }
      
      .main {
        flex: 1;
        padding: 20px;
      }
      
      .main h1 {
        margin-bottom: 20px;
        font-size: 2rem;
        color: #2b2626;
      }
      
      .form-kotak {
        background-color: rgb(255, 255, 255);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px #3d3b3a;
        margin-bottom: 20px;
      }
      
      .form-kotak label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      
      .form-kotak input, 
      .form-kotak select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
      }
      
      .form-kotak button {
        background-color: #58975b;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
      }
      
      .form-kotak button:hover {
        background-color: #455d46;
      }
      
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: rgb(236, 233, 233);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px #da94c6;
      }
      
      table th,
      table td {
        padding: 15px;
        text-align: left;
      }
      
      table th {
        background-color: #aa8f8f;
        color: rgb(25, 24, 24);
        font-weight: bold;
      }
      
      table tr:hover {
        background-color: #e8dada;
      }
      
      table tbody td {
        border-bottom: 1px solid #000000;
      }

      .table-kotak {
        overflow-y: auto;
        max-height: 300px;
        border-radius: 8px;
      }
      </style>
  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <h2>Admin</h2>
        <button>Kelola User</button>
        <button>Kelola Laporan</button>
        <button>Logout</button>
      </div>
      <div class="main">
        <h1>Kelola User</h1>
        <div class="form-kotak">
          <form method="post">
            <label for="type">Tipe User</label>
            <select id="type" name="tipe">
              <option value="">Pilih Tipe User</option>
              <option value="Toko">Toko</option>
              <option value="Gedung">Gedung</option>
              <option value="Gudang">Gudang</option>
            </select>
            
            <label for="name">Nama</label>
            <input
            type="text"
            id="name"
            name="nama"
            placeholder="Masukkan nama"
            />
            
            <label for="phone">Telepon</label>
            <input
            type="text"
            id="phone"
            name="tlp"
            placeholder="Masukkan nomor telepon"
            />
            
            <label for="address">Alamat</label>
            <input
            type="text"
            id="address"
            name="alamat"
            placeholder="Masukkan alamat"
            />
            
            <!-- <label for="username">Username</label>
            <input
            type="text"
            id="username"
            name="username"
            placeholder="Masukkan username"
            />
            
            <label for="password">Password</label>
            <input
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            /> -->
            
            <button type="submit">Tambah</button>
            <button type="button">Edit</button>
            <button type="button">Hapus</button>
          </form>
        </div>
        
        <div class="table-kotak">
          <table>
            <thead>
              <tr>
                <th>ID User</th>
                <th>Nama User</th>
                <th>Tipe User</th>
                <th>Alamat</th>
                <th>Telepon</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while($row = $result->fetch_object()) {
                ?>
                  <tr>
                    <td><?=$row->id?></td>
                    <td><?php echo  $row->nama;?></td>
                    <td><?=$row->tipe?></td>
                    <td><?=$row->alamat?></td>
                    <td><?=$row->tlp?></td>
                  </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
