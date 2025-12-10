<?php
// Formulario 1
    if(isset($_POST['name']))
    else echo $_POST['name'];
    echo <<<_END
        <html>
            <head>
                <title>Form Test</title>
            </head>
            <body>
                Your name is: $name<br>
                <form method="post" action="formtest2.php">
                    What is your name?
                    <input type="text" name="name">
                    <input type="submit">
                </form>
            </body>
            </html>
    _END;
?>