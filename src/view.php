<!-- view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Article CRUD</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 20px;
    }
    .container {
      max-width: 800px;
      margin: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #333;
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .btn {
      background-color: #333;
      color: #fff;
      padding: 8px 12px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      margin-right: 5px;
    }
    .btn:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>News Article CRUD Operations</h2>
    <a class="btn" href="http://localhost:3000/" target="_blank">Go to React App</a>
    <!-- Replace the URL with your React app URL -->
    <br><br>
    
    <!-- Display form to add new article -->
    <h3>Add New Article</h3>
    <form action="insert.php" method="POST">
      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title" required><br><br>
      <label for="description">Description:</label><br>
      <textarea id="description" name="description" rows="4" required></textarea><br><br>
      <label for="author">Author:</label><br>
      <input type="text" id="author" name="author" required><br><br>
      <input type="submit" value="Add Article" class="btn">
    </form>

    <h3>Manage Articles</h3>
    <!-- Fetch articles from database and display in a table -->
    <?php
    // Replace with your database connection details
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "news_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Fetch articles from database
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Author</th><th>Action</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['author']."</td>";
        echo '<td><a href="update.php?id='.$row['id'].'" class="btn">Update</a> ';
        echo '<a href="delete.php?id='.$row['id'].'" class="btn" onclick="return confirm(\'Are you sure you want to delete this article?\')">Delete</a></td>';
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
  </div>
</body>
</html>
