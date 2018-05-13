<?php

include_once "../utils/EmaiValidator.php";
include_once "../database/userUtils.php";
include_once "../constants/registerConstants.php";

define("FAILED" , -1);
define("SUCCESS" , 0);


function saveUserSuccess__FAKE($email, $name, $surname, $password, $passwordConfirm) {

    return array(
        "status" => SUCCESS,
        "userID" => 42
    );
}

function saveUserFail__FAKE($email, $name, $surname, $password, $passwordConfirm) {

    return array(
        "status" => FAILED,
        "reason" => ERROR_SAVING_FAIL
    );
}

function saveUser($email, $name, $surname, $password, $passwordConfirm) {

    if (!isPasswordMatched($password, $passwordConfirm)) {
        // password and confirm password are different
        return array(
            "status" => FAILED,
            "reason" => ERROR_PASSWORD_MISMATCH
        );
    }

    if (!isEmailValid_YES__FAKE($email)) {
        //Email not valid
        return array(
            "status" => FAILED,
            "reason" => ERROR_EMAIL_INVALID
        );
    }

    if (isEmailAlreadyInDatabase_FALSE__FAKE($email)) {
        //Email is in DB
        return array(
            "status" => FAILED,
            "reason" => ERROR_EMAIL_TAKEN
        );
    }

    $newUserID = saveUserToDB_SUCCESS__FAKE($email, $name, $surname, $password);

    if ($newUserID === null) {
        //Something went wrong?
        return array(
            "status" => FAILED,
            "reason" => ERROR_SAVING_FAIL
        );
    }

    return array(
        "status" => SUCCESS,
        "userID" => $newUserID
    );
}

function isPasswordMatched($password, $passwordConfirm) {
    return $password == $passwordConfirm;
}

