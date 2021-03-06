<?php

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

function getFirstImageID() {
    global $db;
    $query = $db->prepare( 'SELECT id FROM image LIMIT 1' );
    $query->execute();
    return $query->fetchColumn();
}

function getLastImageID() {
    global $db;
    $query = $db->prepare( 'SELECT * FROM image ORDER BY id DESC LIMIT 1' );
    $query->execute();
    return $query->fetchColumn();
}

function getPreviousImage( $id ) {

    $previous_id = $id;

    $first_id = getFirstImageID();

    $image = false;

    if ($id == $first_id){
        return $previous_id = getLastImageID();
    }

    while ($image === false && $previous_id > $first_id ) {

        $previous_id --;
        $image = getImage( $previous_id );
    }

    return $previous_id;
}


function getNextImage( $id ) {
    $next_id = $id;

    $last_id = getLastImageID();

    $image = false;

    if ($id == $last_id){
        return getFirstImageID();
    }

    while ($image === false && $next_id < $last_id ) {

        $next_id ++;
        $image = getImage( $next_id );

    }

    return $next_id;

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

function getImagesByUser($id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM image WHERE user_id = :id' );
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
    $query->setFetchMode( PDO::FETCH_OBJ);
    return $query->fetchAll();
}

function getTotalImageCount() {
    global $db;
    $query = $db->prepare( 'SELECT COUNT(*) FROM image' );
    $query->execute();

    return (integer) $query->fetch()[0];
}

function getTotalPageCount($per_page = 12) {
    $total = getTotalImageCount();

    return (integer) ceil(getTotalImageCount() / $per_page);
}

function getCurrentOffset(){
    $page_number = max(filter_input(INPUT_GET, 'page'), 1);

    return ($page_number - 1) * 12;
}

/**
 * @param object $image array cast as an object to insert image properties into database
 */
function insertImage($image) {
    global $db;
    $query = $db->prepare('INSERT INTO image (url, title, description, user_id) VALUES (:url, :title, :description, :user_id)');
    $query->bindValue( ':url', $image->url, PDO::PARAM_STR );
    $query->bindValue( ':title', $image->title, PDO::PARAM_STR );
    $query->bindValue( ':description', filter_var($image->description, FILTER_SANITIZE_SPECIAL_CHARS), PDO::PARAM_STR );
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
    $query->bindValue( ':description', filter_var($image->description, FILTER_SANITIZE_SPECIAL_CHARS), PDO::PARAM_STR );
    $query->execute();
}

/**
 * @param $id This is an image ID in the database
 */
function deleteImage($image_id) {
    global $db;
    $query = $db->prepare('DELETE FROM image WHERE id=:image_id');
    $query->bindValue( ':image_id', intval($image_id), PDO::PARAM_INT );
    $query->execute();
}


//-----------------------COMMENT FUNCTIONS-------------------------------------------------------------//

/**
 * @param $image_id $id This is an comment ID in the database
 * @return object|false - Will return a comment object from the database or return false if an invalid ID is provided.
 */
function getComments($image_id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM comment WHERE image_id = :image_id');
    $query->bindValue( ':image_id', $image_id, PDO::PARAM_INT );
    $query->execute();
    $query->setFetchMode( PDO::FETCH_OBJ);
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
 * @param object $comment array cast as an object to insert comment properties into database
 */
function insertComment($comment) {
    global $db;
    $query = $db->prepare('INSERT INTO comment (user_id, image_id, text) VALUES (:user_id, :image_id, :text)');
    $query->bindValue( ':user_id', $comment->user_id, PDO::PARAM_INT );
    $query->bindValue( ':image_id', $comment->image_id, PDO::PARAM_INT );
    $query->bindValue( ':text', filter_var($comment->text, FILTER_SANITIZE_SPECIAL_CHARS),PDO::PARAM_STR );
    $query->execute();
}

/**
 * @param int $id This is an image ID in the database
 * @param $comment array cast as an object to insert comment properties into database
 */
function updateComment($id, $comment) {
    global $db;
    $query = $db->prepare('UPDATE comment SET user_id=:user_id, image_id=:image_id, text=:text WHERE id = :id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->bindValue(':user_id', $comment->user_id, PDO::PARAM_INT);
    $query->bindValue(':image_id', $comment->image_id, PDO::PARAM_INT);
    $query->bindValue( ':text', filter_var($comment->text, FILTER_SANITIZE_SPECIAL_CHARS),PDO::PARAM_STR );
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
 * @param $username returns the username from the database
 */
function getUserByUsername($username) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users WHERE username = :username' );
    $query->bindValue( ':username', filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS), PDO::PARAM_STR );
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
    $query->bindValue( ':password', filter_var($user->password, FILTER_SANITIZE_SPECIAL_CHARS), PDO::PARAM_STR );
    $query->execute();
}


/**
 * @param $id This is an ID of user in the database
 * @param $user array cast as an object to insert user properties into database
 */
function updateUser($id, $user) {
    global $db;
    $query = $db->prepare('UPDATE users SET username=:username, email=:email, password=:password WHERE id = :id');
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->bindValue(':username', $user->username, PDO::PARAM_INT);
    $query->bindValue(':email', $user->email, PDO::PARAM_STR);
    $query->bindValue(':password', filter_var($user->password, FILTER_SANITIZE_SPECIAL_CHARS), PDO::PARAM_STR);
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
    echo $date->format('F d, Y \a\t h:ia');
}


//--------------Form Function-----------------------------------------//

/**
 * @return $errors is an empty template literal array to display different error possibilities.
 */
function processRegistrationForm() {
    $errors = array();

    if (! isset($_POST['registration-form'])){
        return $errors;
    }

    $username =filter_input(INPUT_POST, 'username');

    if ( empty( $username ) ) { // Check if username is empty
        $errors['username'] = 'Please enter a username!';
    } elseif ( usernameExists( $username) ) { // Check if username already exists
        $errors['username'] = 'Sorry, username already exists!';
    }

    $email =filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ( empty( $email ) ) { // Check if email is empty
        $errors['email'] = 'Please enter an email address!';
    } else if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) { // Check if email address is valid
        $errors['email'] = 'Please enter a valid email address!';
    } else if ( emailExists( $email ) ) { // Email already exists
        $errors['email'] = 'Sorry, email already exists!';
    }


    $password =filter_input(INPUT_POST, 'password');
    $verify_password =filter_input(INPUT_POST, 'password_verification');

    if ( empty( $password ) ) { // Check if password is empty
        $errors['password'] = 'Please enter a password!';
    } else if ( $password !== $verify_password ) { // Passwords don't match
        $errors['password'] = 'Passwords do not match!';
        $errors['verify_password'] = 'Passwords do not match!';
    } else if ( strlen( $password ) < 8 ) { // Password too weak
        $errors['password'] = 'Password is too weak!';
    }



    if ( empty( $errors ) ) {

        // Create the user
        $user = (object) [
            'username' => $username,
            'email'    => $email,
            'password' => $password,
        ];

        insertUser( $user );

        // Redirect user to login
        header( 'Location: ' . APP_HOST . '/login.php' );

    }

    return $errors;
}


//-----------------------Process log in form -----------------------//

/**
 * @return $errors is an empty template literal array to display different error possibilities.
 */
function processLogInForm() {
    $errors = array();

    if (! isset($_POST['login-form'])){
        return $errors;
    }

    $username =filter_input(INPUT_POST, 'username');

    if ( empty( $username ) ) { // Check if username is empty
        $errors['username'] = 'Please enter a username!';
    } elseif ( usernameExists( $username) == false ) { // Check if username already exists
        $errors['username'] = 'Sorry, username does not exist!';
    }


    $password =filter_input(INPUT_POST, 'password');
    $user = getUserByUsername($username);

    if ( empty( $password ) ) { // Check if password is empty
        $errors['password'] = 'Please enter a password!';
    }else if(!isset($user, $user->password) || $password != $user->password) { // Incorrect password
        $errors['password'] = 'Incorrect password!';
    }


    if ( empty( $errors ) ) {

        // Log in the user
        logInSession($user->id);


        // Redirect user to image management
        header( 'Location: ' . APP_HOST . '/mgmt.php' );

    }

    return $errors;
}


//-----------------------Log in / Log out---------------------------//

/**
 * @param $id a user id in the database
 */
function logInSession($id) {
    $_SESSION['user_id'] = $id;
}


function logOutSession() {
    session_unset();
    session_destroy();
}

/**
 * @return int
 */
function getCurrentUserId() {
    $user_id = 0;
    if(isLoggedIn()) {
        $user_id =  $_SESSION['user_id'];
    }
    return $user_id;
}


/**
 * @return bool
 */
function isLoggedIn() {
    return isset($_SESSION, $_SESSION['user_id']);
}

//---------------------Upload form-------------------------------//

/**
 * @return array
 */
function processUploadForm() {


    $errors = array();

    if (! isset($_POST['upload_image'])){
        return $errors;
    }

    //Image title is empty

    if(empty($_POST['title'])){
        $errors['title'] = 'Please give the image a title.';
    }

    //No file provided
    //Invalid file type
    //Upload failed


    if(4 === $_FILES['image']['error']) {
        $errors['image'] = 'No files chosen. Please choose a file.';
    }else if('image' !== explode('/', $_FILES['image']['type'])[0]){
        $errors['image'] = 'Invalid file type';
    }else if($_FILES['image']['error'] !== 0){
        $errors['image'] = 'Upload failed.';
    }

    if(empty($errors)){
        $filepath = __DIR__ . '/../assets/img/' . $_FILES['image']['name'];
        $upload_success = move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
        if ($upload_success == false) {
            $errors['image'] = 'Upload failed.';
        }
    }

    if (empty($errors)) {

        insertImage((object) array(
            'url' => APP_HOST . '/assets/img/' . $_FILES['image']['name'] ,
            'title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING) ,
            'description' => filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) ,
            'user_id' =>  getCurrentUserId()

        ));

        header( 'Location: ' . APP_HOST . '/mgmt.php' );
    }


    return $errors;
}


/**
 * This function deletes the image and comments associated with the image.
 */
function processDelete() {
    if(isset($_POST['delete_image'])){

        $image_id = $_POST['image_id'];

        $image = getImage($image_id);


        if(false != $image){

            $filepath = APP_ROOT . '/assets/img/' . basename($image->url);
            unlink($filepath);

            foreach (getComments($image_id) as $comment) {
                deleteComment($comment->id);
            }

            deleteImage($image_id);
        }

    }
}


/**
 * This function processes the insertComment function.
 */
function processComment() {
    if(isset($_POST['insert_comment'])){
        insertComment((object)$_POST);
    }
}

