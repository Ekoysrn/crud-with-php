<?php
// conection to database
$conn = mysqli_connect("localhost", "root", "", "memberjkt48");

// function to add array
function query($result)
{
    global $conn;
    $res = mysqli_query($conn, $result);
    $kotak = [];
    while ($baju = mysqli_fetch_assoc($res)) {
        $kotak[] = $baju;
    }
    return $kotak;
};



// function add data from input user
function add($data)
{
    global $conn;

    // validation data 
    $fullname = htmlspecialchars($data["fullname"]);
    $birtday = htmlspecialchars($data["birtday"]);
    $generation = htmlspecialchars($data["generation"]);
    $nickname = htmlspecialchars($data["nickname"]);
    $profile = upload();
    if (!$profile) {
        return false;
    }


    // insert data
    $ad = "INSERT INTO memberjkt48 VALUES ('','$fullname','$birtday','$generation','$nickname','$profile')";

    // query mysql
    mysqli_query($conn, $ad);

    // return row affected
    return mysqli_affected_rows($conn);
}


function upload()
{
    $nameFile = $_FILES["profile"]["name"];
    $typeFile = $_FILES["profile"]["type"];
    $tmpFile = $_FILES["profile"]["tmp_name"];
    $errFile = $_FILES["profile"]["error"];
    $sizeFile = $_FILES["profile"]["size"];
    $directory = 'imgJkt/';

    if ($errFile == 4) {
        // echo "<script>
        //     alert('silahkan masukan image');
        // </script>";
        return 'avatar.png';
    }

    $validext = ["jpg", "jpeg", "png", "webp"];
    $extensi = explode('.', $nameFile);
    $extensi = strtolower(end($extensi));

    if (!in_array($extensi, $validext)) {
        echo "<script>
                alert('yang tidak memenuhi syarat extensi')
            </script>";
        return false;
    }

    if (!$typeFile == 'image.png' && !$typeFile == 'image.jpg' && !$typeFile == 'image.webp') {
        echo "<script>
                alert('yang anda masukan bukan gambar')
            </script>";
        return false;
    }

    if ($sizeFile > 5000000) {
        echo "<script>
                alert('gambar yang anda masukan terlalu besar')
            </script>";
        return false;
    }

    $randomName = uniqid();
    $randomName .= '.';
    $randomName .= $extensi;

    move_uploaded_file($tmpFile, $directory . $randomName);
    return $randomName;
}


function cover()
{

    $nameFile = $_FILES["thumbnail"]["name"];
    $typeFile = $_FILES["thumbnail"]["type"];
    $tmpFile = $_FILES["thumbnail"]["tmp_name"];
    $errFile = $_FILES["thumbnail"]["error"];
    $sizeFile = $_FILES["thumbnail"]["size"];
    $directory = 'imgJkt/';

    if ($errFile == 4) {
        // echo "<script>
        //     alert('silahkan masukan image');
        // </script>";
        return 'backgroundDefault.webp';
    }

    $validext = ["jpg", "jpeg", "png", "webp"];
    $extensi = explode('.', $nameFile);
    $extensi = strtolower(end($extensi));

    if (!in_array($extensi, $validext)) {
        echo "<script>
                alert('yang tidak memenuhi syarat extensi')
            </script>";
        return false;
    }

    if (!$typeFile == 'image.png' && !$typeFile == 'image.jpg' && !$typeFile == 'image.webp') {
        echo "<script>
                alert('yang anda masukan bukan gambar')
            </script>";
        return false;
    }

    if ($sizeFile > 5000000) {
        echo "<script>
                alert('gambar yang anda masukan terlalu besar')
            </script>";
        return false;
    }

    $randomName = uniqid();
    $randomName .= '.';
    $randomName .= $extensi;

    move_uploaded_file($tmpFile, $directory . $randomName);
    return $randomName;
}



// function delete
function dell($id)
{
    global $conn;

    // delete image in folder img
    $member = query("SELECT * FROM memberjkt48 WHERE id = $id")[0];

    if ($member['profile'] != 'JKT48.webp') {
        unlink('imgJkt/' . $member['profile']);
    }

    // delete data
    $de = "DELETE FROM memberjkt48 WHERE id = $id";
    // query
    mysqli_query($conn, $de);
    // return row affected
    return mysqli_affected_rows($conn);
}

// function delete
function delete_user($id)
{
    global $conn;

    // delete image in folder img
    $user = query("SELECT * FROM users WHERE id = $id")[0];

        $pathprofile = "imgJkt/".$user["profile"];
        $pathThumbnail ="imgJkt/".$user["thumbnail"];

        if(file_exists($pathprofile)){
            unlink($pathprofile);
        }

        if(file_exists($pathprofile)){
            unlink($pathThumbnail);
        }

    // delete data
    $de = "DELETE FROM users WHERE id = $id";
    // query
    mysqli_query($conn, $de);
    // return row affected
    return mysqli_affected_rows($conn);
}

function change($data){
    global $conn;

    $id = $data["id"];
    $fullname = htmlspecialchars($data["fullname"]);
    $birtday = htmlspecialchars($data["birtday"]);
    $generation = htmlspecialchars($data["generation"]);
    $nickname = htmlspecialchars($data["nickname"]);
    $profile_last = htmlspecialchars($data["profile_last"]);

    $profile = upload();
    if (!$profile) {
        return false;
    }

    if ($profile == 'avatar.png') {
        $profile = $profile_last;
    }

    $ud = "UPDATE memberjkt48 SET
            fullname = '$fullname',
            birtday = '$birtday',
            generation = '$generation',
            nickname = '$nickname',
            profile = '$profile'
            WHERE id = '$id'";

    mysqli_query($conn, $ud);

    return mysqli_affected_rows($conn);
}

// function change_thumbnail($data){
//     global $conn;

//     $id = $data["id"];
//     $thumbnail_last = htmlspecialchars($data["thumbnail_last"]);

//     // mengambil data gambar yang lama
//     $result = mysqli_query($conn, "SELECT thumbnail FROM users WHERE id = '$id'");
//     $old_data = mysqli_fetch_assoc($result);
//     $old_thumbnail = $old_data["thumbnail"];

//     $thumbnail = cover();
//     if (!$thumbnail) {
//         return false;
//     }

//     if(!$result || !$old_data){
//         echo "error";
//         return false;
//     }

//     if ($thumbnail == 'backgroundDefault.webp') {
//         $thumbnail = $thumbnail_last;
//     }

//     if ($thumbnail != 'backgroundDefault.webp' && $thumbnail != $old_thumbnail) {
//         $file_path = 'imgJkt/'.$old_thumbnail;
//         if (file_exists($file_path) && is_writable($file_path)) {
//             unlink($file_path);
//         }
//     } else {
//         $thumbnail = $old_thumbnail;
//     }


//     $ud = "UPDATE users SET thumbnail = '$thumbnail' WHERE id = '$id'";

//     mysqli_query($conn, $ud);

//     return mysqli_affected_rows($conn);
// }

function change_profile($data){
    global $conn;

    $id = $data["id"];
    $profile_last = htmlspecialchars($data["profile_last"]);
    $thumbnail_last = htmlspecialchars($data["thumbnail_last"]);

    // mengambil data gambar yang lama
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $old_data = mysqli_fetch_assoc($result);
    $old_thumbnail = $old_data["thumbnail"];
    $old_profile = $old_data["profile"];

    $thumbnail = cover();
    if (!$thumbnail) {
        return false;
    }

    if(!$result || !$old_data){
        echo "error";
        return false;
    }

    if ($thumbnail == 'backgroundDefault.webp') {
        $thumbnail = $thumbnail_last;
    }

    if ($thumbnail != 'backgroundDefault.webp' && $thumbnail != $old_thumbnail) {
        $file_path = 'imgJkt/'.$old_thumbnail;
        if (file_exists($file_path) && is_writable($file_path)) {
            unlink($file_path);
        }
    } else {
        $thumbnail = $old_thumbnail;
    }

    $profile = upload();
    if (!$profile) {
        return false;
    }

    if ($profile == 'avatar.png') {
        $profile = $profile_last;
    }

    if(!$result || !$old_data){
        echo "error";
        return false;
    }

    if ($profile != 'avatar.png' && $profile !=  $old_profile) {
        $file_path = 'imgJkt/'.$old_profile;
        if (file_exists($file_path) && is_writable($file_path)) {
            unlink($file_path);
        }
    } else {
        $profile = $old_profile;
    }

    $ud = "UPDATE users SET thumbnail = '$thumbnail',profile = '$profile' WHERE id = '$id'";

    mysqli_query($conn, $ud);

    return mysqli_affected_rows($conn);
}

function change_datauser($data)
{
    global $conn;

    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $bio = htmlspecialchars($data["bio"]);

    if ($username == '' && $fullname == '' && $bio == '') {
        echo "<script>
            alert('empty data, please input valid data');
            window.location.href = 'editprofile.php';
        </script>";

        return false;
    }

    $same = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' AND id != $id");

    if (mysqli_fetch_assoc($same)) {
        echo "<script>
            alert('username telah terdaftar');
            window.location.href = 'editprofile.php';
        </script>";

        return false;
    }

    $ud = "UPDATE users SET
            username = '$username',
            fullname = '$fullname',
            bio = '$bio'
            WHERE id = '$id'";

    mysqli_query($conn, $ud);

    return mysqli_affected_rows($conn);
}


function search($keyword)
{
    $q = "SELECT * FROM memberjkt48 WHERE
            fullname LIKE '%$keyword%' OR
            generation LIKE '%$keyword%'";

    return query($q);
}

function register($data)
{
    global $conn;


    $username = stripslashes($data["username"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $pass = mysqli_real_escape_string($conn, $data["pass"]);

    $same = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($same)) {
        echo "<script>
            alert('username sudah terdaftar')
        </script>";

        return false;
    }

    if ($password !== $pass) {
        echo "<script>
            alert('confirm password anda tidak sesuai dengan yang pertama')
        </script>";

        return false;
    }

    if ($username === '' && $password === '') {
        echo "<script>
            alert('username dan password tidak bole kosong');
        </script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password','$fullname','','','','')");


    return mysqli_affected_rows($conn);
}
