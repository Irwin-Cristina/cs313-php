<?php
//connection
require('dbConnect.php');
$db = get_db();



//form check
    $title = $author = $count = $location = $genre = $summary = '';
    $errors=array('title'=>'', 'author_name'=>'', 'book_page_count'=>'', 'location'=>'','genre_name'=>'', 'book_summary'=>'');

    if(isset($_GET['submit'])) {
        //check title
        if(empty($_GET['title'])) {
            $errors['title'] = 'A book title is required <br/>';
        } else {
            $title=$_GET['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
            //echo htmlspecialchars($_GET['title']);  
        }
        
        //check author
        if(empty($_GET['author_name'])) {
            $errors['author_name'] = 'An author is required <br/>';
        } else {
            $author=$_GET['author_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $author)) {
            $errors['author_name'] = 'Author must be letters and spaces only';
        }
          //echo htmlspecialchars($_GET['author_namer']);  
        }
        
        //check page count
        if(empty($_GET['book_page_count'])) {
            $errors['book_page_count'] = 'Please enter in page count <br/>';
        } else {
            $count =$_GET['book_page_count'];
            if(!filter_var($count, FILTER_VALIDATE_INT)){
            $errors['book_page_count'] = 'Page count must be a number';  
        }
          //echo htmlspecialchars($_GET['book_page_count']);  
        }
        
        //check location
        if(empty($_GET['location'])) {
            $errors['location'] = 'Where is the book located? <br/>';
        } else {
          $location = ($_GET['location']);  
        }
        
        //check genre
        if(empty($_GET['genre_name'])) {
            $errors['genre_name'] = 'Please choose a genre for the book <br/>';
        } else {
          $genre = ($_GET['genre_name']);  
        }
        
        //check book summary
        if(empty($_GET['book_summary'])) {
            $errors['book_summary'] = 'Please write a summary <br/>';
        } else {
          $summary = htmlspecialchars($_GET['book_summary']);  
        }
    }

//end of GET check

?>
<!DOCTYPE html>
<html>
    <?php include('templates/header.php');?>
    

    <main>
        <h1>Family Library</h1>
        <h2>Add</h2>
        <div class= "form">
            
        <form  action ="add.php" method="GET">
            <div class ="text-input">
                <label>Book Title</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
                <div class="red-text"><?php echo $errors['title'];?></div>
          </div>
            
            <div class ="text-input">
                <label>Author</label>
                <input type="text" name="author_name" value="<?php echo htmlspecialchars($author)?>">
                <div class="red-text"><?php echo $errors['author_name'];?></div>
            </div>
            
            <div class ="text-input">
                <label>Page Count</label>
                <input type="text" name="book_page_count" value="<?php echo htmlspecialchars($count)?>">
                <div class="red-text"><?php echo $errors['book_page_count'];?></div>
                
            </div>
            
            
                
             <div class="dropdown">
                <label>Location</label>
                <select name="location">
				    <option value="" disabled selected>Select location</option>
				    <option value="Piano Room">Piano Room</option>
				    <option value="Homework Room">Homework Room</option>
				    <option value="Family Room">Family Room</option>
                    <option value="Piano Room">Parent's Room</option>
				    <option value="Homework Room">Isabella's Room</option>
				    <option value="Family Room">Isaac's Room</option>
                    <option value="Family Room">Simon's Room</option>
			     </select>
                </div>
            
            <div class="checkbox">
                <label>Genre (choose two)</label>
                <input type="checkbox" name="genre_name" value="History"> History<br>
                <input type="checkbox" name="genre_name" value="Biography"> Biography<br>
                <input type="checkbox" name="genre_name" value="Fiction" > Fiction<br>
                <input type="checkbox" name="genre_name" value="Non-Fiction"> Non-Fiction<br>
                <input type="checkbox" name="genre_name" value="Romance"> Romance<br>
                <input type="checkbox" name="genre_name" value="Mystery"> Mystery<br>
                <input type="checkbox" name="genre_name" value="Fantasy"> Fantasy<br>
                <input type="checkbox" name="genre_name" value="Historical Fiction"> Historical Fiction<br>
                <input type="checkbox" name="genre_name" value="Self-Help"> Self-Help<br>
                <input type="checkbox" name="genre_name" value="Children"> Children<br>
                <input type="checkbox" name="genre_name" value="Dystopia"> Dystopia<br>
                <input type="checkbox" name="genre_name" value="Poetry"> Poetry<br>
                <input type="checkbox" name="genre_name" value="Informational"> Informational<br>
                <input type="checkbox" name="genre_name" value="Young Adult"> Young Adult<br>
                <input type="checkbox" name="genre_name" value="Spiritual"> Spiritual<br>
                <input type="checkbox" name="genre_name" value="Music"> Music<br>
                </div>

            <div class="summary">
                <label>Summary</label>
                <textarea rows="4" name="book_summary" cols="50" value="<?php echo htmlspecialchars($summary)?>">Enter book summary here...</textarea>
            </div>
            
            <div class="submitbtn">
                <input type="submit" name="submit" value="submit">
             </div>   
                
        </form>
        </div>
        
        
    
    </main>
  
    <?php include('templates/footer.php');
    
    
//        echo htmlspecialchars($_GET['title']);
//        echo htmlspecialchars($_GET['author_name']);
//        echo htmlspecialchars($_GET['book_page_count']);
//        echo htmlspecialchars($_GET['location']);
//        echo htmlspecialchars($_GET['genre_name']);
//        echo htmlspecialchars($_GET['book_summary']);
        
        ?>
    


</html>