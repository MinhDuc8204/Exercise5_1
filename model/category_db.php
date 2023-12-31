<?php
function get_categories()
{
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_category_name($category_id)
{
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];
    return $category_name;
}
function add_category($value)
{
    global $db;
    $query = "insert into categories (categoryName) value ('" . $value . "');";
    $statement = $db->prepare($query);
    $statement->execute();
    // $statement->closeCursor();
}
function delete_category($id_cate)
{
    global $db;
    $query = "DELETE FROM categories WHERE categoryID= '" . $id_cate . "'";
    $statement = $db->prepare($query);
    $statement->execute();
    // $statement->closeCursor();
}
