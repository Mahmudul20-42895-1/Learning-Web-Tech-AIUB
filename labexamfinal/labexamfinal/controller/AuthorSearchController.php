<?php
require_once('../model/AuthorModel.php');


if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $results = searchAuthors($keyword);

    if (!empty($results)) {
        echo "<h3>Search Results:</h3>";
        foreach ($results as $author) {
            echo "<p><strong>{$author['author_name']}</strong> - Contact: {$author['contact_no']} - Username: {$author['username']}</p>";
        }
    } else {
        echo "<p>No results found for '{$keyword}'</p>";
    }
}
?>
