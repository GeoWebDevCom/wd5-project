
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
 * @param $image
 * @return mixed
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


function upDateImage($id, $image) {
    global $db;
    return '';
}

function deleteImage($id) {
    global $db;
    return '';
}


//-----------------------COMMENT FUNCTIONS-------------------------------------------------------------//


function getComments($image_id)
{
//    global $db;
//    $query = $db->prepare( 'SELECT * FROM comments WHERE id = :image_id');
//    $query->bindValue( ':image_id', $image_id, PDO::PARAM_INT );
//    $query->execute();
//    return $query->fetchObject();
}

function getComment($id) {
    global $db;
    return '';
}

function insertComment($comment) {
    global $db;
    $query = $db->prepare('INSERT INTO comments (user_id, image, text) VALUES (:user_id, :image, :text)');
    $query->bindValue( ':user_id', $comment->user_id, PDO::PARAM_INT );
    $query->bindValue( ':image', $comment->image, PDO::PARAM_INT );
    $query->bindValue( ':text', $comment->text, PDO::PARAM_STR );
    $query->execute();
}

function updateComment($id, $comment) {
    global $db;
    return '';
}

function deleteComment($id) {
    global $db;
    return '';
}


//-----------------------USERS FUNCTIONS-------------------------------------------------------------//

function getUsers() {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users' );
    $query->execute();
    $query->setFetchMode( PDO::FETCH_OBJ);
    return $query->fetchAll();
}

//var_dump(getUsers());
//die();

function getUser($id) {
    global $db;
    $query = $db->prepare( 'SELECT * FROM users WHERE id = :id' );
    $query->bindValue( ':id', $id, PDO::PARAM_INT );
    $query->execute();
    return $query->fetchObject();
}

function insertUser($user) {
    global $db;
    return '';
}

function updateUser($id, $user) {
    global $db;
    return '';
}


function deleteUser($id) {
    global $db;
    return '';
}


//----------------Timestamp Function--------------------------------------//

function displayDate($uploaded_date) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $uploaded_date);
//    var_dump($uploaded_ate, $date);
    echo $date->format('F d, Y \a\t h:ia');
}






