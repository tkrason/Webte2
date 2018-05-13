<?php

/**
 *  Every call to database that somehow handles users goes here
 */

include_once '../database/createConnection.php';

function getUserIdFromEmail__FAKE($email) {
    return 1;
}

/**
 * For testing purposes, substitute this for getUserIdFromEmail() too
 * see behaviour when user with given email is not in DB
 *
 * @param $email
 * @return null
 */
function getUserIdFromEmail_USER_NON_EXISTENT__FAKE($email) {
    return null;
}

/**
 * Returns userID for given email on NULL if email is not found
 *
 * @param $email
 * @return int|null
 */
function getUserIdFromEmail($email) {

    //TODO: Call DB, return email userID if there is, null if not

    $conn = createConnectionFromConfigFileCredentials();
    $stmn = $conn->prepare("SELECT User.id FROM w2final.User WHERE email = ?");
    $stmn->bind_param("s",$email);
    $stmn->execute();

    $result = $stmn->get_result();

    if(mysqli_num_rows($result) === 0) {
        //Email not in DB
        return null;
    }

    $resultRow = $result->fetch_assoc();
    return $resultRow['id'];
}

function isEmailAlreadyInDatabase_TRUE__FAKE($email) {
    return true;
}

function isEmailAlreadyInDatabase_FALSE__FAKE($email) {
    return false;
}

function isEmailAlreadyInDatabase($email) {
    return getUserIdFromEmail($email) == null ? false : true;
}

function getUserFromUserId__FAKE($userID) {

    //TODO: Add more stuff to represent user, might be class in future
    return array(
        'userID' => 1,
        'passwordHash' => 'hash',
        'salt' => 'salt',
        'name' => 'Jozko',
        'surname' => 'Mrkvicka',
        'City' => 'Bratislava'
    );
}

function getUserFromUserId($userID) {

    //TODO: Call DB, get real user data

    return null;
}

function getUserRoleFromUserId($userID) {
    //TODO: Call DB, get real user data
    return null;
}

function getUserRoleFromUserId__FAKE($userID) {
    return array(
        'roleID' => 1,
        'role' => ADMIN_ROLE,
    );
}

function saveUserToDB_SUCCESS__FAKE($email, $name, $surname, $password) {
    return 1;
}

function saveUserToDB($email, $login, $name, $surname, $password) {

}

function findUsersActiveRoute__FAKE($userID) {
    return 1;
}

function findUsersActiveRoute($userID) {

    //TODO: Look in DB and find his active routeID

}







