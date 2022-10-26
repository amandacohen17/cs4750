<?php
function addRecipe($recipe_ID, $name,$photo, $serving_size, $user_ID){
    global $db;
    $query = "INSERT INTO Recipe VALUES (:recipe_ID, :name, :photo, :serving_size,:user_ID)";
    $statement->bindValue(':recipe_ID', $recipe_ID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':photo', $photo);
    $statement->bindValue(':serving_size', $serving_size);
    $statement->bindValue(':user_ID', $user_ID);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        if ($statement->row.count()==0)
            echo "Failed to add a Recipe <br/>";
        

    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addAmountOf($ingredient_ID, $Measurment_ID, $recipe_ID){
    global $db;
    $query = "INSERT INTO AmountOf VALUES (:ingredient_ID, :Measurement_ID, :recipe_ID)";
    $statement->bindValue(':Ingredient_ID', $Ingredient_ID);
    $statement->bindValue(':Measurement_ID', $Measurement_ID);
    $statement->bindValue(':recipe_ID', $recipe_ID);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
}

function addHas($Review_ID, $recipe_ID){
    global $db;
    $query = "INSERT INTO Has VALUES (:Review_ID, :recipe_ID)";
    $statement->bindValue(':Review_ID', $Review_ID);
    $statement->bindValue(':recipe_ID', $recipe_ID);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addIngredient($Ingredient_ID, $name){
    global $db;
    $query = "INSERT INTO Ingredient VALUES (:Ingredient_ID, :name)";
    $statement->bindValue(':Ingredient_ID', $Ingredient_ID);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addKitchen_Equipment($Equipment_ID, $name){
    global $db;
    $query = "INSERT INTO Kitchen_Equipment VALUES (:Equipment_ID, :name)";
    $statement->bindValue(':Eqipment_ID', $Equipment_ID);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addMeasurement($measurement_ID, $Number_Amount, $Unit){
    global $db;
    $query = "INSERT INTO Measurement VALUES (:measurement_ID, :Number_Amount, :Unit)";
    $statement->bindValue(':measurement_ID', $measurement_ID);
    $statement->bindValue(':Number_Amount', $Number_Amount);
    $statement->bindValue(':Unit', $Unit);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addRecipe_Cuisine($Recipe_ID, $Cuisine){
    global $db;
    $query = "INSERT INTO Recipe_Cuisine VALUES (:Recipe_ID, :Cuisine)";
    $statement->bindValue(':Recipe_ID', $Recipe_ID);
    $statement->bindValue(':Cuisine', $Cuisine);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addRecipe_Instructions($Recipe_ID, $Instructions){
    global $db;
    $query = "INSERT INTO Recipe_Instructions VALUES (:Recipe_ID, :Instructions)";
    $statement->bindValue(':Recipe_ID', $Recipe_ID);
    $statement->bindValue(':Instructions', $Instructions);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addRequires($Recipe_ID, $equipment_ID){
    global $db;
    $query = "INSERT INTO Requires VALUES (:Recipe_ID, :equipment_ID)";
    $statement->bindValue(':Recipe_ID', $Recipe_ID);
    $statement->bindValue(':equipment_ID', $equipment_ID);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addReview($Review_ID, $upload_date, $star_rating, $message, $user_ID){
    global $db;
    $query = "INSERT INTO Review VALUES (:Review_ID, :upload_date, :star_rating, :message, :user_ID)";
    $statement->bindValue(':Review_ID', $Review_ID);
    $statement->bindValue(':upload_date', $upload_date);
    $statement->bindValue(':star_rating', $star_rating);
    $statement->bindValue(':message', $message);
    $statement->bindValue(':user_ID', $user_ID);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

function addWebUser($User_ID, $name, $email){
    global $db;
    $query = "INSERT INTO addWebUser VALUES (:User_ID, :name, :email)";
    $statement->bindValue(':User_ID', $User_ID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
    catch (PDOException $e){
        echo $e->getMessage();
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

#this is for our main page to show all the names and photos
function getRecipeNameandPhoto()
{
    global $db; 
    $query = "SELECT name, photo FROM Recipe";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();   // fetch()
    $statement->closeCursor();
    return $result;
}

#search function
function getRecipeByName($name)  
{
    global $db;
    $query = "SELECT * FROM Recipe where name = :name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $result = $statement->fetch(); 
    $statement->closeCursor();    
    return $result;
}

#user functions
function getAllUsers()
{
    global $db; 
    $query = "SELECT * FROM Web_User";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();   // fetch()
    $statement->closeCursor();
    return $result;
}
function getUserByID($User_ID)
{
    global $db;
    $query = "SELECT * FROM Web_User WHERE User_ID = :User_ID";
    $statement = $db->prepare($query);
    $statement->bindValue(':User_ID', $User_ID);
    $statement->execute();
    $result = $statement->fetch();   // fetch()
    $statement->closeCursor();
    return $result;
}
function updateUser($User_ID, $Name, $Email)
{
    // get instance of PDO
    // prepare statement
    //  1) prepare 
    //  2) bindValue, execute
    global $db;
    $query = "UPDATE Web_User SET Name=:Name, Email=:Email WHERE User_ID=:User_ID";
    $statement = $db->prepare($query);
    $statement->bindValue(':User_ID', $User_ID);
    $statement->bindValue(':Name', $Name);
    $statement->bindValue(':Email', $Email);
    $statement->execute();
    $statement->closeCursor();

    // $statement->query()
    

}


function deleteUser($User_ID)
{

    global $db;
    $query = "DELETE FROM Web_User WHERE User_ID=:User_ID";
    $statement = $db->prepare($query);
    $statement->bindValue(':User_ID', $User_ID);
    $statement->execute();
    $statement->closeCursor();
    
}
?>
