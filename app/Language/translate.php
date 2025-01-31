<?php
require 'vendor/autoload.php'; // Load Google Cloud dependencies

use Google\Cloud\Translate\V2\TranslateClient;

// Set up Google Cloud Authentication
putenv('GOOGLE_APPLICATION_CREDENTIALS=/Users/mac/Desktop/Kabaka/fawedemo/fawetranslator-0aa97585a8b2.json');

function translateText($text, $targetLang = 'fr') {
    try {
        $translate = new TranslateClient();
        
        // Translate text
        $result = $translate->translate($text, [
            'target' => $targetLang
        ]);

        return $result['text'];
    } catch (Exception $e) {
        return "Translation Error: " . $e->getMessage();
    }
}

// Helper function to automatically translate text based on selected language
function trans($text) {
    global $lang; // Retrieve selected language from session
    return ($lang == 'en') ? $text : translateText($text, $lang);
}
?>
