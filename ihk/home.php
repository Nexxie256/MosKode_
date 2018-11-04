<?php

    echo("<html>");
    echo("<body style='background:#95a5a6;'>");

    echo("<div style='float:right;margin-right:5px;'>");
    echo("<a href='index.php'>");
    $signout = 'SignOut';
    echo("<button style='color:red;'>".$signout."</button>");
    echo("</a>");
    echo("</div>");
    echo("<h2>Hello!"."&nbsp;<b style='color:green;'>Administrator</b></h2>");
    echo("<center>");

    echo("<h1>");
    echo("<small style='color:#2c3e50;'>");
    echo("International Hospital (Kampala) DBMS!");
    echo("</small>");
    echo("</h1>");
    //welcome
    echo("<hr>");

    echo("</center>");

    echo("<div style='margin-left:300px;margin-right:300px;'>");

    echo("<table style='font:50px;font-size:18px;padding:10px;'>");
    echo("<center>");
    /*User Tables*/
    echo("<tr>");
    echo("<th><b>");
    echo("TABLES");
    echo("<hr>");
    echo("</b></td>");
    echo("<th><b>");
    echo("</tr>");
    //end

    echo("<tr><td>");    
    //users table
    echo("<a href='users.php'>");
    echo("Users");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //End of Users table

    echo("<tr><td>");
    //doctors table
    echo("<a href='doctors.php'>");
    echo("Doctors");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end of doc table

    echo("<tr><td>");
    //patients table
    echo("<a href='patients.php'>");
    echo("Patients");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //End of Patients table

    echo("<tr><td>");
    //Lab_tech table
    echo("<a href='lab_techs.php'>");
    echo("Lab_techs");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end of table

    echo("<tr><td>");
    //accountants table
    echo("<a href='accountants.php'>");
    echo("Accountants");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end of table

    echo("<tr><td>");
    //pharmacist table
    echo("<a href='pharmacists.php'>");
    echo("Pharmacists");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end

    echo("<tr><td>");
    //receptionist table
    echo("<a href='receptionists.php'>");
    echo("Receptionists");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    ///end

    echo("<tr><td>");
    //test table
    echo("<a href='test_results.php'>");
    echo("Test_results");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end

    echo("<tr><td>");
    //prescription table
    echo("<a href='prescriptions.php'>");
    echo("Prescriptions");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end

    echo("<tr><td>");
    //medication table
    echo("<a href='medications.php'>");
    echo("Medications");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end

    echo("<tr><td>");
    //receipts
    echo("<a href='receipts.php'>");
    echo("Receipts");
    echo("</a>");
    echo("<hr>");
    echo("</td>");
    echo("</tr>");
    //end

    echo("</center>");

    echo("</table>");
    
    echo("</div>");
    echo("<hr>");

    echo("</body>");

    echo("</html>");

?>