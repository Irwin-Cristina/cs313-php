<!DOCType html>
<html>
<head>
    <title>Team assignment 3</title>
    
</head>
<body>
    <form method="post" action="assignmentresults.php">
        <label>Name: <input type="text" name="name" id="name"></label>
        <br><br>
        <label>E-mail:<input type="text" name="email" id="email"></label>
        <br><br>
        
        <label>Major:</label>
        <br><br>
        <?php
        $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering" );
           
                echo '<br><input type="radio" name="major" value= "'.$majors[0].'">'.$majors[0];
                echo '<br><input type="radio" name="major" value= "'.$majors[1].'">'.$majors[1];
                echo '<br><input type="radio" name="major" value= "'.$majors[2].'">'.$majors[2];
                echo '<br><input type="radio" name="major" value= "'.$majors[3].'">'.$majors[3];
        ?>
        
        
        
        <!--<br><br>
            <input type="radio" name="major" value="Computer Science" id="cs">Computer Science
            <input type="radio" name="major" value="Web Design development" id="wdd">Web Design and Development
            <input type="radio" name="major" value="Computer Information Technology" id="cit">Computer Information Technology
            <input type="radio" name="major" value="Computer Engineering" id="ce">Computer Engineering
        <br><br>-->
        <br><br>
        <label>Comment: <textarea name="comment" rows="5" cols="40"></textarea></label>
        <br><br>
      
        
        <!--    Part 3-->
        <label>Continents Visited:</label>
        <br><br>
            <input type="checkbox" name="continent[]" value="North America">North America
            <br><br>
            <input type="checkbox" name="continent[]" value="South America">South America
            <br><br>
            <input type="checkbox" name="continent[]" value="Europe">Europe
            <br><br>
            <input type="checkbox" name="continent[]" value="Asia">Asia
            <br><br>
            <input type="checkbox" name="continent[]" value="Australia">Australia
            <br><br>
            <input type="checkbox" name="continent[]" value="Africa">Africa
            <br><br>
            <input type="checkbox" name="continent[]" value="Antartica">Antartica
            <br><br>
          <input type="submit" name="submit" value="Submit">
    
    </form>
</body>

</html>
