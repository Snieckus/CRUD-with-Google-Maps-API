<?php include_once 'includes/database.php';

function pirmasSql($dbc)
{
    $sql = "SELECT * FROM country";
    return mysqli_query($dbc, $sql);
}

function antrasSql($dbc, $newAirport, $airlinesId)
{
    $sql = "INSERT INTO airportairlines (airportId, airlinesId) VALUES('$newAirport', '$airlinesId')";
    return mysqli_query($dbc, $sql);
}

function treciasSql($dbc, $name, $newCountry)
{
    $sql = "INSERT INTO airlines (name, countryId) VALUES('" . $name . "', '" . $newCountry . "')";
    return mysqli_query($dbc, $sql);
}

function ketvirtasSql($dbc, $countrySelected)
{
    $CountryIdByNameSql = "SELECT id FROM country WHERE name='$countrySelected'";
    return mysqli_query($dbc, $CountryIdByNameSql);
}

function penktasSql($dbc, $countrySelected)
{
    $sqlToFilterIfCountryExists = "SELECT COUNT(country.id) AS countCountriesSelected
                               FROM country
                               WHERE country.name ='$countrySelected'";
    return mysqli_query($dbc, $sqlToFilterIfCountryExists);
}

function sestasSql($dbc, $name, $latitude, $longitude, $id)
{
    $sql = "INSERT INTO airport (name, latitude, longitude, countryId) VALUES('" . $name . "', '" . $latitude . "', '" . $longitude . "', '" . $id . "')";
    return mysqli_query($dbc, $sql);
}

function septintasSql($dbc, $name, $iso)
{
    $sql = "INSERT INTO country (name, iso) VALUES('" . $name . "', '" . $iso . "')";
    return mysqli_query($dbc, $sql);
}


function devintasSql($dbc)
{
    $sql = "SELECT * FROM airlines";
    return mysqli_query($dbc, $sql);
}

function desimtasSql($dbc, $countryIDs)
{
    $sql = "SELECT name FROM country WHERE id='" . $countryIDs . "'";
    return mysqli_query($dbc, $sql);
}

function vienuoliktasSql($dbc)
{
    $sql = "SELECT * FROM airport";
    return mysqli_query($dbc, $sql);
}

function dvyliktasSql($dbc, $id)
{
    $resultAirlines = "SELECT airlines.name
                                  FROM airportairlines
                                  LEFT JOIN airport ON airport.id = airportairlines.airportId
                                  LEFT JOIN airlines ON airlines.id = airportairlines.airlinesId
                                  WHERE airport.id = '" . $id . "'";
    return mysqli_query($dbc, $resultAirlines);
}

function tryliktasSql($dbc, $airportID)
{
    $sql = "SELECT country.name
                                      FROM country
                                      LEFT JOIN airport ON airport.countryId = country.id
                                      WHERE airport.id ='" . $airportID . "'";
    return mysqli_query($dbc, $sql);
}

function keturioliktasSql($dbc, $id)
{
    $airlinesCountSql = "SELECT COUNT(airlines.id) AS countAirlines
                       FROM country INNER JOIN airlines ON country.id = airlines.countryId
                       WHERE country.id = $id";
    return mysqli_query($dbc, $airlinesCountSql);
}

function penkioliktasSql($dbc, $id)
{
    $airportsCountSql = "SELECT COUNT(airport.id) AS countAirports
                       FROM country INNER JOIN airport ON country.id = airport.countryId
                       WHERE country.id = $id";
    return mysqli_query($dbc, $airportsCountSql);
}

function sesioliktasSql($dbc, $id)
{
    $sql = "DELETE FROM country WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function septyniolikasSql($dbc, $id)
{
    $deleteFromAirportAirlines = "DELETE FROM airportairlines WHERE airlinesId=$id";
    return mysqli_query($dbc, $deleteFromAirportAirlines);
}

function astuonioliktasSql($dbc, $id)
{
    $sql = "DELETE FROM airlines WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function devynioliktasSql($dbc, $id)
{
    $airlinesAirportsCountSql = "SELECT COUNT(airlines.id) AS countAirlinesAirports
                       FROM airportairlines LEFT JOIN airlines ON airportairlines.airlinesId = airlines.id
                       LEFT JOIN airport ON airportairlines.airportId = airport.id
                       WHERE airport.id = $id";
    return mysqli_query($dbc, $airlinesAirportsCountSql);
}

function dvidesimtasSql($dbc, $id)
{
    $sql = "DELETE FROM airport WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function dvidesimtAntrasSql($dbc, $id)
{
    $sql = "SELECT * FROM airport WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function dvidesimtTreciasSql($dbc, $id)
{
    $sql = "SELECT * FROM airlines WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function dvidesimtKetvirtasSql($dbc, $id)
{
    $sql = "SELECT * FROM country WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function dvidesimtPenktasSql($dbc, $newCountrySelected)
{
    $CountryIdByNameSql = "SELECT id FROM country WHERE name='$newCountrySelected'";
    return mysqli_query($dbc, $CountryIdByNameSql);
}

function dvidesimtSestasSql($dbc, $newCountrySelected)
{
    $sqlToFilterIfCountryExists = "SELECT COUNT(country.id) AS countCountriesSelected
                               FROM country
                               WHERE country.name ='$newCountrySelected'";
    return mysqli_query($dbc, $sqlToFilterIfCountryExists);
}

function dvidesimtSeptintasSql($dbc, $newName, $newLatitude, $newLongitude, $id, $airportID)
{
    $sql = "UPDATE airport SET name='$newName', latitude=$newLatitude, longitude=$newLongitude, countryId=$id WHERE id=$airportID";
    return mysqli_query($dbc, $sql);
}

function dvidesimtAstuntasSql($dbc, $name, $newCountry, $id)
{
    $sql = "UPDATE airlines SET name='$name', countryId=$newCountry WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function dvidesimtDevintasSql($dbc, $name, $iso, $id)
{
    $sql = "UPDATE country SET name='$name', iso='$iso' WHERE id=$id";
    return mysqli_query($dbc, $sql);
}

function trisdesimtasSql($dbc)
{
    $sql = "SELECT country.name, country.iso FROM country
LEFT JOIN airlines ON airlines.countryId = country.id
WHERE airlines.countryId IS NULL";
    return mysqli_query($dbc, $sql);
}

function trisdesimtPirmasSql($dbc)
{
    $sql = "SELECT country.name, country.iso FROM country
    LEFT JOIN airlines ON airlines.countryId = country.id
    LEFT JOIN airport ON airport.countryId = country.id
    WHERE airport.id IS NULL AND airlines.id IS NULL";
    return mysqli_query($dbc, $sql);
}

function trisdesimtAntrasSql($dbc, $newCountry)
{
    $sql = "SELECT airport.id, airport.name, airport.latitude, airport.longitude, airport.countryId
    FROM airport
    LEFT JOIN airportairlines ON airportairlines.airportId = airport.id
    LEFT JOIN airlines ON airportairlines.airlinesId = airlines.id
    LEFT JOIN country ON country.id = airport.countryId
    WHERE airlines.countryId = '" . $newCountry . "' AND airportairlines.id IS NOT NULL";

    return mysqli_query($dbc, $sql);
}

function trisdesimtTreciasSql($dbc, $id)
{
    $resultAirlines = "SELECT airlines.name
                                  FROM airportairlines
                                  LEFT JOIN airport ON airport.id = airportairlines.airportId
                                  LEFT JOIN airlines ON airlines.id = airportairlines.airlinesId
                                  WHERE airport.id = '" . $id . "'";
    return mysqli_query($dbc, $resultAirlines);
}

function trisdesimtKetvirtasSql($dbc, $airportID)
{
    $sql = "SELECT country.name
                                      FROM country
                                      LEFT JOIN airport ON airport.countryId = country.id
                                      WHERE airport.id ='" . $airportID . "'";
    return mysqli_query($dbc, $sql);
}
