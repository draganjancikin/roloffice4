<?php
use Roloffice\Core\Database;

// export proforma to dispatch
if(isset($_GET["exportProformaToDispatch"]) ) {

    $pidb_id = htmlspecialchars($_GET["pidb_id"]);
    $pidb_tip_id = 2;
    $date = date('Y-m-d h:i:s');
    $date_control = date ('Y');

    $db = new Database();

    // get proforma data
    $result_pidb = $db->connection->query("SELECT * FROM pidb WHERE id = '$pidb_id' ") or die(mysqli_error($db->connection));
        $row_pidb = $result_pidb->fetch_assoc();
        $client_id = $row_pidb['client_id'];
        $project_id = $row_pidb['project_id'];
        $title = $row_pidb['title'];
        $note = $row_pidb['note'];

    // save data to dispatch
    $db->connection->query("INSERT INTO pidb (tip_id, date, client_id, parent_id, project_id, title, note) VALUES ('$pidb_tip_id', '$date', '$client_id', '$pidb_id', '$project_id', '$title', '$note')") or die(mysqli_error($db->connection));

    $pidb_id_last = $db->connection->insert_id;

    // payment update
    $db->connection->query("UPDATE payment "
                        . "SET pidb_id='$pidb_id_last' "
                        . "WHERE pidb_id = '$pidb_id' ") or die(mysqli_error($db->connection));

    $y_id = $pidb->setYid($pidb_tip_id);

    // get articles from proforma and save to dispatch
    $result_pidb_articles = $db->connection->query("SELECT * FROM pidb_article WHERE pidb_id = '$pidb_id'") or die(mysqli_error($db->connection));
    while($row_pidb_article = $result_pidb_articles->fetch_assoc()){
        $pidb_article_id = $row_pidb_article['id'];
        $article_id = $row_pidb_article['article_id'];
        $article_note = $row_pidb_article['note'];
        $article_pieces = $row_pidb_article['pieces'];
        $article_price = $row_pidb_article['price'];
        $article_discounts = $row_pidb_article['discounts'];
        $article_tax = $row_pidb_article['tax'];
        $article_weight = $row_pidb_article['weight'];

        $db->connection->query("INSERT INTO pidb_article (pidb_id, article_id, note, pieces, price, discounts, tax, weight) " 
                        . " VALUES ('$pidb_id_last', '$article_id', '$article_note', '$article_pieces', '$article_price', '$article_discounts', '$article_tax', '$article_weight' )") or die(mysqli_error($db->connection));

        $pidb_article_id_last = $db->connection->insert_id;

        // za svaki artikal u predračunu treba proveriti da li postoji property i ako postoji upisati 
        // ga i za novootvorenu otpremnicu

        $result_pidb_articles_propertys = $db->connection->query("SELECT * FROM pidb_article_property WHERE pidb_article_id = '$pidb_article_id'") or die(mysqli_error($db->connection));
        while($row_pidb_articles_property = $result_pidb_articles_propertys->fetch_assoc()){
            $property_id = $row_pidb_articles_property['property_id'];
            $quantity = $row_pidb_articles_property['quantity'];

            $db->connection->query("INSERT INTO pidb_article_property (pidb_article_id, property_id, quantity) VALUES ('$pidb_article_id_last', '$property_id', '$quantity' )") or die(mysqli_error($db->connection));
        }

    }

    // proforma go to archive
    $db->connection->query("UPDATE pidb SET archived='1' WHERE id = '$pidb_id' ") or die(mysqli_error($db->connection));

    // check if proforma has avans payment, if has then save avans to dispatch
    /*
    $result_pidb_avans = $db->connection->query("SELECT * FROM payment WHERE pidb_id = '$pidb_id'") or die(mysqli_error($db->connection));
    if($result_pidb_avans->num_rows) {

        // get avans form proforma $pidb_id
        $row = $result_pidb_avans->fetch_assoc();
        $date = $row['date'];
        $payment_type_id = $row['payment_type_id'];
        $amount = $row['amount'];

        // save avans to dispatch $pidb_id_last
        $db->connection->query("INSERT INTO payment (date, pidb_id, payment_type_id, amount) VALUES ('$date', '$pidb_id_last', '$payment_type_id', '$amount' )") or die(mysqli_error($db->connection)); 
    }
    */
    die('<script>location.href = "?view&pidb_id='.$pidb_id_last.'&pidb_tip_id='.$pidb_tip_id.'" </script>');
}
