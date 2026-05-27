<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "description" content = "Apply Page">
    <meta name = "keywords" content = "HTML, doctype, head, body, meta, paragraph, headings, strong, emphasis">
    <meta name = "author" content = "Bianca Zerveas">
    <link rel="stylesheet" href="styles/shopnest.css">
    <title>Apply</title>
</head>
<body>
<header>
    <!--Company logo image which is displayed at the top of the webpage.-->
    <img src="images/company_logo.png" alt="ShopNest Logo">
    <style>
        fieldset {
            width: 45%;
            border: 2px solid #1e3a8a;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        input, select, textarea {
            padding: 6px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        body{background:#f4f6f8;
            padding: 15px;
        }

        .row fieldset{
            width: 45%;
            min-width: 320px;
        }
    </style>

</header>

<!--The navigation bar containing the links to the other files/webpages that users can access-->

    <!--Forms method and action.-->
    <section id="form">
            <form action="process_eoi.php" method="POST">

    

        <!--Header and description of the apply page-->
        <h1 style = "text-align: left; color:  #1e3a8a;">ShopNest Application Page</h1>
        <p style = "margin: 0; line-height: 0;"><strong>Welcome to the ShopNest job application page! Please complete all required fields and let's see if you have what it takes to join our team!</strong></p>
        <p>We encourage applications from Aboriginal and Torres Strait Islanders and are committed to providing a positive and safe work enviroment.</p>

        <!--Sub-heading and input for job reference ID.-->
        <p><label for="jobid">Job Reference ID</label> 
            <input type="text" name= "jobid" id="jobid" maxlength="5" size="10" pattern="^[a-zA-Z0-9]{5}$"> </p>
        <p>Please provide a valid Job ID reference!</p>
    
        <!--The fieldset that groups personal information on the user and requests to be filled out.-->
        <div class="row">
            <fieldset>
                <legend>Personal Information</legend>
                <p><label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" size="10" placeholder="Enter First Name!"></p>
                <p><label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" size="10" placeholder="Enter Last Name!"></p>
                <p><label for="dob">Date of Birth</label> 
                <input type="date" name= "dob" id="dob" size="13"></p>
                <p><label for="streetaddress">Street Address</label> 
                <input type="text" name= "streetaddress" id="streetaddress" size="40" placeholder= "Your address!"></p>
                <p><label for="suburb">Suburb</label> 
                <input type="text" name= "suburb" id="suburb" size="10" placeholder="Your Suburb!"></p>
                <p><label for="state">State</label> 
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
                <p><label for="postcode">Postcode</label> 
                <input type="text" name= "postcode" id="postcode" size="5" placeholder="Your 4 digit postcode!"></p>
                <p><label for="email">Email</label> 
                    <input type="email" name= "email" id="email"></p> 
                <p><label for="phoneno">Phone Number</label>
                    <input type="text" name= "phoneno" id="phoneno" size="12" placeholder="Phone number!"></p>
            </fieldset>

            <!--The fieldset that lists set skills users are able to tick.-->
            <fieldset>
                <legend>Skill List</legend>
                <p>Please select all that apply!</p>
                <p><label for="cust_service">Customer service</label> 
                    <input type="checkbox" id="cust_service" name="skill[]" value="cust_service"></p>
                <p><label for="IT">Basic understandings of IT</label> 
                    <input type="checkbox" id="IT" name="skill[]" value="IT"></p>
                <p><label for="teamwork">Experience of working in teams</label> 
                    <input type="checkbox" id="teamwork" name="skill[]" value="teamwork"></p>
                <p><label for="time_managing">Great time management</label> 
                    <input type="checkbox" id="time_managing" name="skill[]" value="time_managing"></p>
                <p><label for="fieldwork">Worked in a similar field</label> 
                    <input type="checkbox" id="fieldwork" name="skill[]" value="fieldwork"></p>
                <p><label for="userinter">Familiar with user interfaces</label> 
                    <input type="checkbox" id="userinter" name="skill[]" value="userinter"></p>
                <p><label for="codex">Confident in learning basic levels of code</label> 
                    <input type="checkbox" id="codex" name="skill[]" value="codex"></p>
                <p><label for="codelanguage">Prior knowledge of a coding language</label> 
                    <input type="checkbox" id="codelanguage" name="skill[]" value="codelanguage"></p>
                </p>
            </fieldset>
        
            <!--The fieldset that prompts users to select their gender.-->
            <fieldset class="fieldright">
                <legend>Gender</legend>
                    <p><label for="male">Male</label> 
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="female">Female</label> 
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="other">Other</label> 
                    <input type="radio" id="other" name="gender" value="other">
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
        <div class="buttons" style="text-align: center; margin-top: 20px;">
        <input type= "submit" value="Apply" id="subutton">
        <input type= "reset" value="Reset Form" id="resbutton">
        </div>
    </form>
    </section>
</body>
</html>