<?php

include __DIR__ . '/config.php';

$db = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD );


//-----------------------IMAGE FUNCTIONS-------------------------------------------------------------//

/**
 * @param $id - This is an image ID in the database
 *
 *
 * @return object|false - Will return an image object from the database or return false if an invalid ID is provided.
 */

function getImage ($id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM image WHERE id = :id' );
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
    return $query->fetchObject();
}

/**
 * @param int $count - The number of object in the array
 * @param int $offset - The ID number at which the array starts
 */
function getImages($count = 12, $offset = 0) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM image LIMIT :offset,:count' );
    $query->bindValue( ':count', $count, PDO::PARAM_INT );
    $query->bindValue( ':offset', $offset, PDO::PARAM_INT );
    $query->execute();
    $query->setFetchMode( PDO::FETCH_OBJ);
    return $query->fetchAll();
}

/**
 * @param $image array cast as an object to insert image properties into database
 */
function insertImage($image) {
    global $db;
    $query = $db->prepare('INSERT INTO image (url, title, description, user_id) VALUES (:url, :title, :description, :user_id)');
    $query->bindValue( ':url', $image->url, PDO::PARAM_STR );
    $query->bindValue( ':title', $image->title, PDO::PARAM_STR );
    $query->bindValue( ':description', $image->description, PDO::PARAM_STR );
    $query->bindValue( ':user_id', $image->user_id, PDO::PARAM_INT );
    $query->execute();
}

/**
 * @param $id This is an image ID in the database
 * @param $image array cast as an object to insert image properties into database
 */
function updateImage($id, $image) {
    global $db;
    $query = $db->prepare('UPDATE image SET url=:url, title=:title, description=:description WHERE id = :id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->bindValue(':url', $image->url, PDO::PARAM_STR);
    $query->bindValue(':title', $image->title, PDO::PARAM_STR);
    $query->bindValue(':description', $image->description, PDO::PARAM_STR);
    $query->execute();
}

/**
 * @param $id This is an image ID in the database
 */
function deleteImage($id) {
    global $db;
    $query = $db->prepare('DELETE FROM image WHERE id=:id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
}


//-----------------------COMMENT FUNCTIONS-------------------------------------------------------------//

/**
 * @param $image_id $id This is an comment ID in the database
 * @return object|false - Will return a comment object from the database or return false if an invalid ID is provided.
 */
function getComments($image_id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM comment WHERE id = :image_id');
    $query->bindValue( ':image_id', $image_id, PDO::PARAM_INT );
    $query->execute();
    return $query->fetchAll();
}

/**
 * @param $id This is an comment ID in the database
 * @return object|false - Will return a comment object from the database or return false if an invalid ID is provided.
 */
function getComment($id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM comment WHERE id = :id' );
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
    return $query->fetchObject();
}

/**
 * @param $comment array cast as an object to insert comment properties into database
 */
function insertComment($comment) {
    global $db;
    $query = $db->prepare('INSERT INTO comment (user_id, image_id, text) VALUES (:user_id, :image_id, :text)');
    $query->bindValue( ':user_id', $comment->user_id, PDO::PARAM_INT );
    $query->bindValue( ':image_id', $comment->image_id, PDO::PARAM_INT );
    $query->bindValue( ':text', $comment->text, PDO::PARAM_STR );
    $query->execute();
}

/**
 * @param $id This is an image ID in the database
 * @param $comment array cast as an object to insert comment properties into database
 */
function updateComment($id, $comment) {
    global $db;
    $query = $db->prepare('UPDATE comment SET user_id=:user_id, image_id=:image_id, text=:text WHERE id = :id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->bindValue(':user_id', $comment->user_id, PDO::PARAM_INT);
    $query->bindValue(':image_id', $comment->image_id, PDO::PARAM_INT);
    $query->bindValue(':text', $comment->text, PDO::PARAM_STR);
    $query->execute();
}


/**
 * @param $id This is a comment ID in the database
 */
function deleteComment($id) {
    global $db;
    $query = $db->prepare('DELETE FROM comment WHERE id=:id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
}


//-----------------------USERS FUNCTIONS-------------------------------------------------------------//


/**
 * @return array This is an array of users in the database
 */
function getUsers() {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users' );
    $query->execute();
    $query->setFetchMode( PDO::FETCH_OBJ);
    return $query->fetchAll();
}

//var_dump(getUsers());
//die();


/**
 * @param $id This is a user ID in the database
 * @return object|false - Will return an user object from the database or return false if an invalid ID is provided.
 */
function getUser($id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users WHERE id = :id' );
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
    return $query->fetchObject();
}


/**
 * @param $user array cast as an object to insert user properties into database
 */
function insertUser($user) {
    global $db;
    $query = $db->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $query->bindValue( ':username', $user->username, PDO::PARAM_INT );
    $query->bindValue( ':email', $user->email, PDO::PARAM_STR );
    $query->bindValue( ':password', $user->password, PDO::PARAM_STR );
    $query->execute();
}


/**
 * @param $id This is an ID of user in the database
 * @param $user array cast as an object to insert user properties into database
 */
function updateUser($id, $user) {
    global $db;
    $query = $db->prepare('UPDATE users SET user_id=:user_id, email=:email, password=:password WHERE id = :id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->bindValue(':user_id', $user->user_id, PDO::PARAM_INT);
    $query->bindValue(':email', $user->email, PDO::PARAM_STR);
    $query->bindValue(':password', $user->password, PDO::PARAM_STR);
    $query->execute();
}

/**
 * @param $id This is an ID of user in the database
 */
function deleteUser($id) {
    global $db;
    $query = $db->prepare('DELETE FROM users WHERE id=:id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
}

/**
 * @param $username id of a user in the database
 * @return bool
 */
function usernameExists($username) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users WHERE username = :username' );
    $query->bindValue( ':username', $username, PDO::PARAM_INT );
    $query->execute();


    $user = $query->fetchObject();
    return (bool) $user;
}


/**
 * @param $email
 * @return bool
 */
function emailExists($email) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users WHERE email = :email' );
    $query->bindValue( ':email', $email, PDO::PARAM_STR );
    $query->execute();


    $user = $query->fetchObject();
    return (bool) $user;
}



//----------------Timestamp Function--------------------------------------//

/**
 * @param $uploaded_date array cast as an object to insert timestamp into database
 */
function displayDate($uploaded_date) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $uploaded_date);
//    var_dump($uploaded_ate, $date);
    echo $date->format('F d, Y \a\t h:ia');
}



//--------------Form Function-----------------------------------------//

function processRegistrationForm() {
    $errors = array();

    if (! isset($_POST['registration-form'])){
        return $errors;
    }

    $username =filter_input(INPUT_POST, 'username');
    //Check if username was entered
    if (empty($username)) {
        return('No username entered');
    }

    //Check if username already exists
    if (usernameExists($username)){
        return('username already exists');
    }


    $email =filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    //Invalid email address
    if (empty($email)){
        return('Invalid Email');
    }

    //Email already exists
    if (emailExists($email)){
        return('email already exists');
    }


    $password =filter_input(INPUT_POST, 'password');
    $verify =filter_input(INPUT_POST, 'password_verification');

    //Passwords don't match
    if ($password !== $verify){
        return('Passwords do not match');
    }

    //Password is too weak
    if (strlen($password) < 8) {
        return('Password is to week!');
    }




    //Create the user
    $user = (object)[
        'username' => $username,
        'email' => $email,
        'password' => $password,
    ];
//    insertUser($user);


    //Redirect user to login
    header('Location:' . APP_HOST . '/registration.php');

    return $errors;
}






