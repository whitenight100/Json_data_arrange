<?php

// Fetch data from the URL
$json = file_get_contents('https://bobigny-republique.college/json.json');

// Decode JSON data
$data = json_decode($json, true);

// Get search term from query parameters
$search = $_GET['search'] ?? '';

// Filter results
$results = array_filter($data['results'], function ($result) use ($search) {
    return strpos(strtolower($result['nom']), strtolower($search)) !== false;
});

// Sort results based on keyword position
usort($results, function ($a, $b) use ($search) {
    $posA = stripos($a['nom'], $search);
    $posB = stripos($b['nom'], $search);

    // If both have the keyword at the beginning, use alphabetical order
    if ($posA === 0 && $posB === 0) {
        return strcmp($a['nom'], $b['nom']);
    }

    // If only one has the keyword at the beginning, it comes first
    if ($posA === 0) {
        return -1;
    } elseif ($posB === 0) {
        return 1;
    }

    // Otherwise, use alphabetical order
    return strcmp($a['nom'], $b['nom']);
});

// Output results
header('Content-Type: application/json');
echo json_encode(['results' => array_values($results)], JSON_UNESCAPED_UNICODE);
?>
