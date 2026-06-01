<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "description" content = "Apply Page">
    <meta name = "keywords" content = "HTML, doctype, head, body, meta, paragraph, headings, strong, emphasis">
    <meta name = "author" content = "Bianca Zerveas">
    <link rel="stylesheet" href="styles/shopnest.css">
    <!--Font from Googles Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <title>Apply</title>

    <style>
        header h1 {
            color: white;
        }

        header{
            margin: 0px;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
        }

        header img{
            width: 120px;
            padding-top: 10px;
        }
        

        fieldset {
            width: 45%;
            border: 2px solid #1e3a8a;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            background: white;
            box-shadow: 4px 4px 0 #f97316;
        }

        input, select, textarea {
            padding: 6px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        body{
            background:#f4f6f8;
            margin:0;
        }

        .row fieldset{
            width: 45%;
            min-width: 320px;
        }

        * { font-family: 'DM Sans', sans-serif; }

        label {
            font-weight: 500;
            margin-bottom: 4px;
        }

        legend {
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 4px;
            font-size: 20px;
        }

        .buttons{
            margin: 20px;
        }

    </style>
</head>
    
    <body>
    <header>
        <?php include 'header.inc'; ?>
        <!--The navigation bar containing the links to the other files/webpages that users can access-->
        <?php include 'nav.inc'; ?>
    </header>
 
    
    <!--Forms method and action.-->
    <form action="process_eoi.php" method="post">

    
    <!--Header and description of the apply page-->
    <h1 style = "text-align: left; color:  #1e3a8a; margin: 10px;">ShopNest Application Page</h1>
    <p style = "margin: 0; line-height: 0; margin: 15px;"><strong>Welcome to the ShopNest job application page! Please complete all required fields and let's see if you have what it takes to join our team!</strong></p>
    <p style = "color: #3d3d3d; margin: 15px;">We encourage applications from Aboriginal and Torres Strait Islanders and are committed to providing a positive and safe work enviroment.</p>

    <!--Sub-heading and input for job reference ID.-->
    <p><label for="jobid" style="margin: 15px;">Job Reference ID</label> 
        <input type="text" name= "jobid" id="jobid" maxlength="5" size="10" required="required" pattern="^[a-zA-Z0-9]{5}$"> </p>
    <p style="margin: 15px;">Please provide a valid Job ID reference!</p>
   
    <!--The fieldset that groups personal information on the user and requests to be filled out.-->
    <div class="row">
        <fieldset>
            <legend>Personal Information</legend>
            <p><label for="firstname" style= "display: block; color: #3d3d3d;">First Name</label>
            <input type="text" name="firstname" id="firstname" size="10"></p>
            <p><label for="lastname" style= "display: block; color: #3d3d3d;">Last Name</label>
            <input type="text" name="lastname" id="lastname" size="10"></p>
            <p><label for="dob" style= "display: block; color: #3d3d3d;">Date of Birth</label> 
            <input type="date" name= "dob" id="dob" size="13"></p>
            <p><label for="streetaddress" style= "display: block; color: #3d3d3d;">Street Address</label> 
            <input type="text" name= "streetaddress" id="streetaddress" size="40"></p>
            <p><label for="suburb" style= "display: block; color: #3d3d3d;">Suburb</label> 
            <input type="text" name= "suburb" id="suburb" size="10"></p>
            <p><label for="state" style= "display: block; color: #3d3d3d;">State</label> 
                <select name="state" id="state">
                    <option value="">Please Select</option>			
                    <option value="vic">VIC</option>			
                    <option value="nsw">NSW</option>
                    <option value="qld">QLD</option>
                    <option value="nt">NT</option>
                    <option value="wa">WA</option>
                    <option value="sa">SA</option>
                    <option value="tas">TAS</option>
                    <option value="act">ACT</option>
                </select>
            <p><label for="postcode" style= "display: block; color: #3d3d3d;">Postcode</label> 
            <input type="text" name= "postcode" id="postcode" size="5"></p>
            <p><label for="email" style= "display: block; color: #3d3d3d;">Email</label> 
                <input type="email" name= "email" id="email"></p> 
            <p><label for="phoneno" style= "display: block; color: #3d3d3d;">Phone Number</label>
                <input type="text" name= "phoneno" id="phoneno" size="12"></p>
        </fieldset>

         <!--The fieldset that lists set skills users are able to tick.-->
        <fieldset>
            <legend>Skill List</legend>
            <p>Please select all that apply!</p>
            <p>
                <input type="checkbox" id="cust_service" name="skill[]" value="cust_service">
                <label for="cust_service">Customer service</label> 
            </p>
            <p>
                <input type="checkbox" id="IT" name="skill[]" value="IT">
                <label for="IT">Basic understandings of IT</label> 
            </p>
            <p>
                <input type="checkbox" id="teamwork" name="skill[]" value="teamwork">
                <label for="teamwork">Experience of working in teams</label> 
            </p>
            <p>
                <input type="checkbox" id="time_managing" name="skill[]" value="time_managing">
                <label for="time_managing">Great time management</label> 
            </p>
            <p>
                <input type="checkbox" id="fieldwork" name="skill[]" value="fieldwork">
                <label for="fieldwork">Worked in a familiar field</label> 
            </p>
            <p>
                <input type="checkbox" id="userinter" name="skill[]" value="userinter">
                <label for="userinter">Familiar with user interfaces</label> 
            </p>
            <p>
                <input type="checkbox" id="codex" name="skill[]" value="codex">
                <label for="codex">Confident in learning basic levels of code</label> 
            </p>
            <p>
                <input type="checkbox" id="codelanguage" name="skill[]" value="codelanguage">
                <label for="codelanguage">Prior knowledge of a coding language</label> 
            </p>
        </fieldset>
    
        <!--The fieldset that prompts users to select their gender.-->
        <fieldset class="fieldright">
            <legend>Gender</legend>
                <p><input type="radio" id="male" name="gender" value="male" required="required">
                <label for="male">Male</label> 

                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label> 
                
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label> 
            </p>
        </fieldset>
    
         <!--The fieldset including an optional text boz that users are able to enter.-->
        <fieldset class="fieldright">
            <legend>Other Skills:</legend>
            <label for="otherskills">Please include any other skills or experience:</label>
			<textarea id="otherskills" name="otherskills" rows="4" cols="40" placeholder="Experience/Skills" style= "width: 70%;"></textarea>
        </fieldset>
    </div>
        <!--Acknowledgment to country-->
        <p style= "max-width: 700px; margin: 20px auto; font-size: 0.9em; color: #444; text-align: center;">We acknowledge the Wurundjeri People of the Kulin Nation, the Traditional Owners of the land on which we work. We pay our respects to Elders past, present and emerging.</p>
        <!--The buttons including a submit and reset form.-->
    <div class="buttons"  style="text-align: center;">
    <input type= "submit" value="Apply" id="subutton">
	<input type= "reset" value="Reset Form" id="resbutton">
    </div>
</form>
</body>
</html>