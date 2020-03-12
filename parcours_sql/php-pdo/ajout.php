<?php
                $ville=$_POST['ville'];
                $haut=$_POST['haut'];
                $bas=$_POST['bas'];
                $servname = "localhost"; $dbname = "weatherapp"; $user = "christinesautelet"; $pass = "user";
                
                try{
                    $dbco = new PDO("mysql:host=$servname;dbname=$dbname; charset=utf8", $user, $pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $donnees = [
                        'ville' => ucfirst($ville),
                        'haut' => $haut, 
                        'bas' => $bas, 
                    ];
                    //On utilise les requêtes préparées et des marqueurs nommés 
                    $sth = $dbco->prepare(
                        "INSERT INTO meteo VALUES (:ville, :haut, :bas)"
                    );
                    $sth->execute($donnees);
                    header('Location: index.php');
                    echo 'Entrée ajoutée dans la table';
                }
                      
                catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
            ?>
