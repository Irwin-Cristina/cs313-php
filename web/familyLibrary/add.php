<?php
//connection
require('dbConnect.php');
$db = get_db();



//form check
    $title = $author = $count = $location = $genre = $summary = '';
    $errors=array('book_title'=>'', 'author_name'=>'', 'book_page_count'=>'', 'location'=>'','genre_name'=>'', 'book_summary'=>'');

    if(isset($_GET['submit'])) {
        //check title
        if(empty($_GET['book_title'])) {
            $errors['book_title'] = 'A book title is required <br/>';
        } else {
            $title=$_GET['book_title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['book_title'] = 'Title must be letters and spaces only';
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
            
        <form  id="addbookform" action ="addbook.php" method="POST">
            <div class ="text-input">
                <label>Book Title</label>
                <input type="text" name="book_title" id="book_title" value="<?php echo htmlspecialchars($title)?>">
                <div class="red-text"><?php echo $errors['book_title'];?></div>
          </div>
            
            <div class ="text-input">
                <label>Author</label>
                <input type="text" name="author_name" id="author_name" value="<?php echo htmlspecialchars($author)?>">
                <div class="red-text"><?php echo $errors['author_name'];?></div>
            </div>
            
            <div class ="text-input">
                <label>Page Count</label>
                <input type="text" name="book_page_count" id="book_page_count" value="<?php echo htmlspecialchars($count)?>">
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
                
                <input type="checkbox" name="genre_name" id="genre_name1" value="1"><label for="genre_name1">History</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name2" value="2"><label for="genre_name2">Biography</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name3" value="3"><label for="genre_name3">Fiction</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name4" value="4"><label for="genre_name4">Non-Fiction</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name5" value="5"><label for="genre_name5">Romance</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name6" value="6"><label for="genre_name6">Mystery</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name7" value="7"><label for="genre_name7">Fantasy</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name8" value="8"><label for="genre_name8">Historical Fiction</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name9" value="9"><label for="genre_name9">Self-Help</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name10" value="10"><label for="genre_name1">Children</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name11" value="11"><label for="genre_name11">Dystopia</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name12" value="12"><label for="genre_name12">Poetry</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name13" value="13"><label for="genre_name13">Informational</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name14" value="14"><label for="genre_name14">Young Adult</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name15" value="15"><label for="genre_name15">Spiritual</label><br>
                
                <input type="checkbox" name="genre_name" id="genre_name16" value="16"><label for="genre_name16">Music</label><br>
                </div>

            <div class="summary">
                <label for="book_summary">Summary</label><br>
                <textarea id="book_summary" name="book_summary" cols="50" rows="4"  value="<?php echo htmlspecialchars($summary)?>">Enter book summary here...</textarea>
            </div>
            
            <div class="submitbtn">
                <input type="submit" name="submit" value="Submit Update">
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