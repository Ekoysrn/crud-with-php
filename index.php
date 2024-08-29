<?php 
    // create data use array
    $memberJKT48 = [
        [
        "fullname" => "Shani Indira Natio",
        "birtday" => "October 5, 1998",
        "Generation" => "3rd Generation",
        "nickname" => "Shani",
        "profile" => "shani.webp"
        ],
        [
        "fullname" => "Flora Shafiqa Riyadi",
        "birtday" => "April 4, 2005",
        "Generation" => "8th Generation",
        "nickname" => "Flora",
        "profile" => "flora.webp"
        ], 
        [
        "fullname" => "Jinan Safa Safira",
        "birtday" => "June 8, 1999 ",
        "Generation" => "3rd Generation",
        "nickname" => "Jinan",
        "profile" => "jinan.webp"
        ],
        [
        "fullname" => "Cornelia Syafa Vanisa",
        "birtday" => "July 26, 2002",
        "Generation" => "8th Generation",
        "nickname" => "Oniel ",
        "profile" => "oniel.webp"
        ],
        [
        "fullname" => "Shania Gracia Harlan",
        "birtday" => "August 31, 1999",
        "Generation" => "3rd Generation",
        "nickname" => "Gracia",
        "profile" => "gracia.webp"
        ],
        [
        "fullname" => "Fiony Alveria Tantri",
        "birtday" => "February 4, 2002",
        "Generation" => "8th Generation",
        "nickname" => "Fiony ",
        "profile" => "fiony.webp"
        ],
        [
        "fullname" => "Freyanashifa Jayawardana",
        "birtday" => "February 13, 2006",
        "Generation" => "7th Generation",
        "nickname" => "freya",
        "profile" => "freya.webp"
        ],
        [
        "fullname" => "Azizi Shafaa Asadel",
        "birtday" => "May 16, 2004",
        "Generation" => "7th Generation",
        "nickname" => "Zee",
        "profile" => "zee.webp"
        ],
        [
        "fullname" => "Angelina Christy",
        "birtday" => "December 5, 2005 ",
        "Generation" => "7th Generation",
        "nickname" => "Christy",
        "profile" => "toya.webp"
        ],
        [
        "fullname" => "Marsha Lenathea Lapian",
        "birtday" => "January 9, 2006",
        "Generation" => "9th Generation",
        "nickname" => "Marsha",
        "profile" => "marsha.webp"
        ],
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member info</title>
</head>
<body>
    <h1>Member Jkt48</h1>
    
    <ul>
        <!-- looping array use foreach -->
        <?php foreach($memberJKT48 as $m) : ?>
            <!-- menggunakan link dengan ? untuk mengambil sebuah data -->
            <li><a href="data.php?profile=<?= $m["profile"]?>&fullname=<?= $m["fullname"]; ?>&birtday=<?= $m["birtday"]; ?>&generation=<?= $m["Generation"]; ?>&nickname=<?= $m["nickname"]; ?>">
                <?= $m["nickname"] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</html>