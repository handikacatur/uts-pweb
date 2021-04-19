<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=uts192410101066', 'root', '');
} catch (PDOException $exception) {
    var_dump("DB Error dengan kode" . $exception->getMessage());
}

function view($connection) {
    $query = "SELECT * FROM city";
    $statement = $connection->prepare($query);
    $statement->execute();
    $cities = $statement->fetchAll(PDO::FETCH_OBJ);

    return $cities;
}

function loadCountry($connection) {
    $query = "SELECT Code, Name FROM country";
    $statement = $connection->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll(PDO::FETCH_OBJ);

    return $countries;
}

function fetchOne($connection, $id){
    $query = "SELECT * FROM city WHERE ID=:id";
    $statement = $connection->prepare($query);
    $statement->execute([':id' => $id]);
    $city = $statement->fetch(PDO::FETCH_OBJ);

    return $city;
}

function create($connection, $name, $countryCode, $district, $population) {
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO city(Name, CountryCode, District, Population) VALUE (:Name, :CountryCode, :District, :Population)";
    $statement = $connection->prepare($query);
    try {
        if ($statement->execute([':Name' => $name, ':CountryCode' => $countryCode, ':District' => $district, ':Population' => $population])) {
        };
    } catch (PDOException $th) {
        echo $th;
    }
}

function update($connection, $id, $name, $countryCode, $district, $population) {
    echo $id.$name.$countryCode.$district.$population;
    $query = "UPDATE city SET Name=:name, CountryCode=:countryCode, District=:district, Population=:population WHERE ID=:id";
    $statement = $connection->prepare($query);
    $statement->execute([
        ':name' => $name, 
        ':countryCode' => $countryCode, 
        ':district' => $district, 
        ':population' => $population, 
        ':id' => $id
    ]);
}

function delete($connection, $id) {
    $query = "DELETE FROM city WHERE ID=:id";
    $statement = $connection->prepare($query);
    $statement->execute([':id' => $id]);
}