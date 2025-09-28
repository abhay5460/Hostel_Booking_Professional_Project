<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
</head>
<body>
    <form action="image_upload_insert.php" method="post" enctype="multipart/form-data">
    <select name="description" id="description">
  <option value="view">Hostel image</option>
  <option value="food">Food</option>
  <option value="Parking">Mercedes</option>
 </select>
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" required>
        <br>
        
        <input type="submit" value="Upload Image">
    </form>
</body>
</html>
