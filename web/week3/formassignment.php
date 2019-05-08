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
        <?php
        $majors = array
            (
            array("Computer Science", "radio", "major"),
            array("Web Design and Development", "radio", "major"),
            array("Computer Information Technology", "radio", "major"),
            array("Computer Engineering", "radio", "major")
            );
        
                echo '<br><br>'. 'input type='.$majors[0][1].'name='.$major[0][2].' value='.$majors[0][0].'>'.$majors[0][0].'<br>';
            
        
        ?>
        
        
        
        <!--<br><br>
            <input type="radio" name="major" value="Computer Science" id="cs">Computer Science
            <input type="radio" name="major" value="Web Design development" id="wdd">Web Design and Development
            <input type="radio" name="major" value="Computer Information Technology" id="cit">Computer Information Technology
            <input type="radio" name="major" value="Computer Engineering" id="ce">Computer Engineering
        <br><br>-->
        
        <label>Comment: <textarea name="comment" rows="5" cols="40"></textarea></label>
        <br><br>
      
        
        <!--    Part 3-->
        <label>Continents Visited:</label>
        <br><br>
            <input type="checkbox" name="continent[]" value="North_America">North America
            <br><br>
            <input type="checkbox" name="continent[]" value="South_America">South_America
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
