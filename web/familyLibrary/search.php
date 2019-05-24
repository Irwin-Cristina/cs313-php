<?php

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <h2>Search</h2>
        <div class= "form">
        <form action ="something.php">
            <div class ="text-input">
                <label for="book_title">Book Title</label>
                <input type="text" name="title" value="Please type the book title">
            </div>
            
            <div class ="text-input">
                <label for="author_name">Author</label>
                <input type="text" name="author_name" value="Please type the author's name">
            </div>
           
            <div class ="text-input">
            <label for="genre_name">Genre</label>
            <input type="text" name="genre_name" value="What genre">
            </div>
            
            <div class ="dropdown">
               <!-- <button class="dropbtn">Dropdown</button>
                <div class="dropdown-content">
                    <a href="#">Checked in</a>
                    <a href="#">Checked out</a>
                    <a href="#">Missing</a>
                </div>-->
                
             <div class="dropdown">
                <label for="status">Status</label>
                <select name="status">
				    <option value="" disabled selected>Select status</option>
				    <option value="Checked in">Checked in</option>
				    <option value="Checked out">Checked out</option>
				    <option value="Missing">Missing</option>
			     </select>
                </div>
            </div> 
            
            <div class="submitbtn">
                <input type="submit" value="Submit">
             </div>   
                
        </form>
        </div>
        
    
    </main>
  
    <?php include('templates/footer.php');?>
    
    
    


</html>