<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Bob's Entertainment Warehouse</title>
</head>
<body>
<?
//FILE : barker_program5.php
//PROG : Adam Barker
//PURP : Displays proccessed form values of barker_form5.html
echo "<h1> Bob's Entertainment Warehouse</h1><br>";
extract($_POST);
if (!empty($firstName) && !empty($lastName)) {
    if ($gender == "male")
        $gender = "Mr.";
    else if ($gender == "female")
        $gender = "Ms.";
    if ($gender != "blank")
        echo "Thank you $gender $lastName for your interest in
             Bob's Entertainment Warehouse!<br>";
    else
        echo "Thank you $firstName $lastName for your interest in
             Bob's Entertainment Warehouse!<br><br>";
    echo "<h2>Your Movie Selection</h2><br>";
    if (isset($movie)) {
        echo "You have chosen the following movies.
             All we can show you now is the ID Number for the movie.
             More information will be available in the future!<br>";
        foreach ($movie as $value) {
            echo "$value<br>";
        }

    } else
        echo "<span style='color: red'>You have not chosen any movies!<br></span>";
    echo "<br><h2>Your Membership</h2><br>";
    if ($member == 1)
        echo "Thank you for supporting our club, you will begin
             receiving emails shortly describing your dicsounts
             on future purchases!";
    elseif ($member == 2) {
        if (!empty($email))
            echo "Thank you for joining our
                 club, you will be receiving an email,
                 at your email address <span style='color: blue'>
                 $email</span>, shortly describing the benefits
                 of becoming a club member!";
        else
            echo "<span style='color: red'>You did not enter a valid email address, if you
                 would like to receive an email regarding club membership
                 and benefits, please press the back button and input a valid
                 email!</span>";
    } else
        echo "If you become a club member you will be privy to all sorts of
             discounts and benefits. If you are interested please press the
             back button and select 'Interested' from the membership area of
             the form and enter a valid email address!";


} else
    echo "<span style='color: red'>You did not enter a full valid name. Please hit the back button and try again.</span>";
?>
</body>
</html>
