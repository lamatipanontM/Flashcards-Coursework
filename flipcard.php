<!-- Allow users to flip between term and definition and cards -->
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstraps -->
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
    <div class="row">
        <div class="col-sm-3 col">
            <button onclick="location.href='flash.php'" type="button">Flip</button>
        </div>
        <div class="col-sm-4 col">
                <?php
                session_start();
                if (!isset($_SESSION["side"])){// make it on the term side
                    $_SESSION["side"]=1;
                }
                if ($_SESSION["side"]==0){
                    $_SESSION["side"]=1;}
                else{
                    $_SESSION["side"]=0;
                }

                $q=$_GET["value"];
                $card = $_SESSION["deck"][$q][$_SESSION["side"]];
                    
                print("<h1>".$card."</h1><br>");
                ?>
                
            </div>
    </div>
    </body>
    </html>