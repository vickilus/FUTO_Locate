<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>FUTO Locate - Add Location</title>
       <link rel="stylesheet" href="../public/css/style2.css">
       
   </head>
   <body>
       <h1>Add a New Location</h1>
       <form id="location-form" method="POST" action="../public/add_location.php">
           <label for="name">Location Name:</label>
           <input type="text" id="name" name="name" required>

           <label for="category">Category:</label>
           <select id="category" name="category" required>
               <option value="Building">Building</option>
               <option value="Office">Office</option>
               <option value="Library">Library</option>
              
               <!-- Add other categories as needed -->
           </select>

           <label for="description">Description:</label>
           <textarea id="description" name="description"></textarea>

           <label for="latitude">Latitude:</label>
           <input type="number" step="0.000001" id="latitude" name="latitude" required>

           <label for="longitude">Longitude:</label>
           <input type="number" step="0.000001" id="longitude" name="longitude" required>

           <button type="submit">Add Location</button>
       </form>

       <a href="../views/admin_dashboard.php">Admin Dashboard</a>
   </body>
   </html>
