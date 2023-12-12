<!DOCTYPE html>
 <html>
     <body>
         <form method="post" target="ifrm">
             <input type="date" name="date_picker" id="picked_date">
             <button type="submit">Hello</button>
         </form>
         <?php 
    if(isset($_POST['date_picker'])){ 
        $date_picker = $_POST['date_picker'];
        echo "<h1>$date_picker</h1>"; 
    } 
?>
     </body>
 
 </html>

