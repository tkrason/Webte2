<?php

/**
 *  Every call to database that somehow handles users goes here
 */


function getUserIdFromEmail__FAKE($email) {
    return 1;
}

function getUserIdFromEmail($email) {

    //TODO: Call DB, return email userID if there is, null if not

    return null;
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

function isPasswordMatched($password, $passwordConfirm) {
    return $password == $passwordConfirm;
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







